<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $sort = (string) $request->query('sort', '');

        $categories = Category::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        $productsQuery = Product::with('images')
            ->where('status', 'available');

        switch ($sort) {
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
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

        $products = $productsQuery->paginate(12)->appends(['sort' => $sort]); // 3 rows × 4 cards

        return view('user.index', compact('categories', 'products'));
    }

    public function category(Request $request, $slug)
    {
        $sort = (string) $request->query('sort', '');

        $category = Category::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        $productsQuery = Product::with('images')
            ->where('category_id', $category->id)
            ->where('status', 'available');

        switch ($sort) {
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
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

        $products = $productsQuery->paginate(12)->appends(['sort' => $sort]);

        return view('user.category', compact('category', 'products'));
    }
}
