<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoffeeItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoffeeItemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'cekLevel:1 2']);
    }

    public function index()
    {
        $items = CoffeeItem::orderBy('sort_order')->latest('id')->get();
        $activePage = 'coffee';
        return view('admin.coffee.index', compact('items', 'activePage'));
    }

    public function create()
    {
        $activePage = 'coffee';
        return view('admin.coffee.create', compact('activePage'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('coffee', 'public');
        }

        CoffeeItem::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'image_path' => $imagePath,
            'is_active' => (bool)($validated['is_active'] ?? true),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.coffee.index')->with('success', 'Item kopi dibuat');
    }

    public function edit(CoffeeItem $coffee)
    {
        $activePage = 'coffee';
        return view('admin.coffee.edit', ['item' => $coffee, 'activePage' => $activePage]);
    }

    public function update(Request $request, CoffeeItem $coffee)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data = [
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'is_active' => (bool)($validated['is_active'] ?? true),
            'sort_order' => $validated['sort_order'] ?? 0,
        ];
        if ($request->hasFile('image')) {
            if ($coffee->image_path) {
                Storage::disk('public')->delete($coffee->image_path);
            }
            $data['image_path'] = $request->file('image')->store('coffee', 'public');
        }
        $coffee->update($data);
        return redirect()->route('admin.coffee.index')->with('success', 'Item kopi diperbarui');
    }

    public function destroy(CoffeeItem $coffee)
    {
        if ($coffee->image_path) {
            Storage::disk('public')->delete($coffee->image_path);
        }
        $coffee->delete();
        return redirect()->route('admin.coffee.index')->with('success', 'Item kopi dihapus');
    }
}


