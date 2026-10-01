@extends('guest.layouts.app')

@section('content')
<main class="bg-zinc-50 dark:bg-slate-950 min-h-screen pt-32 pb-24 transition-colors duration-300 selection:bg-teal-500/30">
    <article class="max-w-3xl mx-auto px-6 mb-12 lg:px-0">

        {{-- Metadata & Judul --}}
        <header class="mb-10">
            <div class="flex items-center gap-3 text-sm font-bold text-teal-600 dark:text-teal-500 uppercase tracking-widest mb-6">
                <a href="{{ route('informasi.index') }}" class="hover:text-teal-400"><i class='bx bx-left-arrow-alt'></i> Kembali</a>
                <span class="text-slate-300 dark:text-slate-700">|</span>
                <span>Teknologi Terkini</span>
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-tight mb-8">
                Menguak Potensi Revolusioner Augmented Reality (AR) dan Image Processing
            </h1>

            <div class="flex items-center gap-4 py-6 border-y border-slate-200 dark:border-white/5">
                <div class="w-12 h-12 rounded-full bg-slate-200 dark:bg-slate-800 flex items-center justify-center text-slate-500 text-xl"><i class='bx bx-user'></i></div>
                <div>
                    <p class="font-bold text-slate-900 dark:text-white">Ristek HIMAMO</p>
                    <div class="flex items-center gap-2 text-sm text-slate-500">
                        <span>14 Nov 2025</span>
                        <span>&middot;</span>
                        <span>5 min read</span>
                    </div>
                </div>
            </div>
        </header>

        {{-- Hero Image Artikel --}}
        <figure class="mb-12">
            <img src="{{ asset('assets-guest/img/img-prodi-trin.webp') }}" alt="AR Processing" class="w-full h-auto rounded-2xl shadow-sm">
            <figcaption class="text-center text-xs text-slate-500 mt-3">Sistem AR pada proses perakitan engine block (Ilustrasi).</figcaption>
        </figure>

        {{-- Konten Body (The Medium Typographic Vibe) --}}
        <div class="space-y-8 text-lg text-slate-700 dark:text-slate-300 leading-loose">
            <p>
                Dalam lanskap revolusi industri 4.0, efisiensi bukan lagi tentang mempercepat putaran mesin, melainkan menekan *downtime* serendah mungkin. Di titik inilah integrasi **Image Processing** dan **Augmented Reality (AR)** masuk sebagai *game changer* absolut di lantai produksi.
            </p>

            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mt-12 mb-4 font-mono">Arsitektur Visual Cerdas</h2>
            <p>
                Kamera industri modern tidak lagi sekadar merekam. Dengan algoritma pemrosesan citra tingkat lanjut, sistem kini dapat melakukan inspeksi cacat produk (*defect detection*) dalam hitungan milidetik. Parameter kualitas dikonversi menjadi data biner yang memicu aktuator penolak seketika.
            </p>

            <blockquote class="pl-6 border-l-4 border-teal-500 italic text-xl text-slate-600 dark:text-slate-400 my-8">
                "AR menghapus kebutuhan akan manual book setebal 500 halaman. Instruksi perakitan dan titik troubleshooting kini diproyeksikan langsung ke retina teknisi."
            </blockquote>

            <p>
                Bagi mahasiswa Teknik Otomasi Manufaktur dan Mekatronika, menguasai *framework* seperti OpenCV yang dikawinkan dengan integrasi data PLC adalah kompetensi wajib di dekade ini.
            </p>
        </div>

        {{-- Share & Tags --}}
        <footer class="mt-16 pt-8 border-t border-slate-200 dark:border-white/5 flex flex-wrap items-center justify-between gap-4">
            <div class="flex gap-2">
                <span class="px-3 py-1 bg-slate-100 dark:bg-slate-900 rounded-full text-xs text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/5">#Otomasi</span>
                <span class="px-3 py-1 bg-slate-100 dark:bg-slate-900 rounded-full text-xs text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/5">#Mekatronika</span>
            </div>
            <button class="flex items-center gap-2 text-slate-500 hover:text-teal-500 transition-colors">
                <i class='bx bx-share-alt text-xl'></i> Share Article
            </button>
        </footer>

    </article>
</main>
@endsection
