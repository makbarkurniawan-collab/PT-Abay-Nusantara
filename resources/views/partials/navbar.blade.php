<header class="sticky top-0 z-50 border-b border-[#2C1A12]/5 bg-white/90 shadow-[0_8px_24px_rgba(44,26,18,0.04)] backdrop-blur-md">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-3.5 sm:px-8 lg:px-10" aria-label="Navigasi utama">
        <a class="flex min-w-0 items-center gap-2.5 text-[#2C1A12]" href="{{ route('home') }}" aria-label="PT Abay Kopi Nusantara, beranda">
            <x-brand-mark class="h-10 w-10 shrink-0 text-[#B45309]" />
            <span class="whitespace-nowrap text-sm font-bold tracking-tight sm:text-base">PT Abay Kopi Nusantara</span>
        </a>

        <div class="hidden items-center gap-7 md:flex">
            <a class="text-sm font-medium transition hover:text-[#B45309] {{ request()->routeIs('home') ? 'text-[#B45309]' : 'text-[#2C1A12]/75' }}" href="{{ route('home') }}">Beranda</a>
            <a class="text-sm font-medium transition hover:text-[#B45309] {{ request()->routeIs('products.*') ? 'text-[#B45309]' : 'text-[#2C1A12]/75' }}" href="{{ route('products.index') }}">Produk</a>
            <a class="text-sm font-medium transition hover:text-[#B45309] {{ request()->routeIs('about') ? 'text-[#B45309]' : 'text-[#2C1A12]/75' }}" href="{{ route('about') }}">Tentang Kami</a>
            <a class="rounded-full bg-[#2C1A12] px-5 py-2.5 text-sm font-semibold text-[#FDF8EE] shadow-sm transition hover:bg-[#B45309] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#B45309]" href="{{ route('products.index') }}">Jelajahi Kopi</a>
            @auth
                @if (auth()->user()->is_admin)
                    <a class="text-sm font-semibold text-[#B45309] hover:text-[#2C1A12]" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                @else
                    <span class="max-w-28 truncate text-sm font-semibold text-[#2C1A12]" title="{{ auth()->user()->name }}">{{ auth()->user()->name }}</span>
                @endif
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button class="rounded-full border border-[#2C1A12]/15 px-4 py-2 text-sm font-semibold text-[#2C1A12] transition hover:border-[#B45309] hover:text-[#B45309]" type="submit">Logout</button>
                </form>
            @else
                <a class="text-sm font-semibold text-[#2C1A12] transition hover:text-[#B45309]" href="{{ route('login') }}">Masuk</a>
                <a class="text-sm font-semibold text-[#B45309] transition hover:text-[#2C1A12]" href="{{ route('register') }}">Daftar</a>
            @endauth
        </div>

        <details class="group relative md:hidden">
            <summary class="flex h-10 w-10 cursor-pointer list-none items-center justify-center rounded-full border border-[#2C1A12]/10 text-[#2C1A12] transition hover:bg-[#FDF8EE] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#B45309]" aria-label="Buka navigasi">
                <svg class="h-5 w-5 group-open:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/></svg>
                <svg class="hidden h-5 w-5 group-open:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="m6 6 12 12M18 6 6 18"/></svg>
            </summary>
            <div class="absolute right-0 top-12 w-64 rounded-2xl border border-[#2C1A12]/10 bg-[#FDF8EE] p-3 shadow-xl">
                <a class="block rounded-xl px-4 py-3 text-sm font-medium hover:bg-white" href="{{ route('home') }}">Beranda</a>
                <a class="block rounded-xl px-4 py-3 text-sm font-medium hover:bg-white" href="{{ route('products.index') }}">Produk</a>
                <a class="block rounded-xl px-4 py-3 text-sm font-medium hover:bg-white" href="{{ route('about') }}">Tentang Kami</a>
                <a class="mt-2 block rounded-xl bg-[#2C1A12] px-4 py-3 text-center text-sm font-semibold text-white hover:bg-[#B45309]" href="{{ route('products.index') }}">Jelajahi Kopi</a>
                @auth
                    @if (auth()->user()->is_admin)
                        <a class="mt-2 block rounded-xl px-4 py-3 text-sm font-semibold text-[#B45309] hover:bg-white" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                    @else
                        <p class="mt-2 px-4 py-3 text-sm font-semibold">{{ auth()->user()->name }}</p>
                    @endif
                    <form class="mt-1" method="post" action="{{ route('logout') }}">
                        @csrf
                        <button class="block w-full rounded-xl px-4 py-3 text-left text-sm font-semibold text-red-800 hover:bg-white" type="submit">Logout</button>
                    </form>
                @else
                    <a class="mt-2 block rounded-xl px-4 py-3 text-sm font-semibold text-[#2C1A12] hover:bg-white" href="{{ route('login') }}">Masuk</a>
                    <a class="block rounded-xl px-4 py-3 text-sm font-semibold text-[#B45309] hover:bg-white" href="{{ route('register') }}">Daftar</a>
                @endauth
            </div>
        </details>
    </nav>
</header>
