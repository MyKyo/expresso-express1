<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'cekLevel:1 2']);
    }

    public function index()
    {
        $banners = Banner::orderBy('sort_order')->latest('id')->get();
        $activePage = 'banner';
        return view('admin.banner.index', compact('banners', 'activePage'));
    }

    public function create()
    {
        $activePage = 'banner';
        return view('admin.banner.create', compact('activePage'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image_desktop' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:94096'],
            'image_mobile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:94096'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $imageDesktopPath = null;
        $imageMobilePath = null;

        if ($request->hasFile('image_desktop')) {
            $imageDesktopPath = $request->file('image_desktop')->store('banners', 'public');
        }
        if ($request->hasFile('image_mobile')) {
            $imageMobilePath = $request->file('image_mobile')->store('banners', 'public');
        }
        $videoPath = null; // video disabled

        Banner::create([
            'title' => $validated['title'] ?? null,
            'type' => 'image',
            'image_desktop_path' => $imageDesktopPath,
            'image_mobile_path' => $imageMobilePath,
            'video_path' => $videoPath,
            'is_active' => (bool)($validated['is_active'] ?? false),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan');
    }

    public function edit(Banner $banner)
    {
        $activePage = 'banner';
        return view('admin.banner.edit', compact('banner', 'activePage'));
    }

    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image_desktop' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'image_mobile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data = [
            'title' => $validated['title'] ?? null,
            'type' => 'image',
            'is_active' => (bool)($validated['is_active'] ?? false),
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        if ($request->hasFile('image_desktop')) {
            if ($banner->image_desktop_path) {
                Storage::disk('public')->delete($banner->image_desktop_path);
            }
            $data['image_desktop_path'] = $request->file('image_desktop')->store('banners', 'public');
        }
        if ($request->hasFile('image_mobile')) {
            if ($banner->image_mobile_path) {
                Storage::disk('public')->delete($banner->image_mobile_path);
            }
            $data['image_mobile_path'] = $request->file('image_mobile')->store('banners', 'public');
        }
        // video disabled

        $banner->update($data);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diperbarui');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image_desktop_path) {
            Storage::disk('public')->delete($banner->image_desktop_path);
        }
        if ($banner->image_mobile_path) {
            Storage::disk('public')->delete($banner->image_mobile_path);
        }
        if ($banner->video_path) {
            Storage::disk('public')->delete($banner->video_path);
        }
        $banner->delete();
        return redirect()->route('admin.banner.index')->with('success', 'Banner dihapus');
    }

    public function toggle(Banner $banner)
    {
        $banner->is_active = !$banner->is_active;
        $banner->save();
        return redirect()->route('admin.banner.index')->with('success', 'Status banner diperbarui');
    }
}


