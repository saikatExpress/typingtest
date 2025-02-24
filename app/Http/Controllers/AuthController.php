<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function create()
    {
        $setting = Setting::latest()->first();

        return view('auth.login', compact('setting'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => ['required', 'email'],
            'password' => ['required', 'string', 'min:4'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $email    = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();

            if($user->status !== 'active') {
                Auth::logout();
                return redirect()->back()->with('message', 'Your account is not active.');
            }

            if (!in_array($user->role, ['admin', 'teacher'])) {
                Auth::logout();
                return redirect()->back()->with('message', 'You are not authorized for this.');
            }

            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('message', 'Invalid credentials provided.');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        return view('error.message');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}