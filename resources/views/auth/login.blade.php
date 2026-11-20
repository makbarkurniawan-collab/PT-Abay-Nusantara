<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#FDF8EE">
    <title>Masuk — PT Abay Kopi Nusantara</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#FDF8EE] font-sans text-[#2C1A12] antialiased">
    <main class="min-h-screen lg:grid lg:grid-cols-[1fr_0.9fr]">
        @include('partials.auth-story', [
            'eyebrow' => 'Selamat datang kembali',
            'quote' => 'Setiap seduhan menyimpan cerita tentang asal, ketekunan, dan rasa.',
        ])
        <section class="flex items-center justify-center px-5 py-12 sm:px-10 lg:px-14">
            <div class="w-full max-w-md">
                <a class="text-sm font-semibold text-[#B45309] transition hover:text-[#2C1A12]" href="{{ route('home') }}">&larr; Kembali ke beranda</a>
                <p class="mt-10 text-xs font-bold uppercase tracking-[0.2em] text-[#B45309]">Akun Abay Kopi</p>
                <h1 class="mt-3 font-display text-4xl font-semibold sm:text-5xl">Senang bertemu kembali.</h1>
                <p class="mt-4 text-sm leading-7 text-[#2C1A12]/65">Masuk untuk melanjutkan perjalanan Anda bersama kopi nusantara.</p>

                @if (session('success'))
                    <div class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900" role="status">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="mt-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800" role="alert">{{ $errors->first() }}</div>
                @endif

                <form class="mt-8 space-y-5" method="post" action="{{ route('login.store') }}">
                    @csrf
                    <div>
                        <label class="mb-2 block text-sm font-semibold" for="email">Email</label>
                        <input class="w-full rounded-xl border border-[#2C1A12]/15 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-[#2C1A12]/35 focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15 @error('email') border-red-500 @enderror" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="username" required autofocus>
                        @error('email')<p class="mt-2 text-xs text-red-700">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <div class="mb-2 flex items-center justify-between gap-3">
                            <label class="block text-sm font-semibold" for="password">Password</label>
                        </div>
                        <input class="w-full rounded-xl border border-[#2C1A12]/15 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-[#2C1A12]/35 focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15 @error('password') border-red-500 @enderror" id="password" name="password" type="password" placeholder="Masukkan password" autocomplete="current-password" required>
                        @error('password')<p class="mt-2 text-xs text-red-700">{{ $message }}</p>@enderror
                    </div>
                    <label class="flex items-center gap-3 text-sm text-[#2C1A12]/70">
                        <input class="h-4 w-4 rounded border-[#2C1A12]/25 accent-[#B45309]" name="remember" type="checkbox" value="1">
                        Ingat saya
                    </label>
                    <button class="w-full rounded-full bg-[#2C1A12] px-5 py-4 text-sm font-bold text-white shadow-lg shadow-[#2C1A12]/10 transition hover:bg-[#B45309] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[#B45309]" type="submit">Masuk</button>
                </form>

                <p class="mt-8 text-center text-sm text-[#2C1A12]/65">Belum punya akun?
                    <a class="font-bold text-[#B45309] hover:text-[#2C1A12]" href="{{ route('register') }}">Daftar sekarang</a>
                </p>
            </div>
        </section>
    </main>
</body>
</html>
