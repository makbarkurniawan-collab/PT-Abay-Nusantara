@extends('layouts.app')

@section('title', 'Tentang Kami')
@section('meta_description', 'Kenali PT Abay Kopi Nusantara, mitra kopi pilihan dari petani lokal berbagai daerah di Indonesia.')

@section('content')
    <section class="relative overflow-hidden bg-[#2C1A12] py-20 text-[#FDF8EE] sm:py-28">
        <div class="absolute -right-20 -top-32 h-96 w-96 rounded-full bg-[#B45309]/20 blur-3xl" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#EAB308]">Tentang kami</p>
            <h1 class="mt-5 max-w-4xl font-display text-4xl font-semibold leading-tight sm:text-5xl lg:text-6xl">Merayakan kekayaan kopi Indonesia, bersama petani lokal.</h1>
            <p class="mt-6 max-w-3xl text-base leading-8 text-[#FDF8EE]/75 sm:text-lg">PT Abay Kopi Nusantara menghadirkan biji kopi pilihan dari berbagai daerah langsung dari petani lokal, agar kisah dan karakter setiap asal dapat dinikmati dengan lebih dekat.</p>
        </div>
    </section>
    <section class="py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
            <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:gap-16">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B45309]">Profil perusahaan</p>
                    <h2 class="mt-3 font-display text-3xl font-semibold leading-tight sm:text-4xl">Bersumber dengan baik, diseduh dengan bangga.</h2>
                    <p class="mt-6 leading-8 text-[#2C1A12]/75">Kami percaya kopi Indonesia bukan sekadar minuman, melainkan hasil dari alam, pengetahuan, dan ketekunan para petani. Karena itu, Abay Kopi Nusantara memilih biji dengan cermat dari Gayo, Mandailing, Toraja, Kintamani, Bajawa, Preanger, dan daerah lainnya.</p>
                    <p class="mt-4 leading-8 text-[#2C1A12]/75">Dengan mendekatkan kopi dari kebun ke penikmatnya, kami ingin menjaga cerita asal-usulnya sekaligus membuka ruang apresiasi yang lebih luas bagi hasil kerja petani lokal.</p>
                </div>
                <div class="rounded-[1.75rem] border border-[#2C1A12]/10 bg-white p-7 shadow-[0_16px_50px_rgba(44,26,18,0.06)] sm:p-9">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B45309]">Visi</p>
                    <p class="mt-3 font-display text-2xl font-semibold leading-snug">Menjadi jembatan terpercaya yang membawa kualitas dan kekayaan kopi nusantara kepada lebih banyak penikmat.</p>
                    <div class="my-7 border-t border-[#2C1A12]/10"></div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#B45309]">Misi</p>
                    <ul class="mt-4 space-y-3 text-sm leading-6 text-[#2C1A12]/75">
                        <li class="flex gap-3"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#EAB308]"></span><span>Menghadirkan biji kopi pilihan yang menonjolkan karakter setiap daerah.</span></li>
                        <li class="flex gap-3"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#EAB308]"></span><span>Membangun kemitraan yang saling menghargai dengan petani lokal.</span></li>
                        <li class="flex gap-3"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#EAB308]"></span><span>Mengajak penikmat mengenal asal dan profil rasa kopi Indonesia.</span></li>
                    </ul>
                </div>
            </div>

            <div class="mt-16 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <article class="rounded-2xl border border-[#2C1A12]/10 bg-white p-6">
                    <span class="text-2xl text-[#B45309]" aria-hidden="true">01</span>
                    <h3 class="mt-4 font-display text-xl font-semibold">Asal yang jelas</h3>
                    <p class="mt-2 text-sm leading-6 text-[#2C1A12]/65">Setiap pilihan membawa cerita daerah dan petani di baliknya.</p>
                </article>
                <article class="rounded-2xl border border-[#2C1A12]/10 bg-white p-6">
                    <span class="text-2xl text-[#B45309]" aria-hidden="true">02</span>
                    <h3 class="mt-4 font-display text-xl font-semibold">Rasa yang beragam</h3>
                    <p class="mt-2 text-sm leading-6 text-[#2C1A12]/65">Dari aroma floral hingga rempah, temukan karakter yang sesuai selera Anda.</p>
                </article>
                <article class="rounded-2xl border border-[#2C1A12]/10 bg-white p-6 sm:col-span-2 lg:col-span-1">
                    <span class="text-2xl text-[#B45309]" aria-hidden="true">03</span>
                    <h3 class="mt-4 font-display text-xl font-semibold">Kemitraan lokal</h3>
                    <p class="mt-2 text-sm leading-6 text-[#2C1A12]/65">Kami mengutamakan hubungan yang dekat dan saling mendukung dengan petani.</p>
                </article>
            </div>

            <div class="mt-16 flex flex-col gap-6 rounded-[1.75rem] bg-[#2C1A12] p-7 text-[#FDF8EE] sm:p-10 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#EAB308]">Mari berbincang</p>
                    <h2 class="mt-3 font-display text-3xl font-semibold">Ingin mengenal kopi nusantara lebih dekat?</h2>
                    <p class="mt-3 text-sm text-[#FDF8EE]/70">Hubungi tim PT Abay Kopi Nusantara melalui email.</p>
                </div>
                <a class="inline-flex shrink-0 items-center justify-center rounded-full bg-[#EAB308] px-6 py-3.5 text-sm font-bold text-[#2C1A12] transition hover:bg-[#FACC15]" href="mailto:halo@abaykopi.test">halo@abaykopi.test</a>
            </div>
        </div>
    </section>
@endsection
