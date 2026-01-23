<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display product list
     */
    public function index(Request $request)
    {
        $products = Product::with(['category', 'images'])->latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show create product form
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store product (UI-only)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku',
            'price' => 'required|numeric',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'quantity' => 'required|integer',
            'description' => 'nullable|string',
            'status' => 'required|in:available,out_of_stock',
            'featured' => 'nullable|boolean',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $product = Product::create(array_merge($data, [
            'featured' => $data['featured'] ?? 0,
        ]));

        // Handle images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    /**
     * Show edit product form
     */
    public function edit(Product $product)
    {
        $product->load('images');
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update product (UI-only)
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
            'price' => 'required|numeric',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'quantity' => 'required|integer',
            'description' => 'nullable|string',
            'status' => 'required|in:available,out_of_stock',
            'featured' => 'nullable|boolean',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $product->update(array_merge($data, [
            'featured' => $data['featured'] ?? 0,
        ]));

        // New images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Delete product (UI-only)
     */
    public function destroy(Product $product)
    {
        // Delete images from storage
        foreach ($product->images as $img) {
            if ($img->image_path && Storage::disk('public')->exists($img->image_path)) {
                Storage::disk('public')->delete($img->image_path);
            }
            $img->delete();
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}
