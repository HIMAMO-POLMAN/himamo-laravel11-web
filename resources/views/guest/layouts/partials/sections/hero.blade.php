<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden bg-zinc-50 dark:bg-slate-950 transition-colors duration-300">
    {{-- Background Image Immersive dengan Fallback Helper asset --}}
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-70 dark:opacity-40 mix-blend-luminosity transition-opacity" style="background-image: url('{{ asset('assets-guest/img/img-carousel-1.webp') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-zinc-50/20 via-zinc-50/45 to-zinc-50/85 dark:from-slate-950/80 dark:via-slate-950/60 dark:to-slate-950"></div>

    <div class="relative z-10 text-center px-6 max-w-5xl mx-auto mt-20">
        <h1 class="text-4xl md:text-7xl font-extrabold text-slate-900 dark:text-white tracking-tight font-mono mb-4">
            WELCOME TO <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600 dark:from-teal-400 dark:to-cyan-400 font-sans">HIMAMO</span>
        </h1>

        <p class="text-xs md:text-sm font-bold tracking-widest text-slate-500 dark:text-slate-400 uppercase font-mono mb-8">
            Still The Highest. Still The Best.
        </p>

        <p class="text-base md:text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto mb-10 leading-relaxed">
            Himpunan Mahasiswa Teknik Otomasi Manufaktur & Mekatronika. Menjadi wadah pergerakan, pengembangan potensi ilmiah, dan kepribadian luhur mahasiswa.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="#prodi-gateway" class="w-full sm:w-auto px-8 py-4 bg-teal-600 hover:bg-teal-500 dark:bg-teal-500 dark:hover:bg-teal-400 text-white dark:text-slate-950 font-bold rounded-xl transition-all shadow-md dark:shadow-[0_0_20px_rgba(20,184,166,0.3)]">
                Eksplorasi Program Studi
            </a>
            <a href="#about" class="w-full sm:w-auto px-8 py-4 bg-transparent border border-slate-300 dark:border-white/20 hover:border-slate-400 dark:hover:border-white/40 text-slate-700 dark:text-white font-bold rounded-xl transition-all">
                Kenali Jurusan & Himpunan
            </a>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce">
        <span class="text-[10px] font-mono tracking-widest text-slate-400 dark:text-slate-500 uppercase">Scroll Down</span>
        <i class='bx bx-chevron-down text-xl text-slate-400 dark:text-teal-500'></i>
    </div>
</section>
