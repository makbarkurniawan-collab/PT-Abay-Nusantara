<section class="relative isolate flex min-h-[300px] flex-col justify-between overflow-hidden bg-[#2C1A12] px-7 py-8 text-[#FDF8EE] sm:px-10 lg:min-h-screen lg:px-14 lg:py-12">
    <img class="absolute inset-0 -z-20 h-full w-full object-cover" src="https://images.unsplash.com/photo-1442512595331-e89e73853f31?auto=format&amp;fit=crop&amp;w=1400&amp;q=85" alt="" fetchpriority="high">
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-[#2C1A12]/95 via-[#2C1A12]/75 to-[#2C1A12]/65"></div>
    <a class="inline-flex items-center gap-3 self-start" href="{{ route('home') }}">
        <x-brand-mark :light="true" class="h-11 w-11 text-[#FDF8EE]" />
        <span class="text-sm font-bold tracking-tight sm:text-base">PT Abay Kopi Nusantara</span>
    </a>
    <div class="my-12 max-w-xl lg:my-auto">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#EAB308]">{{ $eyebrow }}</p>
        <blockquote class="mt-4 font-display text-3xl font-semibold leading-tight sm:text-4xl lg:text-5xl">
            “{{ $quote }}”
        </blockquote>
        <p class="mt-5 max-w-md text-sm leading-7 text-[#FDF8EE]/75">Kenali cerita dan karakter biji kopi pilihan yang kami hadirkan langsung dari petani lokal.</p>
    </div>
    <p class="text-xs text-[#FDF8EE]/55">&copy; {{ date('Y') }} PT Abay Kopi Nusantara</p>
</section>
