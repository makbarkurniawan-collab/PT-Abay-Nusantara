@extends('layouts.app')

@section('title', 'Katalog Kopi')
@section('meta_description', 'Katalog kopi nusantara pilihan dari PT Abay Kopi Nusantara.')

@section('content')
    <section class="bg-[#2C1A12] py-16 text-[#FDF8EE] sm:py-20">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#EAB308]">Katalog kami</p>
            <h1 class="mt-4 font-display text-4xl font-semibold sm:text-5xl">Kopi pilihan dari berbagai daerah</h1>
            <p class="mt-4 max-w-2xl text-sm leading-7 text-[#FDF8EE]/70 sm:text-base">Biji kopi pilihan petani lokal, diproses dengan cermat untuk menjaga karakter aslinya.</p>
        </div>
    </section>
    <section class="py-12 sm:py-16">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <form method="get" action="{{ route('products.index') }}" class="mb-9 flex flex-col gap-3 rounded-2xl border border-[#2C1A12]/10 bg-white p-4 sm:flex-row sm:items-end sm:p-5">
                <div class="w-full sm:max-w-sm">
                    <label class="mb-2 block text-sm font-semibold" for="kategori">Saring berdasarkan daerah</label>
                    <select class="w-full rounded-xl border border-[#2C1A12]/15 bg-[#FDF8EE] px-4 py-3 text-sm outline-none transition focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15" name="kategori" id="kategori">
                        <option value="">Semua daerah</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}" @selected($selectedCategory?->id === $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="inline-flex justify-center rounded-full bg-[#2C1A12] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#B45309]" type="submit">Tampilkan</button>
                @if ($selectedCategory)
                    <a href="{{ route('products.index') }}" class="inline-flex justify-center rounded-full border border-[#2C1A12]/15 px-6 py-3 text-sm font-semibold text-[#2C1A12] transition hover:bg-[#FDF8EE]">Hapus filter</a>
                @endif
            </form>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($products as $product)
                    @include('partials.product-card', ['product' => $product])
                @empty
                    <div class="rounded-2xl border border-[#2C1A12]/10 bg-white p-8 text-sm text-[#2C1A12]/65 sm:col-span-2 lg:col-span-3">Belum ada produk pada kategori ini.</div>
                @endforelse
            </div>
            <div class="mt-9">{{ $products->links() }}</div>
        </div>
    </section>
@endsection
