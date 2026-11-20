@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B45309]">Ringkasan usaha</p>
            <h1 class="mt-2 font-display text-4xl font-semibold">Dashboard</h1>
            <p class="mt-2 text-sm text-[#2C1A12]/60">Pantau katalog dan aktivitas PT Abay Kopi Nusantara.</p>
        </div>
        <a class="inline-flex items-center justify-center gap-2 rounded-full bg-[#2C1A12] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#B45309]" href="{{ route('admin.products.create') }}">
            <span class="text-lg leading-none" aria-hidden="true">+</span> Tambah Produk
        </a>
    </div>

    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="Statistik usaha">
        <article class="rounded-2xl border border-[#2C1A12]/10 bg-white p-5 shadow-[0_8px_24px_rgba(44,26,18,0.04)]">
            <div class="flex items-center justify-between"><p class="text-sm font-medium text-[#2C1A12]/60">Total Produk Kopi</p><span class="rounded-xl bg-[#F6EBD8] p-2 text-[#B45309]" aria-hidden="true">☕</span></div>
            <p class="mt-5 font-display text-4xl font-semibold">{{ number_format($productCount) }}</p>
            <p class="mt-1 text-xs text-[#2C1A12]/50">{{ number_format($activeProductCount) }} produk aktif</p>
        </article>
        <article class="rounded-2xl border border-[#2C1A12]/10 bg-white p-5 shadow-[0_8px_24px_rgba(44,26,18,0.04)]">
            <div class="flex items-center justify-between"><p class="text-sm font-medium text-[#2C1A12]/60">Total Wilayah</p><span class="rounded-xl bg-[#F6EBD8] p-2 text-[#B45309]" aria-hidden="true">⌖</span></div>
            <p class="mt-5 font-display text-4xl font-semibold">{{ number_format($categoryCount) }}</p>
            <p class="mt-1 text-xs text-[#2C1A12]/50">Asal kopi pilihan</p>
        </article>
        <article class="rounded-2xl border border-[#2C1A12]/10 bg-white p-5 shadow-[0_8px_24px_rgba(44,26,18,0.04)]">
            <div class="flex items-center justify-between"><p class="text-sm font-medium text-[#2C1A12]/60">Pesanan Bulan Ini</p><span class="rounded-xl bg-[#F6EBD8] p-2 text-[#B45309]" aria-hidden="true">↗</span></div>
            <p class="mt-5 font-display text-4xl font-semibold">{{ number_format($ordersThisMonth) }}</p>
            <p class="mt-1 text-xs text-[#2C1A12]/50">Belum ada data pesanan</p>
        </article>
        <article class="rounded-2xl border border-[#2C1A12]/10 bg-white p-5 shadow-[0_8px_24px_rgba(44,26,18,0.04)]">
            <div class="flex items-center justify-between"><p class="text-sm font-medium text-[#2C1A12]/60">Pelanggan Terdaftar</p><span class="rounded-xl bg-[#F6EBD8] p-2 text-[#B45309]" aria-hidden="true">♙</span></div>
            <p class="mt-5 font-display text-4xl font-semibold">{{ number_format($customerCount) }}</p>
            <p class="mt-1 text-xs text-[#2C1A12]/50">Akun pelanggan non-admin</p>
        </article>
    </section>

    <section class="mt-9 overflow-hidden rounded-2xl border border-[#2C1A12]/10 bg-white shadow-[0_8px_24px_rgba(44,26,18,0.04)]" aria-labelledby="products-heading">
        <div class="flex flex-col gap-3 border-b border-[#2C1A12]/10 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
            <div>
                <h2 id="products-heading" class="font-display text-xl font-semibold">Daftar Produk Kopi</h2>
                <p class="mt-1 text-xs text-[#2C1A12]/55">Koleksi kopi nusantara yang dikelola di katalog.</p>
            </div>
            <a class="text-sm font-semibold text-[#B45309] transition hover:text-[#2C1A12]" href="{{ route('admin.products.index') }}">Lihat semua produk &rarr;</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[790px] text-left text-sm">
                <thead class="bg-[#FDF8EE] text-[0.65rem] uppercase tracking-[0.14em] text-[#2C1A12]/55">
                    <tr><th class="px-5 py-3.5">Produk</th><th class="px-5 py-3.5">Wilayah Asal</th><th class="px-5 py-3.5">Harga</th><th class="px-5 py-3.5">Berat</th><th class="px-5 py-3.5">Status</th><th class="px-5 py-3.5 text-right">Aksi</th></tr>
                </thead>
                <tbody class="divide-y divide-[#2C1A12]/[0.07]">
                @forelse ($recentProducts as $product)
                    <tr class="transition hover:bg-[#FDF8EE]/60">
                        <td class="px-5 py-3.5">
                            <div class="flex items-center gap-3">
                                @if ($product->image)
                                    <img class="h-12 w-12 rounded-xl object-cover" src="{{ asset('storage/'.$product->image) }}" alt="" loading="lazy">
                                @else
                                    <span class="grid h-12 w-12 place-items-center rounded-xl bg-[#F6EBD8] text-[#B45309]" aria-hidden="true">☕</span>
                                @endif
                                <span class="font-semibold">{{ $product->name }}</span>
                            </div>
                        </td>
                        <td class="px-5 py-3.5 text-[#2C1A12]/70">{{ $product->category->name }}</td>
                        <td class="whitespace-nowrap px-5 py-3.5 font-semibold">Rp{{ number_format((float) $product->price, 0, ',', '.') }}</td>
                        <td class="px-5 py-3.5 text-[#2C1A12]/70">250 g</td>
                        <td class="px-5 py-3.5"><span class="rounded-full px-2.5 py-1 text-[0.68rem] font-semibold {{ $product->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-stone-100 text-stone-700' }}">{{ $product->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td class="whitespace-nowrap px-5 py-3.5 text-right">
                            <a class="font-semibold text-[#B45309] transition hover:text-[#2C1A12]" href="{{ route('admin.products.edit', $product) }}">Edit</a>
                            <form class="ml-3 inline" method="post" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Hapus produk {{ $product->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button class="font-semibold text-red-700 transition hover:text-red-900" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-5 py-12 text-center text-sm text-[#2C1A12]/55">Belum ada produk kopi. Tambahkan produk pertama Anda.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <div class="mt-6 grid gap-4 lg:grid-cols-2">
        <section id="inquiries" class="scroll-mt-24 rounded-2xl border border-[#2C1A12]/10 bg-white p-5">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#B45309]">Pesanan / Inquiries</p>
            <h2 class="mt-2 font-display text-xl font-semibold">Belum ada data pesanan</h2>
            <p class="mt-2 text-sm leading-6 text-[#2C1A12]/60">Ringkasan pesanan akan tersedia setelah modul pesanan/inquiry ditambahkan.</p>
        </section>
        <section id="settings" class="scroll-mt-24 rounded-2xl border border-[#2C1A12]/10 bg-white p-5">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#B45309]">Pengaturan</p>
            <h2 class="mt-2 font-display text-xl font-semibold">Akun administrator</h2>
            <p class="mt-2 text-sm text-[#2C1A12]/60">{{ auth()->user()->name }} · {{ auth()->user()->email }}</p>
        </section>
    </div>
@endsection
