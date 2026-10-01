@extends('guest.layouts.app')

@section('content')
    <main
        class="bg-zinc-50 dark:bg-slate-950 min-h-screen pt-32 pb-40 transition-colors duration-300 selection:bg-teal-500/30">
        <article class="max-w-4xl mx-auto mb-12 px-6 lg:px-0">

            {{-- Header & Navigation --}}
            <header class="mb-12">
                <div
                    class="flex items-center gap-3 text-sm font-bold text-teal-600 dark:text-teal-500 uppercase tracking-widest mb-8">
                    <a href="{{ route('library.index') }}" class="hover:text-teal-400 inline-flex items-center gap-1"><i
                            class='bx bx-left-arrow-alt'></i> Kembali ke Pustaka</a>
                </div>

                {{-- Category Badge --}}
                <div class="mb-6">
                    <span
                        class="inline-flex px-4 py-2 bg-teal-500/10 text-teal-600 dark:text-teal-400 text-xs font-bold uppercase rounded-lg border border-teal-500/20 font-mono">
                        Modul Praktik
                    </span>
                </div>

                {{-- Title & Author --}}
                <h1
                    class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-tight mb-4">
                    Praktik Digital dan Mikrokontroler Menggunakan Arduino IDE
                </h1>

                <div class="text-base text-slate-600 dark:text-slate-400 font-mono mb-8">
                    <span>Penulis: </span>
                    <span class="font-semibold text-slate-800 dark:text-slate-300">Abyanuddin Salam</span>
                </div>

                {{-- Metadata Grid --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 py-8 border-y border-slate-200 dark:border-white/5">
                    <div>
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-2 font-mono font-semibold">Koleksi</p>
                        <p class="text-sm font-bold text-slate-800 dark:text-slate-200">TRO & TRMO</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-2 font-mono font-semibold">Tahun Terbit
                        </p>
                        <p class="text-sm font-bold text-slate-800 dark:text-slate-200">2024</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-2 font-mono font-semibold">Halaman</p>
                        <p class="text-sm font-bold text-slate-800 dark:text-slate-200">128 Halaman</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-2 font-mono font-semibold">Format</p>
                        <p class="text-sm font-bold text-slate-800 dark:text-slate-200">PDF</p>
                    </div>
                </div>
            </header>

            <div class="flex gap-8">

                {{-- Hero Image / Cover --}}
                <figure class="mb-12 w-1/3">
                    <div class="flex flex-col gap-8 items-center sm:items-start">
                        {{-- Cover Image --}}
                        <div class="w-full sm:w-48 flex-shrink-0">
                            <div
                                class="aspect-[3/4] rounded-2xl overflow-hidden shadow-lg border border-slate-200 dark:border-white/10 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-600 flex items-center justify-center">
                                <img src="{{ asset('assets-guest/img/arduino-ide.webp') }}"
                                    alt="Cover Modul Praktik Digital dan Mikrokontroler" class="w-32 h-auto object-cover">
                            </div>
                            <figcaption class="text-center text-xs text-slate-500 dark:text-slate-400 mt-4">
                                Cover Modul - Edisi 2024
                            </figcaption>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="w-full sm:flex-1 flex flex-col gap-4">
                            <button
                                class="w-full bg-teal-500 hover:bg-teal-400 text-slate-950 font-bold py-4 px-6 rounded-xl transition-all shadow-lg shadow-teal-500/30 hover:-translate-y-1 flex items-center justify-center gap-3 text-base">
                                <i class='bx bxs-book-reader text-2xl'></i>
                                <span>Baca Modul Online</span>
                            </button>
                            <button
                                class="w-full bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800 border border-slate-200 dark:border-white/10 text-slate-700 dark:text-white font-bold py-4 px-6 rounded-xl transition-all flex items-center justify-center gap-3 text-base">
                                <i class='bx bx-download text-2xl'></i>
                                <span>Unduh PDF</span>
                            </button>

                            {{-- Info Box --}}
                            <div
                                class="bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-white/10 rounded-xl p-4 mt-2">
                                <p class="text-xs text-slate-500 dark:text-slate-400 uppercase font-mono font-bold mb-1">
                                    Ukuran File</p>
                                <p class="text-sm font-semibold text-slate-700 dark:text-slate-300">12.4 MB</p>
                            </div>
                        </div>
                    </div>
                </figure>

                {{-- Synopsis Content --}}
                <div class="w-2/3 mb-8 space-y-8 text-base md:text-lg text-slate-700 dark:text-slate-300 leading-loose">
                    <section>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4 font-mono">Tentang Modul Ini</h2>

                        <p>
                            Modul ini dirancang khusus untuk menjembatani pemahaman teoritis gerbang logika digital menuju
                            implementasi nyata menggunakan mikrokontroler berbasis arsitektur AVR (Arduino). Ditujukan bagi
                            mahasiswa tingkat dasar yang sedang menempuh mata kuliah Sistem Digital dan Pengantar Robotika.
                        </p>

                        <p class="mt-4">
                            Terdiri dari <strong>12 bab praktikum</strong> yang mencakup <strong>I/O Interfacing</strong>,
                            <strong>Pulse Width Modulation</strong> (PWM), komunikasi serial, hingga implementasi sensor
                            jarak dan aktuator motor DC. Setiap bab dilengkapi diagram wiring Fritzing dan flowchart logika
                            algoritma untuk mempermudah perancangan kode.
                        </p>
                    </section>

                    <section>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 font-mono">Materi Pembahasan</h3>
                        <ul class="space-y-2.5 ml-6">
                            <li class="flex items-start gap-3">
                                <span class="text-teal-500 font-bold mt-1">•</span>
                                <span>Pengenalan Arduino IDE dan mikrokontroler AVR</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-teal-500 font-bold mt-1">•</span>
                                <span>Dasar pemrograman C++ untuk embedded system</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-teal-500 font-bold mt-1">•</span>
                                <span>Digital I/O dan analog input processing</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-teal-500 font-bold mt-1">•</span>
                                <span>PWM untuk kontrol motor dan LED</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-teal-500 font-bold mt-1">•</span>
                                <span>Komunikasi serial UART, I2C, dan SPI</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-teal-500 font-bold mt-1">•</span>
                                <span>Implementasi sensor ultrasonik dan IR</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-teal-500 font-bold mt-1">•</span>
                                <span>Kontrol aktuator DC motor dan servo</span>
                            </li>
                        </ul>
                    </section>

                    <blockquote
                        class="pl-6 border-l-4 border-teal-500 italic text-lg text-slate-600 dark:text-slate-400 my-8">
                        "Praktikum yang sistematis dan terstruktur untuk membangun fondasi kuat dalam pemrograman
                        mikrokontroler dan sistem embedded."
                    </blockquote>

                    <section>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 font-mono">Target Audiens</h3>
                        <p>
                            Modul ini ideal untuk mahasiswa Teknik Otomasi Manufaktur (TRO) dan Teknik Robot Industri &
                            Mekatronika (TRMO) yang ingin memiliki foundational knowledge yang kuat dalam embedded systems
                            programming. Juga cocok untuk pengguna Arduino di luar institusi yang ingin belajar secara
                            terstruktur.
                        </p>
                    </section>
                </div>
            </div>

            {{-- Tags & Share --}}
            <footer
                class="mt-16 pt-8 border-t border-slate-200 dark:border-white/5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                <div class="flex flex-wrap gap-2">
                    <span
                        class="px-3 py-1.5 bg-slate-100 dark:bg-slate-900 rounded-lg text-xs text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/5 font-mono font-semibold">#TRO</span>
                    <span
                        class="px-3 py-1.5 bg-slate-100 dark:bg-slate-900 rounded-lg text-xs text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/5 font-mono font-semibold">#TRMO</span>
                    <span
                        class="px-3 py-1.5 bg-slate-100 dark:bg-slate-900 rounded-lg text-xs text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/5 font-mono font-semibold">#Mikrokontroler</span>
                    <span
                        class="px-3 py-1.5 bg-slate-100 dark:bg-slate-900 rounded-lg text-xs text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/5 font-mono font-semibold">#Arduino</span>
                </div>
                <button
                    class="flex items-center gap-2 text-slate-500 hover:text-teal-500 transition-colors font-semibold whitespace-nowrap">
                    <i class='bx bx-share-alt text-xl'></i> Bagikan
                </button>
            </footer>

        </article>
    </main>
@endsection
