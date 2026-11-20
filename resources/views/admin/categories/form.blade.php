@extends('layouts.admin')

@section('title', $category->exists ? 'Ubah Kategori' : 'Tambah Kategori')

@section('content')
    <div class="mb-7">
        <a href="{{ route('admin.categories.index') }}" class="text-sm font-semibold text-[#B45309] hover:text-[#2C1A12]">&larr; Kembali ke kategori</a>
        <h1 class="mt-3 font-display text-4xl font-semibold">{{ $category->exists ? 'Ubah kategori' : 'Tambah kategori' }}</h1>
    </div>
    <div class="max-w-3xl rounded-2xl border border-[#2C1A12]/10 bg-white p-5 sm:p-8">
        <form method="post" action="{{ $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store') }}">
            @csrf
            @if ($category->exists) @method('PUT') @endif
            <div class="mb-5">
                <label class="mb-2 block text-sm font-semibold" for="name">Nama kategori</label>
                <input class="w-full rounded-xl border border-[#2C1A12]/15 bg-[#FDF8EE] px-4 py-3 text-sm outline-none focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15 @error('name') border-red-500 @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" maxlength="100" required>
                @error('name')<p class="mt-2 text-xs text-red-700">{{ $message }}</p>@enderror
            </div>
            <div class="mb-6">
                <label class="mb-2 block text-sm font-semibold" for="description">Deskripsi</label>
                <textarea class="w-full rounded-xl border border-[#2C1A12]/15 bg-[#FDF8EE] px-4 py-3 text-sm outline-none focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15 @error('description') border-red-500 @enderror" id="description" name="description" rows="4">{{ old('description', $category->description) }}</textarea>
                @error('description')<p class="mt-2 text-xs text-red-700">{{ $message }}</p>@enderror
                <p class="mt-2 text-xs text-[#2C1A12]/55">Slug dibuat otomatis dari nama kategori.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <button class="rounded-full bg-[#2C1A12] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#B45309]" type="submit">Simpan kategori</button>
                <a class="rounded-full border border-[#2C1A12]/15 px-6 py-3 text-sm font-semibold text-[#2C1A12] transition hover:bg-[#FDF8EE]" href="{{ route('admin.categories.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection
