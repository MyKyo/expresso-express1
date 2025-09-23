<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'cekLevel:1 2']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::ordered()->get();
        $activePage = 'team';
        return view('admin.team.index', compact('teams', 'activePage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activePage = 'team';
        return view('admin.team.create', compact('activePage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'social_linkedin' => ['nullable', 'url', 'max:255'],
            'social_instagram' => ['nullable', 'url', 'max:255'],
            'social_twitter' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_published' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('team', 'public');
        }

        Team::create([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'bio' => $validated['bio'] ?? null,
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'social_linkedin' => $validated['social_linkedin'] ?? null,
            'social_instagram' => $validated['social_instagram'] ?? null,
            'social_twitter' => $validated['social_twitter'] ?? null,
            'image_path' => $imagePath,
            'is_published' => (bool)($validated['is_published'] ?? true),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('admin.team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        $activePage = 'team';
        return view('admin.team.edit', compact('team', 'activePage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'social_linkedin' => ['nullable', 'url', 'max:255'],
            'social_instagram' => ['nullable', 'url', 'max:255'],
            'social_twitter' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_published' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data = [
            'name' => $validated['name'],
            'position' => $validated['position'],
            'bio' => $validated['bio'] ?? null,
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'social_linkedin' => $validated['social_linkedin'] ?? null,
            'social_instagram' => $validated['social_instagram'] ?? null,
            'social_twitter' => $validated['social_twitter'] ?? null,
            'is_published' => (bool)($validated['is_published'] ?? true),
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        if ($request->hasFile('image')) {
            if ($team->image_path) {
                Storage::disk('public')->delete($team->image_path);
            }
            $data['image_path'] = $request->file('image')->store('team', 'public');
        }

        $team->update($data);

        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        if ($team->image_path) {
            Storage::disk('public')->delete($team->image_path);
        }
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil dihapus');
    }
}
