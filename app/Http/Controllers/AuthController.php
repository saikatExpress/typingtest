<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.login');
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

            if ($user->role !== 'admin') {
                Auth::logout();
                return redirect()->back()->with('message', 'You are not authorized for this.');
            }

            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('message', 'Invalid credentials provided.');
        }
    }

    public function logout()
    {
        Auth::logout(); // Log the user out
        return redirect()->route('login');
    }
}
