<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = request()->user();

        return view('admin.user.profile', compact('user'));
    }

    public function edit(Request $request)
    {
        $user = request()->user();

        return view('admin.user.profileedit', compact('user'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                  => ['required', 'string', 'min:2'],
            'email'                 => ['required', 'email'],
            'password'              => ['nullable', 'same:password_confirmation', Password::defaults()],
            'password_confirmation' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->only(['name', 'email', 'password']);

        $user = request()->user();
        $name     = $data['name'] ?? null;
        $email    = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        $user->name = $name;
        $user->email = $email;

        if ($password):
            $user->password = Hash::make($password);
        endif;

        $res = $user->save();

        if($res){
            return back()->with('message', 'Profile update successfully');
        }
    }
}
