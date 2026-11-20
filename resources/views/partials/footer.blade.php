<footer class="bg-[#2C1A12] text-[#FDF8EE]">
    <div class="mx-auto grid max-w-7xl gap-10 px-5 py-14 sm:px-8 md:grid-cols-2 lg:grid-cols-[1.4fr_0.8fr_1fr] lg:gap-16 lg:px-10 lg:py-16">
        <div>
            <a class="inline-flex items-center gap-3 text-white" href="{{ route('home') }}" aria-label="PT Abay Kopi Nusantara, beranda">
                <x-brand-mark :light="true" class="h-11 w-11 shrink-0" />
                <span class="text-base font-bold tracking-tight">PT Abay Kopi Nusantara</span>
            </a>
            <p class="mt-5 max-w-sm text-sm leading-7 text-[#FDF8EE]/70">Menghadirkan biji kopi pilihan dari berbagai daerah langsung dari petani lokal. Setiap seduhan membawa cerita dan rasa Indonesia.</p>
        </div>

        <nav aria-label="Navigasi footer">
            <h2 class="text-xs font-bold uppercase tracking-[0.18em] text-[#EAB308]">Jelajahi</h2>
            <ul class="mt-5 space-y-3 text-sm text-[#FDF8EE]/75">
                <li><a class="transition hover:text-white" href="{{ route('home') }}">Beranda</a></li>
                <li><a class="transition hover:text-white" href="{{ route('products.index') }}">Koleksi Kopi</a></li>
                <li><a class="transition hover:text-white" href="{{ route('about') }}">Tentang Kami</a></li>
            </ul>
        </nav>

        <div>
            <h2 class="text-xs font-bold uppercase tracking-[0.18em] text-[#EAB308]">Kontak & lokasi</h2>
            <address class="mt-5 space-y-3 text-sm not-italic leading-6 text-[#FDF8EE]/75">
                <p>Kemitraan petani di berbagai daerah penghasil kopi Indonesia.</p>
                <p><a class="transition hover:text-white" href="mailto:halo@abaykopi.test">halo@abaykopi.test</a></p>
                <p>Indonesia</p>
            </address>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-5 text-xs text-[#FDF8EE]/55 sm:px-8 md:flex-row md:items-center md:justify-between lg:px-10">
            <p>&copy; {{ date('Y') }} PT Abay Kopi Nusantara. Hak cipta dilindungi.</p>
            <p>Dari petani lokal, untuk penikmat kopi Indonesia.</p>
        </div>
    </div>
</footer>
