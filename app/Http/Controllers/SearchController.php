<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class SearchController extends Controller
{
    /**
     * Handle search for products and categories.
     *
     * Accepts GET param `q`. If empty, behaves like FrontendController@index.
     */
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $sort = (string) $request->query('sort', '');

        $categories = Category::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        $productsQuery = Product::with('images')
            ->where('status', 'available');

        if ($q !== '') {
            $productsQuery->where(function ($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%")
                      ->orWhereHas('category', function ($qc) use ($q) {
                          $qc->where('name', 'like', "%{$q}%");
                      });
            });
        }

        // Apply sorting
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

        $products = $productsQuery->paginate(12)->appends(['q' => $q, 'sort' => $sort]);

        return view('user.index', compact('categories', 'products'));
    }
}
