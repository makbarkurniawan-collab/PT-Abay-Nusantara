@extends('layouts.app')

@section('title', $product->name)
@section('meta_description', \Illuminate\Support\Str::limit($product->description, 155))

@section('content')
    <section class="py-12 sm:py-20">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#B45309] transition hover:text-[#2C1A12]">&larr; Kembali ke katalog</a>
            <div class="mt-8 grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
                <div class="overflow-hidden rounded-[1.75rem] border border-[#2C1A12]/10 bg-white shadow-[0_18px_60px_rgba(44,26,18,0.08)]">
                    @if ($product->image)
                        <img class="aspect-[4/3] w-full object-cover" src="{{ asset('storage/'.$product->image) }}" alt="Kemasan kopi {{ $product->name }}">
                    @else
                        <div class="grid aspect-[4/3] place-items-center bg-[#E8DCC8] font-display text-2xl">{{ $product->name }}</div>
                    @endif
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B45309]">{{ $product->category->name }}</p>
                    <h1 class="mt-3 font-display text-4xl font-semibold leading-tight sm:text-5xl">{{ $product->name }}</h1>
                    <p class="mt-6 text-2xl font-bold text-[#2C1A12]">Rp{{ number_format((float) $product->price, 0, ',', '.') }} <span class="text-sm font-medium text-[#2C1A12]/55">/ 250 gram</span></p>
                    <p class="mt-5 leading-8 text-[#2C1A12]/75">{{ $product->description }}</p>
                    <div class="mt-7 rounded-2xl border border-[#2C1A12]/10 bg-white p-6">
                        <h2 class="font-display text-xl font-semibold">Dipilih dari asalnya</h2>
                        <p class="mt-2 text-sm leading-7 text-[#2C1A12]/65">Biji kopi ini berasal dari petani lokal {{ $product->category->name }}. Profil rasa dapat terasa berbeda sesuai metode seduh dan tingkat giling.</p>
                    </div>
                    <a class="mt-7 inline-flex items-center justify-center gap-3 rounded-full bg-[#2C1A12] px-7 py-4 text-sm font-semibold text-white transition hover:bg-[#B45309]" href="{{ route('about') }}">Tertarik? Hubungi kami <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
