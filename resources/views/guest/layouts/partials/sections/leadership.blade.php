<section id="leadership" class="py-24 bg-zinc-50 dark:bg-slate-950 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white font-mono tracking-tight">
                    LINEAGE OF <span class="text-teal-500">LEADERS</span>
                </h2>
                <p class="text-slate-500 dark:text-slate-400 mt-2">Rekam jejak kepemimpinan Ketua Himpunan Mahasiswa
                    Teknik Otomasi Manufaktur & Mekatronika.</p>
            </div>

            {{-- Navigasi Hint untuk User Layar Sentuh / Desktop --}}
            <div class="text-xs text-slate-400 font-mono hidden md:block">
                [ Geser Horizontal <i class='bx bx-right-arrow-alt'></i> ]
            </div>
        </div>

        {{-- CSS Scroll Snap Container --}}
        <div class="flex overflow-x-auto scrollbar-none snap-x snap-mandatory gap-6 pb-6">

            @forelse ($leaders as $leader)
                <div
                    class="w-[280px] md:w-[320px] flex-shrink-0 snap-start bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 p-6 rounded-2xl relative overflow-hidden group shadow-sm">
                    <div class="w-full h-48 bg-slate-100 dark:bg-slate-950 rounded-xl overflow-hidden mb-4 relative">
                        {{-- Ilustrasi Pengganti Jika Gambar Kosong/Mati --}}
                        <div
                            class="absolute inset-0 flex items-center justify-center text-slate-300 dark:text-slate-800">
                            <i class='bx bx-user-circle text-7xl'></i>
                        </div>
                        <img src="{{ $leader->image_url }}" alt="{{ $leader->name }}"
                            class="w-full h-full object-cover relative z-10" onerror="this.style.opacity='0'">
                    </div>
                    <span class="text-[10px] font-bold text-teal-500 tracking-widest uppercase block mb-1">
                        {{ $leader->position }}
                    </span>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white font-mono line-clamp-1">
                        {{ $leader->name }}</h3>

                    <div
                        class="mt-4 pt-4 border-t border-slate-100 dark:border-white/5 space-y-1 text-xs text-slate-500 dark:text-slate-400 font-mono">
                        <p>Periode: {{ $leader->period_start }} s/d {{ $leader->period_end }}</p>
                        @if ($leader->nim)
                            <p>NIM: {{ $leader->nim }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="w-full rounded-2xl border border-dashed border-slate-300 dark:border-white/10 bg-white/70 dark:bg-slate-900/50 px-6 py-12 text-center">
                    <i class='bx bx-info-circle text-4xl text-teal-500'></i>
                    <p class="mt-4 text-sm font-semibold text-slate-700 dark:text-slate-300">Data kepemimpinan belum tersedia dari database.</p>
                    <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">Informasi ketua himpunan akan ditampilkan setelah data ditambahkan.</p>
                </div>
            @endforelse

        </div>
    </div>
</section>

{{-- Tambahkan utility CSS ini di app.css untuk menghilangkan scrollbar bawaan browser --}}
<style>
    .scrollbar-none::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-none {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
