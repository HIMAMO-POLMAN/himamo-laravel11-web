@extends('guest.layouts.app')

@section('content')
<main class="bg-zinc-50 dark:bg-slate-950 min-h-screen pt-32 pb-24 transition-colors duration-300">
    <div class="max-w-6xl mx-auto px-6 lg:px-12">

        {{-- HEADER & SEARCH --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
            <div class="flex-1">
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white font-mono tracking-tight">
                    AE <span class="text-teal-500">PUSTAKA</span>
                </h1>
                <p class="text-slate-500 dark:text-slate-400 mt-3 max-w-lg text-base">
                    Eksplorasi koleksi modul praktikum, buku referensi, dan publikasi jurnal dari berbagai disiplin ilmu otomasi.
                </p>
            </div>
            <div class="w-full md:w-80 relative group shrink-0">
                {{-- <i class="bx bx-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl group-focus-within:text-teal-500 transition-colors"></i> --}}
                <input type="text" placeholder="Cari pustaka..." class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 rounded-xl pl-12 pr-4 py-3 text-slate-700 dark:text-white placeholder-slate-400 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 shadow-sm transition-all">
            </div>
        </div>

        {{-- FILTER SECTION --}}
        <div class="mb-12">
            <h3 class="text-sm font-bold text-slate-900 dark:text-white uppercase tracking-widest mb-4 font-mono">Kategori</h3>
            <div class="flex flex-wrap gap-3">
                {{-- Active Filter --}}
                <button class="flex items-center gap-2 px-4 py-2.5 bg-teal-500 text-slate-900 font-semibold rounded-xl hover:bg-teal-400 transition-all shadow-md shadow-teal-500/30 hover:-translate-y-0.5 text-sm">
                    <i class='bx bx-check text-lg'></i>
                    <span>Semua Koleksi</span>
                    <span class="ml-1 text-xs font-bold opacity-75">(18)</span>
                </button>

                {{-- Filter Buttons --}}
                <button class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 text-slate-700 dark:text-slate-300 font-semibold rounded-xl hover:border-cyan-500/50 hover:text-cyan-600 dark:hover:text-cyan-400 transition-all text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-cyan-500"></span>
                    Seni & Lainnya (4)
                </button>

                <button class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 text-slate-700 dark:text-slate-300 font-semibold rounded-xl hover:border-amber-500/50 hover:text-amber-600 dark:hover:text-amber-400 transition-all text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                    Lifestyle (2)
                </button>

                <button class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 text-slate-700 dark:text-slate-300 font-semibold rounded-xl hover:border-rose-500/50 hover:text-rose-600 dark:hover:text-rose-400 transition-all text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                    Novela Online (6)
                </button>

                <button class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 text-slate-700 dark:text-slate-300 font-semibold rounded-xl hover:border-emerald-500/50 hover:text-emerald-600 dark:hover:text-emerald-400 transition-all text-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                    Bisnis (6)
                </button>
            </div>
        </div>

        {{-- BOOK COLLECTIONS --}}
        <div class="space-y-4 mb-16">

            {{-- Business Collection --}}
            <a href="{{ route('library.show') }}" class="group bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-white/5 shadow-sm hover:shadow-md hover:border-teal-500/30 transition-all duration-300 block">
                <div class="flex items-start gap-6 min-w-0">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-3 h-3 rounded-full bg-teal-500 flex-shrink-0"></span>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-teal-500 transition-colors">Bisnis & Entrepreneurship</h3>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-2 font-mono">38 Koleksi Buku</p>
                        <p class="text-base text-slate-600 dark:text-slate-300 line-clamp-2">
                            Panduan lengkap strategi bisnis, keuangan personal, dan pengembangan usaha di era digital modern.
                        </p>
                    </div>

                    {{-- Overlapping Books --}}
                    <div class="shrink-0 flex items-center justify-end -space-x-3 md:-space-x-5 w-24 md:w-28">
                        <div class="w-9 h-13 md:w-11 md:h-16 rounded-md overflow-hidden shadow-lg border border-slate-200 dark:border-white/10 transform group-hover:scale-105 transition-transform bg-gradient-to-br from-blue-400 via-purple-500 to-pink-600 relative shrink-0">
                            <img src="{{ asset('assets-guest/img/img-carousel-1.webp') }}" class="w-full h-full object-cover opacity-70" alt="Cover">
                        </div>
                    </div>
                </div>
            </a>

            {{-- Art & Others Collection --}}
            <a href="{{ route('library.show') }}" class="group bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-white/5 shadow-sm hover:shadow-md hover:border-cyan-500/30 transition-all duration-300 block">
                <div class="flex items-start gap-6 min-w-0">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-3 h-3 rounded-full bg-cyan-500 flex-shrink-0"></span>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-cyan-500 transition-colors">Seni & Lainnya</h3>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-2 font-mono">38 Koleksi Buku</p>
                        <p class="text-base text-slate-600 dark:text-slate-300 line-clamp-2">
                            Eksplorasi seni digital, desain grafis, fotografi, dan berbagai medium kreatif lainnya.
                        </p>
                    </div>

                    <div class="shrink-0 flex items-center justify-end -space-x-3 md:-space-x-5 w-24 md:w-28">
                        <div class="w-8 h-12 md:w-10 md:h-14 rounded-md overflow-hidden shadow-md border border-slate-200 dark:border-white/10 transform -rotate-12 scale-90 opacity-50 bg-gradient-to-br from-slate-400 to-slate-600 shrink-0"></div>
                        <div class="w-8 h-12 md:w-10 md:h-14 rounded-md overflow-hidden shadow-md border border-slate-200 dark:border-white/10 transform -rotate-6 scale-95 opacity-70 bg-gradient-to-br from-slate-500 to-slate-700 shrink-0"></div>
                        <div class="w-9 h-13 md:w-11 md:h-16 rounded-md overflow-hidden shadow-lg border border-slate-200 dark:border-white/10 transform group-hover:scale-105 transition-transform bg-gradient-to-br from-blue-400 via-purple-500 to-pink-600 relative shrink-0">
                            <img src="{{ asset('assets-guest/img/img-carousel-1.webp') }}" class="w-full h-full object-cover opacity-70" alt="Cover">
                        </div>
                    </div>
                </div>
            </a>

            {{-- Lifestyle Collection --}}
            <a href="{{ route('library.show') }}" class="group bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-white/5 shadow-sm hover:shadow-md hover:border-amber-500/30 transition-all duration-300 block">
                <div class="flex items-start gap-6 min-w-0">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-3 h-3 rounded-full bg-amber-500 flex-shrink-0"></span>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-amber-500 transition-colors">Lifestyle & Self-Development</h3>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-2 font-mono">17 Koleksi Buku</p>
                        <p class="text-base text-slate-600 dark:text-slate-300 line-clamp-2">
                            Panduan habit building, produktivitas, kesehatan mental, dan perjalanan personal development.
                        </p>
                    </div>

                    <div class="shrink-0 flex items-center justify-end -space-x-3 md:-space-x-5 w-24 md:w-28">
                        <div class="w-8 h-12 md:w-10 md:h-14 rounded-md overflow-hidden shadow-md border border-slate-200 dark:border-white/10 transform -rotate-12 scale-90 opacity-50 bg-gradient-to-br from-slate-400 to-slate-600 shrink-0"></div>
                        <div class="w-8 h-12 md:w-10 md:h-14 rounded-md overflow-hidden shadow-md border border-slate-200 dark:border-white/10 transform -rotate-6 scale-95 opacity-70 bg-gradient-to-br from-slate-500 to-slate-700 shrink-0"></div>
                        <div class="w-9 h-13 md:w-11 md:h-16 rounded-md overflow-hidden shadow-lg border border-slate-200 dark:border-white/10 transform group-hover:scale-105 transition-transform bg-gradient-to-br from-emerald-400 via-teal-500 to-cyan-600 relative shrink-0">
                            <div class="absolute inset-0 flex items-center justify-center text-white text-[8px] md:text-[9px] font-bold p-1 text-center leading-tight">ATOMIC</div>
                        </div>
                    </div>
                </div>
            </a>

            {{-- Online Novel Collection --}}
            <a href="{{ route('library.show') }}" class="group bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-white/5 shadow-sm hover:shadow-md hover:border-rose-500/30 transition-all duration-300 block">
                <div class="flex items-start gap-6 min-w-0">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-3 h-3 rounded-full bg-rose-500 flex-shrink-0"></span>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-rose-500 transition-colors">Novela & Fiksi Online</h3>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-2 font-mono">12 Koleksi Buku</p>
                        <p class="text-base text-slate-600 dark:text-slate-300 line-clamp-2">
                            Koleksi cerita fiksi, romance, fantasy, dan adventure dari penulis lokal dan internasional.
                        </p>
                    </div>

                    <div class="shrink-0 flex items-center justify-end -space-x-3 md:-space-x-5 w-24 md:w-28">
                        <div class="w-8 h-12 md:w-10 md:h-14 rounded-md overflow-hidden shadow-md border border-slate-200 dark:border-white/10 transform -rotate-12 scale-90 opacity-50 bg-gradient-to-br from-slate-400 to-slate-600 shrink-0"></div>
                        <div class="w-8 h-12 md:w-10 md:h-14 rounded-md overflow-hidden shadow-md border border-slate-200 dark:border-white/10 transform -rotate-6 scale-95 opacity-70 bg-gradient-to-br from-slate-500 to-slate-700 shrink-0"></div>
                        <div class="w-9 h-13 md:w-11 md:h-16 rounded-md overflow-hidden shadow-lg border border-slate-200 dark:border-white/10 transform group-hover:scale-105 transition-transform bg-gradient-to-br from-rose-400 via-orange-400 to-amber-500 relative shrink-0">
                            <div class="absolute inset-0 flex items-center justify-center text-white text-[6px] md:text-[7px] font-bold p-1 text-center leading-tight">AS LONG</div>
                        </div>
                    </div>
                </div>
            </a>

        </div>

        {{-- FEATURED COLLECTIONS --}}
        <div class="pt-12 border-t border-slate-200 dark:border-white/5">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-8 font-mono">Penambahan Terbaru</h3>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 md:gap-6">
                @for ($i = 0; $i < 5; $i++)
                <a href="{{ route('library.show') }}" class="group flex flex-col">
                    <div class="aspect-[3/4] rounded-xl overflow-hidden bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 shadow-sm group-hover:shadow-lg group-hover:border-teal-500/50 transition-all duration-300 relative mb-3 flex items-center justify-center">
                        <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/10 transition-colors z-10"></div>
                        <img src="{{ asset('assets-guest/img/img-carousel-1.webp') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Cover Modul">
                    </div>
                    <h4 class="text-sm font-bold text-slate-900 dark:text-white leading-snug group-hover:text-teal-500 line-clamp-2 transition-colors">Praktik Digital & Mikrokontroler</h4>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1.5 line-clamp-1 font-mono">Koleksi TRO</p>
                </a>
                @endfor
            </div>
        </div>

    </div>
</main>
@endsection
