<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role', 'teacher')->latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('teacher_image', function ($data) {
                    $imageUrl = asset('uploads/' . $data->teacher_image);
                    return '<img src="' . $imageUrl . '" alt="Teacher Image" width="100" height="100" class="img-thumbnail">';
                })

                ->addColumn('status', function ($data) {
                    $activeBtn = '';
                    $inactiveBtn = '';

                    if ($data->status == 'active') {
                        $activeBtn = '<button class="btn btn-sm btn-success disabled">Active</button>';
                    } else {
                        $inactiveBtn = '<button class="btn btn-sm btn-warning disabled">Inactive</button>';
                    }

                    return $activeBtn . ' ' . $inactiveBtn;
                })
                ->addColumn('action', function ($data) {
                    $editRoute = route('user.edit', ['id' => $data->id]);
                    $actionButtons = '
                        <a href="' . $editRoute . '" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>';
                    return $actionButtons;
                })

                ->rawColumns(['name', 'teacher_image', 'email', 'status', 'action'])
                ->make(true);
        }

        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();

            $name     = $request->input('name');
            $email    = $request->input('email');
            $password = $request->input('password');
            $status   = $request->input('status');

            $user           = new User();

            if ($request->hasFile('teacher_image')) {
                $imageFile = $request->file('teacher_image');
                $imageName = 'teacher_' . time() . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->move(public_path('uploads'), $imageName);
            } else {
                $imageName = null;
            }

            if($imageName != null):
                $user->teacher_image = $imageName;
            endif;

            $user->name     = $name;
            $user->email    = $email;
            $user->password = $password;
            $user->status   = $status;
            $user->role     = 'teacher';

            $res = $user->save();

            DB::commit();
            if($res){
                return redirect()->route('user.list')->with('message', 'Teacher saved successfully');
            }
        } catch (\Exception $e) {
            DB::rollback();
            info($e);
        }
    }

    public function edit($id)
    {
        $teacher = User::where('role', 'teacher')->where('id',$id)->first();

        if(!$teacher){
            return back()->with('failed', 'Teacher not found');
        }

        return view('admin.user.edit', compact('teacher'));
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
                'teacher_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:1024'],
                'name'          => ['required', 'string', 'min:2'],
                'email'         => ['required', 'email'],
                'status'        => ['required', 'in:active,inactive']
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

            if ($request->hasFile('teacher_image')) {
                $imageFile = $request->file('teacher_image');
                $imageName = 'teacher_' . time() . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->move(public_path('uploads'), $imageName);
            } else {
                $imageName = null;
            }

            if($imageName != null):
                $user->teacher_image = $imageName;
            endif;

            $user->name   = $request->input('name');
            $user->email  = $request->input('email');
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