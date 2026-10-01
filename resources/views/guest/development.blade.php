@extends('guest.layouts.app')

@section('content')
<main class="min-h-screen bg-zinc-50 dark:bg-slate-950 pt-32 pb-24 transition-colors duration-300">
    <div class="max-w-3xl mx-auto px-6 lg:px-12">
        <div class="relative overflow-hidden rounded-3xl border border-slate-200 dark:border-white/10 bg-white dark:bg-slate-900 px-6 py-16 md:px-16 text-center shadow-sm">
            <div class="absolute -top-24 left-1/2 h-48 w-48 -translate-x-1/2 rounded-full bg-teal-500/10 blur-3xl"></div>

            <div class="relative">
                <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-teal-500/10 text-teal-500">
                    <i class="bx bx-wrench text-4xl"></i>
                </div>
                <span class="text-xs font-mono font-bold uppercase tracking-[0.2em] text-teal-500">Fitur Dalam Pengembangan</span>
                <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white md:text-5xl">
                    Maaf, halaman ini belum tersedia
                </h1>
                <p class="mx-auto mt-6 max-w-xl leading-relaxed text-slate-600 dark:text-slate-400">
                    Kami sedang menyiapkan fitur ini agar dapat digunakan dengan baik. Silakan kembali lagi nanti untuk membaca informasi, berita, dan menjelajahi pustaka HIMAMO.
                </p>
                <a href="{{ route('home') }}" class="mt-8 inline-flex items-center gap-2 rounded-xl bg-teal-600 px-6 py-3 font-bold text-white transition-colors hover:bg-teal-500 dark:bg-teal-500 dark:text-slate-950 dark:hover:bg-teal-400">
                    <i class="bx bx-left-arrow-alt text-xl"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
