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
            'name' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'label' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:4096'],
            'description' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('coffee', 'public');
        }

        $namePath = $request->file('name')->store('coffee/name', 'public');
        $labelPath = $request->hasFile('label') ? $request->file('label')->store('coffee/label', 'public') : null;
        $descPath = $request->hasFile('description') ? $request->file('description')->store('coffee/description', 'public') : null;

        CoffeeItem::create([
            'name' => $namePath,
            'label' => $labelPath,
            'description' => $descPath,
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
            'name' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'label' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:4096'],
            'description' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data = [
            'is_active' => (bool)($validated['is_active'] ?? true),
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        if ($request->hasFile('name')) {
            if ($coffee->name) {
                Storage::disk('public')->delete($coffee->name);
            }
            $data['name'] = $request->file('name')->store('coffee/name', 'public');
        }

        if ($request->hasFile('description')) {
            if ($coffee->description) {
                Storage::disk('public')->delete($coffee->description);
            }
            $data['description'] = $request->file('description')->store('coffee/description', 'public');
        }

        if ($request->hasFile('image')) {
            if ($coffee->image_path) {
                Storage::disk('public')->delete($coffee->image_path);
            }
            $data['image_path'] = $request->file('image')->store('coffee', 'public');
        }

        if ($request->hasFile('label')) {
            if ($coffee->label) {
                Storage::disk('public')->delete($coffee->label);
            }
            $data['label'] = $request->file('label')->store('coffee/label', 'public');
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


