@extends('layouts.app')

@section('title', 'Kopi Nusantara dari Petani Lokal')
@section('meta_description', 'Jelajahi biji kopi pilihan Gayo, Mandailing, Toraja, Kintamani, Bajawa, dan Preanger dari PT Abay Kopi Nusantara.')

@section('content')
    <section class="relative isolate overflow-hidden bg-[#2C1A12] text-[#FDF8EE]">
        <img class="absolute inset-0 -z-20 h-full w-full object-cover" src="https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&amp;fit=crop&amp;w=2200&amp;q=85" alt="" fetchpriority="high">
        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-[#2C1A12]/95 via-[#2C1A12]/80 to-[#2C1A12]/60"></div>
        <div class="mx-auto grid min-h-[620px] max-w-7xl items-center gap-14 px-5 py-20 sm:px-8 lg:grid-cols-[1.15fr_0.75fr] lg:gap-20 lg:px-10 lg:py-28">
            <div class="max-w-3xl">
                <p class="inline-flex items-center gap-2 rounded-full border border-[#EAB308]/40 bg-[#2C1A12]/45 px-4 py-2 text-[0.68rem] font-bold uppercase tracking-[0.2em] text-[#FDE68A] backdrop-blur-sm sm:text-xs">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#EAB308]"></span>
                    Dari kebun lokal ke cangkir Anda
                </p>
                <h1 class="mt-7 font-display text-5xl font-semibold leading-[1.08] tracking-tight text-[#FFF9ED] sm:text-6xl lg:text-7xl">Cerita Indonesia,<br><span class="text-[#EAB308]">hadir di setiap</span><br>seduhan.</h1>
                <p class="mt-7 max-w-2xl text-base leading-8 text-[#FDF8EE]/80 sm:text-lg">PT Abay Kopi Nusantara menghadirkan biji kopi pilihan dari berbagai daerah langsung dari petani lokal. Temukan karakter unik dari setiap tanah, dirawat dengan sepenuh hati.</p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a class="inline-flex items-center justify-center gap-3 rounded-full bg-[#EAB308] px-7 py-4 text-sm font-bold text-[#2C1A12] shadow-lg shadow-black/20 transition hover:-translate-y-0.5 hover:bg-[#FACC15] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[#EAB308]" href="{{ route('products.index') }}">
                        Jelajahi koleksi
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12m-5-5 5 5-5 5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a class="inline-flex items-center justify-center rounded-full border border-white/40 bg-white/5 px-7 py-4 text-sm font-semibold text-white backdrop-blur-sm transition hover:border-white hover:bg-white/10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-white" href="{{ route('about') }}">Kenali cerita kami</a>
                </div>
                <div class="mt-12 flex items-center gap-4 border-t border-white/20 pt-6">
                    <div class="flex -space-x-2" aria-hidden="true">
                        <span class="h-8 w-8 rounded-full border-2 border-[#2C1A12] bg-[#C78243]"></span>
                        <span class="h-8 w-8 rounded-full border-2 border-[#2C1A12] bg-[#EAB308]"></span>
                        <span class="h-8 w-8 rounded-full border-2 border-[#2C1A12] bg-[#82644A]"></span>
                    </div>
                    <p class="text-xs leading-5 text-[#FDF8EE]/75 sm:text-sm">Bersumber langsung dari<br class="sm:hidden"> komunitas petani lokal</p>
                </div>
            </div>

            <aside class="relative mx-auto w-full max-w-md lg:ml-auto" aria-label="Cerita Abay Kopi">
                <div class="absolute -inset-4 rounded-[2rem] border border-white/15"></div>
                <div class="relative rounded-[1.65rem] border border-white/30 bg-white/95 p-7 text-[#2C1A12] shadow-2xl shadow-black/30 backdrop-blur-xl sm:p-9">
                    <div class="flex items-center justify-between">
                        <span class="text-[0.65rem] font-bold uppercase tracking-[0.2em] text-[#B45309]">Bersumber dengan kepedulian</span>
                        <svg class="h-7 w-7 text-[#B45309]" viewBox="0 0 32 32" fill="none" aria-hidden="true"><path d="M16 3C10 10 8 14 8 19a8 8 0 0 0 16 0c0-5-2-9-8-16Z" stroke="currentColor" stroke-width="1.7"/><path d="M12 20c0 2.2 1.8 4 4 4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                    </div>
                    <h2 class="mt-8 font-display text-3xl font-semibold leading-tight sm:text-4xl">Setiap biji menyimpan asal, kerja keras, dan rasa.</h2>
                    <p class="mt-5 text-sm leading-7 text-[#2C1A12]/70">Kami bekerja bersama petani lokal agar kekayaan kopi Indonesia dapat dinikmati dengan lebih dekat dan bertanggung jawab.</p>
                    <div class="mt-8 flex items-center gap-3 border-t border-[#2C1A12]/10 pt-5">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#F5E9D1] text-[#B45309]">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-4.4 7-11a7 7 0 1 0-14 0c0 6.6 7 11 7 11Z"/><circle cx="12" cy="10" r="2.2"/></svg>
                        </span>
                        <div><p class="text-xs font-bold uppercase tracking-wider">Empat wilayah pilihan</p><p class="mt-1 text-xs text-[#2C1A12]/60">Rasa khas dari berbagai penjuru negeri</p></div>
                    </div>
                </div>
            </aside>
        </div>
        <div class="pointer-events-none absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-[#FDF8EE]/10 to-transparent"></div>
    </section>

    <section class="py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <div class="mb-9 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B45309]">Pilihan untuk Anda</p>
                    <h2 class="mt-3 font-display text-4xl font-semibold tracking-tight text-[#2C1A12] sm:text-5xl">Produk unggulan</h2>
                    <p class="mt-3 max-w-xl text-sm leading-7 text-[#2C1A12]/65">Tiga cerita rasa dari tanah pilihan, dipersembahkan dengan hormat untuk setiap seduhan.</p>
                </div>
                <a href="{{ route('products.index') }}" class="group inline-flex items-center gap-2 self-start text-sm font-bold text-[#B45309] transition hover:text-[#2C1A12] sm:self-auto">
                    Lihat semua produk
                    <span class="transition-transform group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                </a>
            </div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($featuredProducts as $product)
                    @include('partials.product-card', ['product' => $product])
                @empty
                    <div class="rounded-3xl border border-[#2C1A12]/10 bg-white p-8 text-sm text-[#2C1A12]/65 md:col-span-2 lg:col-span-3">Produk pilihan kami segera hadir. Silakan kembali lagi.</div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="pb-20 sm:pb-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <div class="relative overflow-hidden rounded-[2rem] border border-[#2C1A12]/10 bg-white p-7 shadow-[0_18px_60px_rgba(44,26,18,0.07)] sm:p-10 lg:p-12">
                <div class="absolute -right-20 -top-28 h-72 w-72 rounded-full bg-[#EAB308]/10 blur-3xl" aria-hidden="true"></div>
                <div class="relative flex flex-col gap-7 md:flex-row md:items-center md:justify-between">
                    <div class="max-w-2xl">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B45309]">Ragam rasa Indonesia</p>
                        <h2 class="mt-3 font-display text-3xl font-semibold leading-tight sm:text-4xl">Jelajahi {{ $categoryCount }} wilayah kopi pilihan</h2>
                        <p class="mt-3 text-sm leading-7 text-[#2C1A12]/65">Dari Sumatra hingga Nusa Tenggara, setiap daerah punya cerita dan cita rasa yang berbeda.</p>
                    </div>
                    <a class="inline-flex shrink-0 items-center justify-center gap-3 rounded-full bg-[#2C1A12] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#B45309] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[#B45309]" href="{{ route('products.index') }}">
                        Jelajahi katalog
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
