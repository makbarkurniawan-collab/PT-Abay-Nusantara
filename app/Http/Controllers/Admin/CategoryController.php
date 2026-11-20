<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::withCount('products')->orderBy('name')->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.categories.form', ['category' => new Category]);
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = $this->uniqueSlug($data['name']);
        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $data['slug'] = $this->uniqueSlug($data['name'], $category);
        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->products()->whereNotNull('image')->pluck('image')
            ->each(fn (string $image) => Storage::disk('public')->delete($image));
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Kategori dan produk terkait berhasil dihapus.');
    }

    private function uniqueSlug(string $name, ?Category $except = null): string
    {
        $base = Str::slug($name) ?: 'kategori';
        $slug = $base;
        $suffix = 2;

        do {
            $query = Category::where('slug', $slug);
            if ($except) {
                $query->where('id', '!=', $except->id);
            }
            if (! $query->exists()) {
                return $slug;
            }
            $slug = $base.'-'.$suffix++;
        } while (true);
    }
}
