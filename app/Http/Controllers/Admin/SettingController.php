<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function create()
    {
        $setting = Setting::latest()->first();

        return view('admin.setting.create', compact('setting'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'visibility' => ['required', 'in:private,public']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $visibility = $request->input('visibility');

        $setting = Setting::first();

        $setting->visibility = $visibility;
        $setting->save();

        return redirect()->back()->with('message', 'Project visibility update successfully');
    }
}
