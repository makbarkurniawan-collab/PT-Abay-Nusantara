<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#2C1A12">
    <title>@yield('title', 'Dashboard Admin') — PT Abay Kopi Nusantara</title>
    @if (file_exists(public_path('images/favicon.svg')))
        <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="min-h-screen bg-[#FDF8EE] font-sans text-[#2C1A12] antialiased">
    <div class="min-h-screen md:flex">
        <aside class="hidden w-72 shrink-0 flex-col bg-[#2C1A12] px-5 py-7 text-[#FDF8EE] md:sticky md:top-0 md:flex md:h-screen">
            <a class="flex items-center gap-3 px-2" href="{{ route('admin.dashboard') }}">
                <x-brand-mark :light="true" class="h-11 w-11 shrink-0 text-[#FDF8EE]" />
                <span class="text-sm font-bold leading-5">PT Abay Kopi<br>Nusantara</span>
            </a>
            <p class="mb-3 mt-10 px-3 text-[0.65rem] font-bold uppercase tracking-[0.2em] text-white/40">Menu utama</p>
            <nav class="space-y-1" aria-label="Navigasi dashboard">
                <a class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-[#EAB308]' : 'text-white/70 hover:bg-white/5 hover:text-white' }}" href="{{ route('admin.dashboard') }}">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><rect x="3" y="3" width="8" height="8" rx="1.5"/><rect x="13" y="3" width="8" height="5" rx="1.5"/><rect x="13" y="10" width="8" height="11" rx="1.5"/><rect x="3" y="13" width="8" height="8" rx="1.5"/></svg>
                    Dashboard
                </a>
                <a class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.products.*') ? 'bg-white/10 text-[#EAB308]' : 'text-white/70 hover:bg-white/5 hover:text-white' }}" href="{{ route('admin.products.index') }}">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14l1 12H4L5 8Z"/><path stroke-linecap="round" d="M9 8a3 3 0 0 1 6 0"/></svg>
                    Kelola Produk Kopi
                </a>
                <a class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition {{ request()->routeIs('admin.categories.*') ? 'bg-white/10 text-[#EAB308]' : 'text-white/70 hover:bg-white/5 hover:text-white' }}" href="{{ route('admin.categories.index') }}">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-4.4 7-11a7 7 0 1 0-14 0c0 6.6 7 11 7 11Z"/><circle cx="12" cy="10" r="2.2"/></svg>
                    Wilayah Asal
                </a>
                <a class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-white/70 transition hover:bg-white/5 hover:text-white" href="{{ route('admin.dashboard') }}#inquiries">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16v12H9l-5 4V5Z"/><path stroke-linecap="round" d="M8 9h8M8 13h5"/></svg>
                    Pesanan / Inquiries
                </a>
            </nav>
            <p class="mb-3 mt-8 px-3 text-[0.65rem] font-bold uppercase tracking-[0.2em] text-white/40">Lainnya</p>
            <a class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-white/70 transition hover:bg-white/5 hover:text-white" href="{{ route('admin.dashboard') }}#settings">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><circle cx="12" cy="12" r="3"/><path stroke-linecap="round" stroke-linejoin="round" d="m19.4 15 .1.1a1.7 1.7 0 1 1-2.4 2.4l-.1-.1a1.7 1.7 0 0 0-2.9 1.2v.2a1.7 1.7 0 1 1-3.4 0v-.2a1.7 1.7 0 0 0-2.9-1.2l-.1.1a1.7 1.7 0 1 1-2.4-2.4l.1-.1a1.7 1.7 0 0 0-1.2-2.9H4a1.7 1.7 0 1 1 0-3.4h.2a1.7 1.7 0 0 0 1.2-2.9l-.1-.1a1.7 1.7 0 1 1 2.4-2.4l.1.1a1.7 1.7 0 0 0 2.9-1.2V2a1.7 1.7 0 1 1 3.4 0v.2a1.7 1.7 0 0 0 2.9 1.2l.1-.1a1.7 1.7 0 1 1 2.4 2.4l-.1.1a1.7 1.7 0 0 0 1.2 2.9h.2a1.7 1.7 0 1 1 0 3.4h-.2a1.7 1.7 0 0 0-1.2 2.9Z"/></svg>
                Pengaturan
            </a>
            <div class="mt-auto rounded-2xl border border-white/10 bg-white/5 p-4">
                <p class="text-xs font-semibold text-white">{{ auth()->user()->name }}</p>
                <p class="mt-1 truncate text-[0.68rem] text-white/50">{{ auth()->user()->email }}</p>
            </div>
        </aside>

        <div class="min-w-0 flex-1">
            <header class="sticky top-0 z-30 border-b border-[#2C1A12]/10 bg-white/90 backdrop-blur-md">
                <div class="mx-auto flex max-w-[1600px] items-center justify-between gap-4 px-5 py-4 sm:px-8 lg:px-10">
                    <div class="flex min-w-0 items-center gap-3">
                        <details class="group relative md:hidden">
                            <summary class="flex h-10 w-10 cursor-pointer list-none items-center justify-center rounded-full border border-[#2C1A12]/10" aria-label="Buka menu admin">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/></svg>
                            </summary>
                            <nav class="absolute left-0 top-12 w-64 rounded-2xl border border-[#2C1A12]/10 bg-[#FDF8EE] p-3 shadow-xl" aria-label="Menu admin">
                                <a class="block rounded-xl px-4 py-3 text-sm hover:bg-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                <a class="block rounded-xl px-4 py-3 text-sm hover:bg-white" href="{{ route('admin.products.index') }}">Kelola Produk Kopi</a>
                                <a class="block rounded-xl px-4 py-3 text-sm hover:bg-white" href="{{ route('admin.categories.index') }}">Wilayah Asal</a>
                                <a class="block rounded-xl px-4 py-3 text-sm hover:bg-white" href="{{ route('admin.dashboard') }}#inquiries">Pesanan / Inquiries</a>
                                <a class="block rounded-xl px-4 py-3 text-sm hover:bg-white" href="{{ route('admin.dashboard') }}#settings">Pengaturan</a>
                            </nav>
                        </details>
                        <div class="min-w-0">
                            <p class="truncate text-sm font-bold">{{ auth()->user()->name }}</p>
                            <p class="hidden truncate text-xs text-[#2C1A12]/55 sm:block">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <div class="flex shrink-0 items-center gap-2 sm:gap-4">
                        <a class="hidden text-sm font-semibold text-[#2C1A12]/70 transition hover:text-[#B45309] sm:inline" href="{{ route('home') }}">Kembali ke website</a>
                        <a class="text-sm font-semibold text-[#B45309] transition hover:text-[#2C1A12] sm:hidden" href="{{ route('home') }}" aria-label="Kembali ke website">Website</a>
                        <form method="post" action="{{ route('admin.logout') }}">
                            @csrf
                            <button class="rounded-full bg-[#2C1A12] px-4 py-2.5 text-xs font-bold text-white transition hover:bg-[#B45309]" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="mx-auto max-w-[1600px] px-5 py-8 sm:px-8 sm:py-10 lg:px-10">
                @if (session('success') || session('error'))
                    <div class="mb-6 flex items-start justify-between gap-4 rounded-2xl border px-5 py-4 {{ session('success') ? 'border-emerald-200 bg-emerald-50 text-emerald-900' : 'border-red-200 bg-red-50 text-red-900' }}" role="alert">
                        <p class="text-sm font-medium">{{ session('success') ?? session('error') }}</p>
                        <button class="rounded p-1 text-current/70 hover:text-current" type="button" aria-label="Tutup pesan" data-dismiss-alert>&times;</button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-900" role="alert">
                        <p class="font-semibold">Periksa kembali isian Anda:</p>
                        <ul class="mt-2 list-inside list-disc space-y-1 text-sm">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
