@extends('layouts.admin')

@section('title', $product->exists ? 'Ubah Produk' : 'Tambah Produk')

@section('content')
    <div class="mb-7">
        <a href="{{ route('admin.products.index') }}" class="text-sm font-semibold text-[#B45309] hover:text-[#2C1A12]">&larr; Kembali ke produk</a>
        <h1 class="mt-3 font-display text-4xl font-semibold">{{ $product->exists ? 'Ubah produk' : 'Tambah produk' }}</h1>
    </div>
    <div class="rounded-2xl border border-[#2C1A12]/10 bg-white p-5 sm:p-8">
        <form method="post" action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($product->exists) @method('PUT') @endif
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold" for="name">Nama produk</label>
                    <input class="w-full rounded-xl border border-[#2C1A12]/15 bg-[#FDF8EE] px-4 py-3 text-sm outline-none focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15 @error('name') border-red-500 @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" maxlength="100" required>
                    @error('name')<p class="mt-2 text-xs text-red-700">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold" for="category_id">Kategori</label>
                    <select class="w-full rounded-xl border border-[#2C1A12]/15 bg-[#FDF8EE] px-4 py-3 text-sm outline-none focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15 @error('category_id') border-red-500 @enderror" id="category_id" name="category_id" required>
                        <option value="">Pilih kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected((string) old('category_id', $product->category_id) === (string) $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<p class="mt-2 text-xs text-red-700">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold" for="price">Harga per 250 gram (Rp)</label>
                    <input class="w-full rounded-xl border border-[#2C1A12]/15 bg-[#FDF8EE] px-4 py-3 text-sm outline-none focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15 @error('price') border-red-500 @enderror" id="price" name="price" type="number" min="0" step="1" value="{{ old('price', $product->price) }}" required>
                    @error('price')<p class="mt-2 text-xs text-red-700">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold" for="image">Gambar produk</label>
                    <input class="block w-full rounded-xl border border-[#2C1A12]/15 bg-[#FDF8EE] text-sm file:mr-4 file:border-0 file:bg-[#2C1A12] file:px-4 file:py-3 file:font-semibold file:text-white @error('image') border-red-500 @enderror" id="image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp">
                    <p class="mt-2 text-xs leading-5 text-[#2C1A12]/55">JPG, JPEG, PNG, atau WEBP; maksimal 2 MB. Kosongkan jika tidak ingin mengganti gambar.</p>
                    @error('image')<p class="mt-2 text-xs text-red-700">{{ $message }}</p>@enderror
                    @if ($product->image)<p class="mt-2 text-xs text-[#2C1A12]/65">Gambar saat ini: {{ basename($product->image) }}</p>@endif
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-semibold" for="description">Deskripsi dan profil rasa</label>
                    <textarea class="w-full rounded-xl border border-[#2C1A12]/15 bg-[#FDF8EE] px-4 py-3 text-sm outline-none focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15 @error('description') border-red-500 @enderror" id="description" name="description" rows="5" required>{{ old('description', $product->description) }}</textarea>
                    @error('description')<p class="mt-2 text-xs text-red-700">{{ $message }}</p>@enderror
                </div>
                <label class="flex items-center gap-3 text-sm md:col-span-2">
                    <input class="h-4 w-4 rounded border-[#2C1A12]/30 accent-[#B45309]" id="is_active" name="is_active" type="checkbox" value="1" @checked(old('is_active', $product->is_active))>
                    Tampilkan produk di website publik
                </label>
                <div class="flex flex-wrap gap-3 pt-2 md:col-span-2">
                    <button class="rounded-full bg-[#2C1A12] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#B45309]" type="submit">Simpan produk</button>
                    <a class="rounded-full border border-[#2C1A12]/15 px-6 py-3 text-sm font-semibold text-[#2C1A12] transition hover:bg-[#FDF8EE]" href="{{ route('admin.products.index') }}">Batal</a>
                </div>
            </div>
        </form>
    </div>
@endsection
