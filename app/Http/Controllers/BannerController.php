<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();

        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'banners.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('banners')) {
            foreach ($request->file('banners') as $file) {
                $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                $path = $file->move(public_path('uploads/banners'), $filename);

                Banner::create(['image_url' => 'uploads/banners/' . $filename]);
            }
        }
        return redirect()->back()->with('message', 'Banners uploaded successfully!');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);

        if ($banner) {
            return view('admin.banner.edit', compact('banner'));
        }

        return redirect()->back()->with('error', 'Banner not found');
    }

    public function update(Request $request)
    {
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = Banner::find($request->id);

        if ($banner) {
            $imagePath = public_path('uploads/banners/' . $banner->image_url);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $filename = time() . '-' . uniqid() . '.' . $request->file('banner')->getClientOriginalExtension();

            $path = $request->file('banner')->move(public_path('uploads/banners'), $filename);

            $banner->update(['image_url' => 'uploads/banners/' . $filename]);

            return redirect()->back()->with('message', 'Banner updated successfully!');
        }

        return redirect()->back()->with('error', 'Banner not found');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);

        if ($banner) {
            $imagePath = public_path('uploads/banners/' . $banner->image_url);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $banner->delete();

            return response()->json(['success' => 'Banner deleted successfully']);
        }

        return response()->json(['error' => 'Banner not found'], 404);
    }

}