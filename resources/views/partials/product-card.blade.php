@php
    $productPhoto = match ($product->slug) {
        'gayo-aceh' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?auto=format&fit=crop&w=960&q=80',
        'mandailing' => 'https://images.unsplash.com/photo-1442512595331-e89e73853f31?auto=format&fit=crop&w=960&q=80',
        'toraja-sapan' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=960&q=80',
        default => asset('storage/'.$product->image),
    };
@endphp

<article class="group overflow-hidden rounded-[1.5rem] border border-[#2C1A12]/[0.07] bg-white shadow-[0_12px_35px_rgba(44,26,18,0.06)] transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
    <a class="relative block aspect-[4/3] overflow-hidden bg-[#E8DCC8]" href="{{ route('products.show', $product->slug) }}" aria-label="Lihat detail {{ $product->name }}">
        <img class="h-full w-full object-cover transition duration-700 group-hover:scale-105" src="{{ $productPhoto }}" alt="Kopi {{ $product->name }}" loading="lazy">
        <span class="absolute left-4 top-4 rounded-full border border-white/35 bg-[#2C1A12]/75 px-3 py-1.5 text-[0.62rem] font-bold uppercase tracking-[0.16em] text-white backdrop-blur-sm">{{ $product->category->name }}</span>
    </a>
    <div class="p-5 sm:p-6">
        <p class="text-[0.65rem] font-bold uppercase tracking-[0.18em] text-[#B45309]">{{ $product->category->name }}</p>
        <h3 class="mt-2 font-display text-2xl font-semibold text-[#2C1A12]">
            <a class="transition hover:text-[#B45309]" href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
        </h3>
        <p class="mt-3 min-h-[3rem] text-sm leading-6 text-[#2C1A12]/65">{{ \Illuminate\Support\Str::limit($product->description, 110) }}</p>
        <div class="mt-5 flex flex-wrap items-end justify-between gap-3 border-t border-[#2C1A12]/[0.08] pt-4">
            <div>
                <p class="text-[0.62rem] font-semibold uppercase tracking-wider text-[#2C1A12]/45">Mulai dari</p>
                <p class="mt-1 font-bold text-[#2C1A12]">Rp{{ number_format((float) $product->price, 0, ',', '.') }} <span class="text-xs font-medium text-[#2C1A12]/55">/ 250 gram</span></p>
            </div>
            <a class="inline-flex items-center gap-1.5 text-xs font-bold text-[#B45309] transition hover:text-[#2C1A12]" href="{{ route('products.show', $product->slug) }}">
                Detail produk <span aria-hidden="true">&rarr;</span>
            </a>
        </div>
    </div>
</article>
