<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;

class TypingController extends Controller
{
    public function create($type)
    {
        $setting = Setting::latest()->first();

        return view('user.' . $type, compact('setting'));
    }

    public function getStdId(Request $request)
    {
        $id = $request->input('stdId');

        $user = User::where('std_id',$id)->where('role', 'user')->first();

        if($user){
            $data = [
                'id'     => $user->id,
                'name'   => $user->name,
                'std_id' => $user->std_id,
            ];

            return response()->json(['status' => 'success','data' => $data]);
        }

        return response()->json(['status' =>  false]);
    }
}
