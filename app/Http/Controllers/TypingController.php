<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class TypingController extends Controller
{
    public function create($type)
    {
        $setting = Setting::latest()->first();

        return view('user.' . $type, compact('setting'));
    }
}
