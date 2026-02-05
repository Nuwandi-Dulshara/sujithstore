<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    /**
     * Homepage – All products
     */
    public function index(Request $request)
    {
        $sort = (string) $request->query('sort', '');

        $categories = Category::where('status', 'active')
            ->latest()
            ->get();

        $productsQuery = Product::with('images')
            ->where('status', 'available');

        // ✅ FINAL PRICE SORTING (FIXED)
        switch ($sort) {

            case 'price_asc':
                $productsQuery->orderByRaw("
                    (price - (price * IFNULL(discount_percentage, 0) / 100.0)) ASC
                ");
                break;

            case 'price_desc':
                $productsQuery->orderByRaw("
                    (price - (price * IFNULL(discount_percentage, 0) / 100.0)) DESC
                ");
                break;

            case 'name_asc':
                $productsQuery->orderBy('name', 'asc');
                break;

            case 'name_desc':
                $productsQuery->orderBy('name', 'desc');
                break;

            default:
                $productsQuery->latest();
        }

        $products = $productsQuery
            ->paginate(12)
            ->withQueryString();

        return view('user.index', compact('categories', 'products'));
    }

    /**
     * Category filter
     */
    public function category(Request $request, $slug)
    {
        $sort = (string) $request->query('sort', '');

        $category = Category::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        $productsQuery = Product::with('images')
            ->where('status', 'available')
            ->where('category_id', $category->id);

        // ✅ FINAL PRICE SORTING (FIXED)
        switch ($sort) {

            case 'price_asc':
                $productsQuery->orderByRaw("
                    (price - (price * IFNULL(discount_percentage, 0) / 100.0)) ASC
                ");
                break;

            case 'price_desc':
                $productsQuery->orderByRaw("
                    (price - (price * IFNULL(discount_percentage, 0) / 100.0)) DESC
                ");
                break;

            case 'name_asc':
                $productsQuery->orderBy('name', 'asc');
                break;

            case 'name_desc':
                $productsQuery->orderBy('name', 'desc');
                break;

            default:
                $productsQuery->latest();
        }

        $products = $productsQuery
            ->paginate(12)
            ->withQueryString();

        return view('user.index', compact('products', 'category'))
            ->with('categories', Category::where('status', 'active')->get());
    }
}
