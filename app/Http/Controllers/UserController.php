<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role', 'user')->latest();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $editRoute = route('user.edit', ['id' => $data->id]);
                    $actionButtons = '
                        <a href="' . $editRoute . '" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>';
                    return $actionButtons;
                })

                ->rawColumns(['name', 'std_id', 'email', 'status', 'action'])
                ->make(true);
        }

        return view('admin.user.index');
    }

    public function edit($id)
    {
        $user = User::where('role', 'user')->where('id',$id)->first();

        if(!$user){
            return back()->with('failed', 'User not found');
        }

        return view('admin.user.edit', compact('user'));
    }

    /**
     * User update method
     * use custom validator
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name'   => ['required', 'string', 'min:2'],
                'email'  => ['required', 'email'],
                'std_id' => ['required'],
                'status' => ['required', 'in:active,inactive']
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            $userId = $request->input('user_id');

            $user = User::find($userId);

            if(!$user):
                return redirect()->route('user.list')->with('message', 'User not found');
            endif;

            $user->name   = $request->input('name');
            $user->email  = $request->input('email');
            $user->std_id = $request->input('std_id');
            $user->status = $request->input('status');

            $res = $user->save();
            DB::commit();
            if($res){
                return redirect()->route('user.list')->with('message', 'User update successfully');
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
