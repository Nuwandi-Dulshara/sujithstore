<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Dashboard stats
        $stats = [
            'users'      => User::count(),
            'products'   => Product::count(),
            'categories' => Category::count(),
            'orders'     => 0, // placeholder (no orders table yet)
        ];

        // Recent orders (placeholder data)
        $recent_orders = [
            [
                'user'   => 'John Doe',
                'date'   => now()->subHours(2)->diffForHumans(),
                'amount' => '$120.00',
                'status' => 'Completed',
            ],
        ];

        // Recent products
        $recent_products = Product::latest()
            ->take(5)
            ->get(['id', 'name', 'price', 'created_at']);

        return view(
            'admin.dashboard.index',
            compact('stats', 'recent_orders', 'recent_products')
        );
    }
}
