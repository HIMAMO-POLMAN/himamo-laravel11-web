{{-- layouts utama --}}
@extends('guest.layouts.app')

@section('content')
    <main class="bg-zinc-50 dark:bg-slate-950 text-slate-800 dark:text-slate-300 font-sans min-h-screen selection:bg-teal-500/30 transition-colors duration-300">

        {{-- HERO SECTION --}}
        <section class="relative pt-32 pb-20 px-6 lg:px-12 border-b border-slate-200 dark:border-white/5 overflow-hidden">
            {{-- Efek Grid Background untuk nuansa Engineering --}}
            <div class="absolute inset-0 bg-[url('/img/grid-pattern.svg')] opacity-5"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-teal-500/10 blur-[120px] rounded-full pointer-events-none"></div>

            <div class="max-w-6xl mx-auto relative z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-500/10 border border-teal-500/20 text-teal-600 dark:text-teal-400 text-sm font-semibold tracking-widest uppercase mb-6">
                    <span class="w-2 h-2 rounded-full bg-teal-500 dark:bg-teal-400 animate-pulse"></span>
                    {{ $prodi['kode'] }}
                </div>
                <h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-tight mb-6">
                    {{ $prodi['nama_lengkap'] }}
                </h1>
                <p class="text-lg md:text-xl text-slate-600 dark:text-slate-400 max-w-3xl leading-relaxed">
                    {{ $prodi['deskripsi_singkat'] }}
                </p>
            </div>
        </section>

        {{-- MAIN CONTENT GRID --}}
        <section class="max-w-6xl mx-auto px-6 lg:px-12 py-16 grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- Kiri: Detail Informasi (2 Kolom) --}}
            <div class="lg:col-span-2 space-y-12">

                {{-- Visi --}}
                <div class="group">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-3">
                        <span class="w-8 h-[2px] bg-teal-500"></span> Visi
                    </h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed bg-white dark:bg-slate-900/50 p-6 rounded-xl border border-slate-200 dark:border-white/5 shadow-sm dark:shadow-none transition duration-300 group-hover:border-teal-500/30">
                        "{{ $prodi['visi'] }}"
                    </p>
                </div>

                {{-- Keunggulan --}}
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                        <span class="w-8 h-[2px] bg-teal-500"></span> Keunggulan Kompetensi
                    </h2>
                    <ul class="space-y-4">
                        @foreach ($prodi['keunggulan'] as $item)
                            <li class="flex items-start gap-4 bg-white dark:bg-slate-900/50 p-4 rounded-lg border border-slate-200 dark:border-white/5 shadow-sm dark:shadow-none">
                                <div class="mt-1 flex-shrink-0 text-teal-500 dark:text-teal-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-slate-600 dark:text-slate-300">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            {{-- Kanan: Sidebar Informasi & CTA (1 Kolom) --}}
            <aside class="space-y-6">
                {{-- Foto Gedung/Prodi --}}
                <div class="rounded-2xl overflow-hidden border border-slate-200 dark:border-white/10 shadow-xl dark:shadow-2xl relative group">
                    <div class="absolute inset-0 bg-teal-500/20 opacity-0 group-hover:opacity-100 transition-opacity z-10"></div>
                    <img src="{{ asset('assets-guest/img/' . $prodi['image_cover']) }}" alt="{{ $prodi['nama_lengkap'] }}"
                        class="w-full h-auto object-cover grayscale group-hover:grayscale-0 transition duration-500">
                </div>

                {{-- Card Info Akademik --}}
                <div class="bg-white dark:bg-gradient-to-br dark:from-slate-900 dark:to-slate-950 p-6 rounded-2xl border border-slate-200 dark:border-white/5 shadow-sm dark:shadow-none">
                    <h3 class="text-sm text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-2">Gelar Kelulusan</h3>
                    <p class="text-lg font-bold text-teal-600 dark:text-teal-400 mb-6">{{ $prodi['gelar'] }}</p>

                    <hr class="border-slate-100 dark:border-white/5 mb-6">

                    <a href="{{ $prodi['link_bahan_ajar'] }}" target="_blank" rel="noopener"
                        class="w-full inline-flex justify-center items-center gap-2 bg-teal-500 hover:bg-teal-400 text-slate-950 font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-[0_0_20px_rgba(20,184,166,0.4)]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Akses Bahan Ajar
                    </a>
                </div>
            </aside>
        </section>

        {{-- NAVIGASI PRODI LAIN --}}
        <section class="border-t border-slate-200 dark:border-white/5 bg-slate-100/50 dark:bg-slate-900/30 py-16 px-6 lg:px-12">
            <div class="max-w-6xl mx-auto">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-8">Eksplorasi Program Studi Lainnya</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($otherProdi as $other)
                        <a href="{{ route('prodi.show', $other['slug']) }}"
                            class="group block p-6 bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-white/5 hover:border-teal-500/50 shadow-sm dark:shadow-none transition-all duration-300 hover:-translate-y-1">
                            <span class="text-teal-600 dark:text-teal-500 text-xs font-bold tracking-widest uppercase mb-2 block">{{ $other['kode'] }}</span>
                            <h4 class="text-slate-800 dark:text-white font-bold group-hover:text-teal-500 dark:group-hover:text-teal-400 transition-colors">
                                {{ $other['nama_lengkap'] }}
                            </h4>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

    </main>
@endsection
