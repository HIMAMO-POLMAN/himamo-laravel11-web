<section id="digital-hub" class="py-24 bg-zinc-50 dark:bg-slate-950 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="mb-12">
            <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white font-mono tracking-tight">
                DIGITAL <span class="text-teal-500">HUB</span>
            </h2>
            <p class="text-slate-500 dark:text-slate-400 mt-2">Integrasi pusat data informasi, artikel ilmiah, dan modul pustaka Teknik Otomasi & Mekatronika.</p>
        </div>

        {{-- Bento Grid Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Blok 1: AE Informasi - Artikel Utama (Besar, memakan 2 kolom) --}}
            <div class="lg:col-span-2 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-8 flex flex-col justify-between shadow-sm hover:border-teal-500/30 transition-all duration-300">

                {{-- Header Sub-Seksi --}}
                <h3 class="text-xl font-bold text-slate-900 dark:text-white font-mono mb-6 flex items-center gap-2">
                    <i class='bx bx-news text-teal-500'></i> AE INFORMASI
                </h3>

                {{-- Artikel Highlight (Layout Kiri-Kanan) --}}
                <div class="flex flex-col md:flex-row gap-6 mb-8 group cursor-pointer">
                    {{-- Gambar: Dibatasi lebarnya agar proporsi bagus dan tidak terpotong parah --}}
                    <div class="w-full md:w-2/5 shrink-0 overflow-hidden rounded-2xl">
                        <img src="{{ asset('assets-guest/img/img-prodi-trin.webp') }}" alt="Artikel Terkini" class="w-full h-48 md:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>

                    {{-- Konten Artikel --}}
                    <div class="w-full md:w-3/5 flex flex-col justify-center">
                        <div class="flex items-center gap-3 text-xs font-bold text-teal-500 uppercase tracking-widest mb-3">
                            <span class="px-2 py-1 rounded border border-teal-500/20 bg-teal-500/10">Terkini</span>
                            <span>14 Nov 2025</span>
                        </div>
                        <h4 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white leading-snug mb-3 group-hover:text-teal-500 transition-colors">
                            Menguak Potensi Revolusioner Augmented Reality (AR) dan Image Processing
                        </h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-4 line-clamp-3">
                            Bagaimana integrasi teknologi penangkap citra (image processing) dan realitas berimbuh (augmented reality) mendefinisikan ulang efisiensi di lantai produksi manufaktur modern...
                        </p>
                        <div class="flex items-center justify-between mt-auto border-t border-slate-100 dark:border-white/5 pt-4">
                            <span class="text-xs text-slate-400 font-mono">Penulis: Ristek HIMAMO</span>
                            {{-- CTA Khusus Baca 1 Artikel --}}
                            <a href="{{ route('development.notice') }}" class="inline-flex items-center gap-1 text-sm font-bold text-teal-500 hover:text-teal-400">
                                Baca Artikel <i class='bx bx-right-arrow-alt text-lg'></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Global CTA: Direct ke Page Kumpulan Artikel (Sama dengan Pustaka) --}}
                <a href="{{ route('development.notice') }}" class="mt-auto w-full text-center py-3 rounded-xl bg-slate-100 dark:bg-slate-950 text-slate-700 dark:text-slate-300 hover:text-teal-500 font-bold text-sm border border-slate-200/50 dark:border-white/5 block transition-colors">
                    Lihat Semua Informasi & Berita
                </a>
            </div>

            {{-- Blok 2: AE Pustaka - Modul Praktik & Koleksi (1 Kolom) --}}
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-3xl p-8 flex flex-col justify-between shadow-sm hover:border-teal-500/30 transition-all duration-300">
                <div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white font-mono mb-4 flex items-center gap-2">
                        <i class='bx bx-book-bookmark text-teal-500' ></i> AE PUSTAKA
                    </h3>
                    <p class="text-xs text-slate-400 mb-6 leading-relaxed">Referensi terlengkap, jurnal, dan modul pembelajaran intra-jurusan.</p>

                    {{-- Mini List Modul Terkini --}}
                    <div class="space-y-4">
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-950/50 border border-slate-100 dark:border-white/5 hover:border-teal-500/30 transition-colors cursor-pointer group">
                            <div class="w-10 h-12 bg-teal-500/10 rounded flex items-center justify-center text-teal-500 font-bold text-xs border border-teal-500/20 group-hover:bg-teal-500 group-hover:text-slate-900 transition-colors">ARV</div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900 dark:text-white line-clamp-1 group-hover:text-teal-500 transition-colors">Modul ARV</h4>
                                <p class="text-[10px] text-slate-400">Koleksi TRMO</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-950/50 border border-slate-100 dark:border-white/5 hover:border-teal-500/30 transition-colors cursor-pointer group">
                            <div class="w-10 h-12 bg-teal-500/10 rounded flex items-center justify-center text-teal-500 font-bold text-xs border border-teal-500/20 group-hover:bg-teal-500 group-hover:text-slate-900 transition-colors">DIG</div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900 dark:text-white line-clamp-1 group-hover:text-teal-500 transition-colors">Praktik Digital & Mikrokontroler</h4>
                                <p class="text-[10px] text-slate-400">Koleksi TRO</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-950/50 border border-slate-100 dark:border-white/5 hover:border-teal-500/30 transition-colors cursor-pointer group">
                            <div class="w-10 h-12 bg-teal-500/10 rounded flex items-center justify-center text-teal-500 font-bold text-xs border border-teal-500/20 group-hover:bg-teal-500 group-hover:text-slate-900 transition-colors">ARD</div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900 dark:text-white line-clamp-1 group-hover:text-teal-500 transition-colors">Mikrokontroler Arduino IDE</h4>
                                <p class="text-[10px] text-slate-400">Penulis: Abyanuddin Salam</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Global CTA Pustaka --}}
                <a href="{{ route('development.notice') }}" class="mt-6 w-full text-center py-3 rounded-xl bg-slate-100 dark:bg-slate-950 text-slate-700 dark:text-slate-300 hover:text-teal-500 font-bold text-sm border border-slate-200/50 dark:border-white/5 block transition-colors">
                    Lihat Pustaka Lainnya
                </a>
            </div>

        </div>
    </div>
</section>
