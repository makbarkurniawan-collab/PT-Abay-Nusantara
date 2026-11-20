@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('content')
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div><p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B45309]">Pengelompokan katalog</p><h1 class="mt-2 font-display text-4xl font-semibold">Kelola kategori</h1></div>
        <a class="inline-flex items-center justify-center rounded-full bg-[#2C1A12] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#B45309]" href="{{ route('admin.categories.create') }}">Tambah kategori <span class="ml-2" aria-hidden="true">+</span></a>
    </div>
    <div class="overflow-hidden rounded-2xl border border-[#2C1A12]/10 bg-white">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[620px] text-left text-sm">
                <thead class="bg-[#FDF8EE] text-xs uppercase tracking-wider text-[#2C1A12]/60"><tr><th class="px-6 py-4">Nama</th><th class="px-6 py-4">Slug</th><th class="px-6 py-4">Jumlah produk</th><th class="px-6 py-4 text-right">Aksi</th></tr></thead>
                <tbody class="divide-y divide-[#2C1A12]/[0.07]">
                @forelse ($categories as $category)
                    <tr class="transition hover:bg-[#FDF8EE]/70">
                        <td class="px-6 py-4 font-semibold">{{ $category->name }}</td>
                        <td class="px-6 py-4 font-mono text-xs">{{ $category->slug }}</td>
                        <td class="px-6 py-4">{{ $category->products_count }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-right">
                            <a class="font-semibold text-[#B45309] hover:text-[#2C1A12]" href="{{ route('admin.categories.edit', $category) }}">Ubah</a>
                            <form class="ml-4 inline" method="post" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('Menghapus kategori juga akan menghapus produk di dalamnya. Lanjutkan?')">
                                @csrf @method('DELETE')
                                <button class="font-semibold text-red-700 hover:text-red-900" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-12 text-center text-[#2C1A12]/55">Belum ada kategori.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-t border-[#2C1A12]/10 px-6 py-4">{{ $categories->links() }}</div>
    </div>
@endsection
