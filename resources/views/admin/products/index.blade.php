@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B45309]">Katalog</p><h1 class="mt-2 font-display text-4xl font-semibold">Kelola produk</h1></div>
        <a class="inline-flex items-center justify-center rounded-full bg-[#2C1A12] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#B45309]" href="{{ route('admin.products.create') }}">Tambah produk <span class="ml-2" aria-hidden="true">+</span></a>
    </div>
    <div class="overflow-hidden rounded-2xl border border-[#2C1A12]/10 bg-white">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead class="bg-[#FDF8EE] text-xs uppercase tracking-wider text-[#2C1A12]/60"><tr><th class="px-6 py-4">Produk</th><th class="px-6 py-4">Kategori</th><th class="px-6 py-4">Harga / 250 gram</th><th class="px-6 py-4">Status</th><th class="px-6 py-4 text-right">Aksi</th></tr></thead>
                <tbody class="divide-y divide-[#2C1A12]/[0.07]">
                @forelse ($products as $product)
                    <tr class="transition hover:bg-[#FDF8EE]/70">
                        <td class="px-6 py-4 font-semibold">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->category->name }}</td>
                        <td class="px-6 py-4">Rp{{ number_format((float) $product->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4"><span class="rounded-full px-3 py-1 text-xs font-semibold {{ $product->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-stone-100 text-stone-700' }}">{{ $product->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td class="whitespace-nowrap px-6 py-4 text-right">
                            <a class="font-semibold text-[#B45309] hover:text-[#2C1A12]" href="{{ route('admin.products.edit', $product) }}">Ubah</a>
                            <form class="ml-4 inline" method="post" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf @method('DELETE')
                                <button class="font-semibold text-red-700 hover:text-red-900" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-12 text-center text-[#2C1A12]/55">Belum ada produk. Tambahkan produk pertama Anda.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-t border-[#2C1A12]/10 px-6 py-4">{{ $products->links() }}</div>
    </div>
@endsection
