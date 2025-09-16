<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'cekLevel:1 2']);
    }

    public function index()
    {
        $abouts = About::latest()->get();
        $activePage = 'about';
        return view('admin.about.index', compact('abouts', 'activePage'));
    }

    public function create()
    {
        $activePage = 'about';
        return view('admin.about.create', compact('activePage'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about', 'public');
        }

        About::create([
            'title' => $validated['title'],
            'content' => $validated['content'] ?? null,
            'image_path' => $imagePath,
            'is_published' => (bool)($validated['is_published'] ?? true),
        ]);

        return redirect()->route('admin.about.index')->with('success', 'Tentang Kami dibuat');
    }

    public function edit(About $about)
    {
        $activePage = 'about';
        return view('admin.about.edit', compact('about', 'activePage'));
    }

    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $data = [
            'title' => $validated['title'],
            'content' => $validated['content'] ?? null,
            'is_published' => (bool)($validated['is_published'] ?? true),
        ];

        if ($request->hasFile('image')) {
            if ($about->image_path) {
                Storage::disk('public')->delete($about->image_path);
            }
            $data['image_path'] = $request->file('image')->store('about', 'public');
        }

        $about->update($data);

        return redirect()->route('admin.about.index')->with('success', 'Tentang Kami diperbarui');
    }

    public function destroy(About $about)
    {
        if ($about->image_path) {
            Storage::disk('public')->delete($about->image_path);
        }
        $about->delete();
        return redirect()->route('admin.about.index')->with('success', 'Tentang Kami dihapus');
    }
}


