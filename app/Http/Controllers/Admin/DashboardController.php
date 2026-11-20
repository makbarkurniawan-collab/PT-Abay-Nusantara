<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'productCount' => Product::count(),
            'categoryCount' => Category::count(),
            'activeProductCount' => Product::where('is_active', true)->count(),
            'ordersThisMonth' => 0,
            'customerCount' => User::where('is_admin', false)->count(),
            'recentProducts' => Product::with('category')->latest()->take(5)->get(),
        ]);
    }
}
