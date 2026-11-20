<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Kopi pilihan dari petani lokal berbagai daerah Indonesia bersama PT Abay Kopi Nusantara.')">
    <meta name="theme-color" content="#FDF8EE">
    <title>@yield('title', 'Beranda') — PT Abay Kopi Nusantara</title>
    @if (file_exists(public_path('images/favicon.svg')))
        <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="flex min-h-screen flex-col bg-[#FDF8EE] font-sans text-[#2C1A12] antialiased">
    @include('partials.navbar')

    @if (session('success') || session('error'))
        <div class="mx-auto mt-4 w-full max-w-7xl px-5 sm:px-8 lg:px-10" role="alert">
            <div class="flex items-start justify-between gap-4 rounded-2xl border px-5 py-4 {{ session('success') ? 'border-emerald-200 bg-emerald-50 text-emerald-900' : 'border-red-200 bg-red-50 text-red-900' }}">
                <p class="text-sm font-medium">{{ session('success') ?? session('error') }}</p>
                <button class="rounded p-1 text-current/70 transition hover:text-current focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2" type="button" aria-label="Tutup pesan" data-dismiss-alert>&times;</button>
            </div>
        </div>
    @endif

    <main class="flex-1">
        @yield('content')
    </main>

    @include('partials.footer')
    @stack('scripts')
</body>
</html>
