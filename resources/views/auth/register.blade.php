<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#FDF8EE">
    <title>Daftar — PT Abay Kopi Nusantara</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#FDF8EE] font-sans text-[#2C1A12] antialiased">
    <main class="min-h-screen lg:grid lg:grid-cols-[1fr_0.9fr]">
        @include('partials.auth-story', [
            'eyebrow' => 'Temukan rasa dari nusantara',
            'quote' => 'Satu cangkir dapat membawa Anda lebih dekat ke tanah asalnya.',
        ])
        <section class="flex items-center justify-center px-5 py-12 sm:px-10 lg:px-14">
            <div class="w-full max-w-md">
                <a class="text-sm font-semibold text-[#B45309] transition hover:text-[#2C1A12]" href="{{ route('home') }}">&larr; Kembali ke beranda</a>
                <p class="mt-9 text-xs font-bold uppercase tracking-[0.2em] text-[#B45309]">Bergabung bersama kami</p>
                <h1 class="mt-3 font-display text-4xl font-semibold sm:text-5xl">Mulai perjalanan rasa.</h1>
                <p class="mt-4 text-sm leading-7 text-[#2C1A12]/65">Buat akun untuk mengenal koleksi kopi pilihan dari berbagai daerah.</p>

                @if ($errors->any())
                    <div class="mt-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800" role="alert">
                        <p class="font-semibold">Mohon periksa kembali data Anda.</p>
                        <ul class="mt-2 list-inside list-disc space-y-1">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                <form class="mt-7 space-y-4" method="post" action="{{ route('register.store') }}">
                    @csrf
                    <div>
                        <label class="mb-2 block text-sm font-semibold" for="name">Nama lengkap</label>
                        <input class="w-full rounded-xl border border-[#2C1A12]/15 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-[#2C1A12]/35 focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15 @error('name') border-red-500 @enderror" id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Nama Anda" autocomplete="name" maxlength="255" required autofocus>
                        @error('name')<p class="mt-2 text-xs text-red-700">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold" for="email">Email</label>
                        <input class="w-full rounded-xl border border-[#2C1A12]/15 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-[#2C1A12]/35 focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15 @error('email') border-red-500 @enderror" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required>
                        @error('email')<p class="mt-2 text-xs text-red-700">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold" for="password">Password</label>
                        <input class="w-full rounded-xl border border-[#2C1A12]/15 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-[#2C1A12]/35 focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15 @error('password') border-red-500 @enderror" id="password" name="password" type="password" placeholder="Minimal 8 karakter" autocomplete="new-password" required>
                        @error('password')<p class="mt-2 text-xs text-red-700">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold" for="password_confirmation">Konfirmasi password</label>
                        <input class="w-full rounded-xl border border-[#2C1A12]/15 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-[#2C1A12]/35 focus:border-[#B45309] focus:ring-2 focus:ring-[#B45309]/15" id="password_confirmation" name="password_confirmation" type="password" placeholder="Ulangi password" autocomplete="new-password" required>
                    </div>
                    <button class="mt-2 w-full rounded-full bg-[#2C1A12] px-5 py-4 text-sm font-bold text-white shadow-lg shadow-[#2C1A12]/10 transition hover:bg-[#B45309] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-[#B45309]" type="submit">Daftar Sekarang</button>
                </form>

                <p class="mt-7 text-center text-sm text-[#2C1A12]/65">Sudah punya akun?
                    <a class="font-bold text-[#B45309] hover:text-[#2C1A12]" href="{{ route('login') }}">Masuk</a>
                </p>
            </div>
        </section>
    </main>
</body>
</html>
