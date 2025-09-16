<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'cekLevel:1 2']);
    }

    public function index()
    {
        $products = Product::orderBy('sort_order')->latest('id')->get();
        $activePage = 'product';
        return view('admin.product.index', compact('products', 'activePage'));
    }

    public function create()
    {
        $activePage = 'product';
        return view('admin.product.create', compact('activePage'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $validated['name'],
            'image_path' => $imagePath,
            'is_active' => (bool)($validated['is_active'] ?? true),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Produk dibuat');
    }

    public function edit(Product $product)
    {
        $activePage = 'product';
        return view('admin.product.edit', compact('product', 'activePage'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data = [
            'name' => $validated['name'],
            'is_active' => (bool)($validated['is_active'] ?? true),
            'sort_order' => $validated['sort_order'] ?? 0,
        ];
        if ($request->hasFile('image')) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }
        $product->update($data);
        return redirect()->route('admin.product.index')->with('success', 'Produk diperbarui');
    }

    public function destroy(Product $product)
    {
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Produk dihapus');
    }
}


