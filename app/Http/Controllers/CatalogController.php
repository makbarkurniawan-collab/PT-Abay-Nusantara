<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->filled('kategori')
            ? Category::where('slug', $request->query('kategori'))->firstOrFail()
            : null;

        $products = Product::with('category')
            ->where('is_active', true)
            ->when($category, fn ($query) => $query->where('category_id', $category->id))
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('products.index', [
            'products' => $products,
            'categories' => Category::orderBy('name')->get(),
            'selectedCategory' => $category,
        ]);
    }

    public function show(string $slug)
    {
        $product = Product::with('category')
            ->where('is_active', true)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('products.show', compact('product'));
    }
}
