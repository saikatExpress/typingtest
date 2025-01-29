<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Support\Str;
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

    public function projectSetting()
    {
        $setting = Setting::first();

        return view('admin.setting.project_create', compact('setting'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => ['required', 'max:250', 'min:2'],
            'logo'         => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'favicon'      => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:1024'],
            'facebook'     => ['nullable', 'url', 'max:255'],
            'instagram'    => ['nullable', 'url', 'max:255'],
            'youtube'      => ['nullable', 'url', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoName = 'logo_' . time() . '.' . $logoFile->getClientOriginalExtension();
            $logoFile->move(public_path('uploads'), $logoName);
        } else {
            $logoName = null;
        }

        if ($request->hasFile('favicon')) {
            $faviconFile = $request->file('favicon');
            $faviconName = 'favicon_' . time() . '.' . $faviconFile->getClientOriginalExtension();
            $faviconFile->move(public_path('uploads'), $faviconName);
        } else {
            $faviconName = null;
        }

        $setting = Setting::latest()->first();

        if($setting){
            $setting->project_name = Str::title($request->input('project_name'));

            if($logoName != null):
                $setting->project_logo = $logoName;
            endif;

            if($faviconName != null):
                $setting->favicon = $faviconName;
            endif;

            $setting->fb_link        = $request->input('facebook');
            $setting->instagram_link = $request->input('instagram');
            $setting->youtube_link   = $request->input('youtube');

            $setting->save();

            return redirect()->back()->with('message', 'Project updated successfully');
        }

        return redirect()->back()->with('failed', 'Setting not found');
    }
}
