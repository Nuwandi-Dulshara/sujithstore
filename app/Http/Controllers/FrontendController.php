<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        $products = Product::with('images')
            ->where('status', 'available')
            ->latest()
            ->paginate(12); // 3 rows × 4 cards

        return view('user.index', compact('categories', 'products'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        $products = Product::with('images')
            ->where('category_id', $category->id)
            ->where('status', 'available')
            ->latest()
            ->paginate(12);

        return view('user.category', compact('category', 'products'));
    }
}
