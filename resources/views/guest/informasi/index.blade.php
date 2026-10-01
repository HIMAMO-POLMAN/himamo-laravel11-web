@extends('guest.layouts.app')

@section('content')
<main class="bg-zinc-50 dark:bg-slate-950 min-h-screen pt-32 pb-24 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">

        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div>
                <h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 dark:text-white font-mono tracking-tight">AE <span class="text-teal-500">INFORMASI</span></h1>
                <p class="text-slate-500 dark:text-slate-400 mt-4 max-w-2xl text-lg">Warta teknologi, artikel riset otomasi, dan jurnal kegiatan HIMAMO.</p>
            </div>
            {{-- Filter/Search --}}
            <div class="flex gap-2">
                <input type="text" placeholder="Cari artikel..." class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-sm text-slate-700 dark:text-white focus:outline-none focus:border-teal-500 w-full md:w-64">
                <button class="bg-teal-500 hover:bg-teal-400 text-slate-900 px-4 py-2.5 rounded-xl transition-colors"><i class='bx bx-search'></i></button>
            </div>
        </div>

        {{-- Featured Article (Headline) --}}
        <a href="{{ route('informasi.show') }}" class="group block mb-16 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl overflow-hidden shadow-sm hover:border-teal-500/30 transition-all">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="h-64 lg:h-full overflow-hidden">
                    <img src="{{ asset('assets-guest/img/img-prodi-trin.webp') }}" class="w-full h-full object-cover grayscale-[30%] group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700" alt="Featured">
                </div>
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <div class="flex items-center gap-3 text-xs font-bold text-teal-600 dark:text-teal-500 uppercase tracking-widest mb-4">
                        <span class="px-2.5 py-1 rounded-md bg-teal-500/10 border border-teal-500/20">Teknologi Terkini</span>
                        <span>14 Nov 2025</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white leading-tight mb-6 group-hover:text-teal-500 transition-colors">
                        Menguak Potensi Revolusioner Augmented Reality (AR) dan Image Processing
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed mb-8">
                        Bagaimana integrasi teknologi penangkap citra dan realitas berimbuh mendefinisikan ulang efisiensi di lantai produksi manufaktur modern, memangkas waktu troubleshooting hingga 40%...
                    </p>
                    <div class="flex items-center gap-4 mt-auto">
                        <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-800 flex items-center justify-center text-slate-500"><i class='bx bx-user'></i></div>
                        <div>
                            <p class="text-sm font-bold text-slate-900 dark:text-white">Ristek HIMAMO</p>
                            <p class="text-xs text-slate-500">5 min read</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        {{-- Grid Artikel Lainnya --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @for ($i = 0; $i < 6; $i++)
            <a href="{{ route('informasi.show') }}" class="group flex flex-col bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-2xl overflow-hidden shadow-sm hover:-translate-y-1 hover:border-teal-500/30 transition-all duration-300">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('assets-guest/img/img-carousel-1.webp') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Thumb">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="text-[10px] font-bold text-teal-600 dark:text-teal-500 uppercase tracking-widest mb-3">Kegiatan Himpunan</div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white leading-snug mb-3 group-hover:text-teal-500 transition-colors">
                        Implementasi PLC Tingkat Lanjut dalam Kompetisi Robotika Nasional
                    </h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 line-clamp-3 mb-6">
                        Tim robotika HIMAMO kembali menorehkan prestasi dengan rancang bangun sistem kendali terprogram yang sangat presisi...
                    </p>
                    <div class="mt-auto flex items-center justify-between text-xs text-slate-500 dark:text-slate-400">
                        <span>10 Okt 2025</span>
                        <span>3 min read</span>
                    </div>
                </div>
            </a>
            @endfor
        </div>

    </div>
</main>
@endsection
