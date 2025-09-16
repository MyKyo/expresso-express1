<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'cekLevel:1 2']);
    }

    public function index()
    {
        $posts = BlogPost::latest()->paginate(20);
        $activePage = 'blog';
        return view('admin.blog.index', compact('posts', 'activePage'));
    }

    public function create()
    {
        $activePage = 'blog';
        return view('admin.blog.create', compact('activePage'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['nullable', 'string'],
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('blog', 'public');
        }

        $post = BlogPost::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']).'-'.Str::random(6),
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'] ?? null,
            'cover_path' => $coverPath,
            'is_published' => (bool)($validated['is_published'] ?? false),
            'published_at' => ($validated['is_published'] ?? false) ? now() : null,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Artikel blog dibuat');
    }

    public function edit(BlogPost $blog)
    {
        $activePage = 'blog';
        return view('admin.blog.edit', ['post' => $blog, 'activePage' => $activePage]);
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['nullable', 'string'],
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $data = [
            'title' => $validated['title'],
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'] ?? null,
            'is_published' => (bool)($validated['is_published'] ?? false),
            'published_at' => ($validated['is_published'] ?? false) ? ($blog->published_at ?? now()) : null,
        ];

        if ($request->hasFile('cover')) {
            if ($blog->cover_path) {
                Storage::disk('public')->delete($blog->cover_path);
            }
            $data['cover_path'] = $request->file('cover')->store('blog', 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.blog.index')->with('success', 'Artikel blog diperbarui');
    }

    public function destroy(BlogPost $blog)
    {
        if ($blog->cover_path) {
            Storage::disk('public')->delete($blog->cover_path);
        }
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Artikel blog dihapus');
    }
}


