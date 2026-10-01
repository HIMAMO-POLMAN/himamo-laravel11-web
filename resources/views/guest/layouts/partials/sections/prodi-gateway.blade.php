<section id="prodi-gateway" class="py-24 bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-white/5 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white font-mono tracking-tight">
                PROGRAM <span class="text-teal-500">STUDI</span>
            </h2>
            <p class="text-slate-500 dark:text-slate-400 mt-4 leading-relaxed">
                Manufaktur digital menuntut integrasi mutlak. Lulusan dibekali fondasi kuat mekanika, elektronika, sistem kontrol, dan informatika industri.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- D4 TRO --}}
            <a href="{{ route('prodi.show', 'd4-tro') }}" class="group bg-zinc-50 dark:bg-slate-950 border border-slate-200/60 dark:border-white/5 rounded-2xl p-6 hover:border-teal-500/40 transition-all duration-300">
                <span class="text-xs font-bold text-teal-500 tracking-wider font-mono">D4 SARJANA TERAPAN</span>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mt-1 group-hover:text-teal-400 transition-colors">Teknologi Rekayasa Otomasi (TRO)</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-3 leading-relaxed">Fokus pada perancangan, integrasi, dan optimalisasi sistem instrumen serta kontrol otomasi lini produksi pabrik.</p>
            </a>

            {{-- D4 TRMO --}}
            <a href="{{ route('prodi.show', 'd4-trmo') }}" class="group bg-zinc-50 dark:bg-slate-950 border border-slate-200/60 dark:border-white/5 rounded-2xl p-6 hover:border-teal-500/40 transition-all duration-300">
                <span class="text-xs font-bold text-teal-500 tracking-wider font-mono">D4 SARJANA TERAPAN</span>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mt-1 group-hover:text-teal-400 transition-colors">Teknologi Rekayasa Mekatronika (TRMO)</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-3 leading-relaxed">Sinergi tingkat tinggi elektro, mekanik, sistem kontrol terprogram, dan pengembangan robotika industri.</p>
            </a>

            {{-- D4 TRIN --}}
            <a href="{{ route('prodi.show', 'd4-trin') }}" class="group bg-zinc-50 dark:bg-slate-950 border border-slate-200/60 dark:border-white/5 rounded-2xl p-6 hover:border-teal-500/40 transition-all duration-300">
                <span class="text-xs font-bold text-teal-500 tracking-wider font-mono">D4 SARJANA TERAPAN</span>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mt-1 group-hover:text-teal-400 transition-colors">Teknologi Rekayasa Informatika Industri (TRIN)</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-3 leading-relaxed">Arsitektur data eksekusi manufaktur, integrasi sistem Enterprise Resource Planning (ERP), dan AI industri 4.0.</p>
            </a>

            {{-- D4 TRSA --}}
            <a href="#" class="group bg-zinc-50 dark:bg-slate-950 border border-slate-200/60 dark:border-white/5 rounded-2xl p-6 hover:border-teal-500/40 transition-all duration-300">
                <span class="text-xs font-bold text-teal-500 tracking-wider font-mono">D4 SARJANA TERAPAN</span>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mt-1 group-hover:text-teal-400 transition-colors">Teknologi Rekayasa Sistem Aerial Nirawak (TRSA)</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-3 leading-relaxed">Rekayasa wahana terbang otonom, sistem kendali navigasi udara, avionik, dan pemantauan sensor jarak jauh.</p>
            </a>

            {{-- S2 Terapan --}}
            <div class="group bg-zinc-50 dark:bg-slate-950 border border-slate-200/60 dark:border-white/5 rounded-2xl p-6 lg:col-span-2 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold text-purple-500 tracking-wider font-mono">PROGRAM PASCASARJANA</span>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mt-1">S2 Terapan - Sistem Siber-Fisik</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-3 leading-relaxed">Spesialisasi riset tingkat lanjut yang menjembatani konvergensi antara komputasi digital, jaringan tingkat tinggi, dan proses mekanis-fisik dunia nyata.</p>
                </div>
                <div class="mt-6 text-xs text-slate-400 font-mono italic">> Advanced Engineering Track</div>
            </div>

        </div>
    </div>
</section>
