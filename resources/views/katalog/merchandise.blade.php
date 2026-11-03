<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMAMO / GOODS — Official Merchandise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Barlow+Condensed:wght@600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --aqua: #20e0bd;
            --ink: #f2f4ed;
            --night: #080a09;
            --panel: #101310;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--night);
            color: var(--ink);
            font-family: 'Barlow Condensed', sans-serif;
        }

        .mono {
            font-family: 'DM Mono', monospace;
        }

        .grid-bg {
            background-image: linear-gradient(rgba(32, 224, 189, .07) 1px, transparent 1px), linear-gradient(90deg, rgba(32, 224, 189, .07) 1px, transparent 1px);
            background-size: 43px 43px;
        }

        .grain {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.04'/%3E%3C/svg%3E");
        }

        .product-card img {
            transition: transform .5s cubic-bezier(.2, .8, .2, 1), filter .5s ease;
        }

        .product-card:hover img {
            transform: scale(1.04);
            filter: saturate(1.15);
        }
    </style>
</head>

<body class="grain grid-bg">
    <header
        class="relative z-10 mx-auto flex max-w-7xl items-center justify-between border-b border-white/10 px-5 py-5 lg:px-10">
        <a href="#top" class="flex items-center gap-3" aria-label="HIMAMO Goods home"><span
                class="flex h-11 w-11 items-center justify-center rounded-full border-2 border-[#20e0bd] text-xs font-black tracking-[-.12em] text-[#20e0bd]">HM</span><span
                class="text-sm font-black uppercase tracking-[.22em]">HIMAMO <span class="font-normal text-white/40">/
                    GOODS</span></span></a>
        <nav class="hidden items-center gap-8 text-xs font-bold uppercase tracking-[.18em] text-white/50 md:flex"
            aria-label="Navigasi utama"><a class="text-[#20e0bd]" href="#koleksi">Koleksi</a><a
                class="transition hover:text-[#20e0bd]" href="#cerita">Manifesto</a><a
                class="transition hover:text-[#20e0bd]" href="#kontak">Kontak</a></nav>
        <a href="#koleksi"
            class="border border-[#20e0bd] px-4 py-2.5 text-[10px] font-black uppercase tracking-[.16em] text-[#20e0bd] transition hover:bg-[#20e0bd] hover:text-[#080a09]">Shop
            now ↗</a>
    </header>

    <main>
        <section id="top"
            class="relative z-10 mx-auto grid max-w-7xl gap-12 px-5 pb-20 pt-20 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-10 lg:pb-28 lg:pt-28">
            <div>
                <p
                    class="mono mb-7 flex items-center gap-3 text-[10px] font-bold uppercase tracking-[.26em] text-[#20e0bd]">
                    <span class="h-px w-10 bg-[#20e0bd]"></span> Official merchandise / 2026</p>
                <h1
                    class="max-w-3xl text-6xl font-black uppercase leading-[.85] tracking-[-.08em] sm:text-8xl lg:text-[8.4rem]">
                    Made to<br><span class="text-[#20e0bd]">move.</span></h1>
                <p class="mt-9 max-w-md border-l-2 border-[#20e0bd] pl-5 text-sm leading-7 text-white/55">Merchandise
                    resmi HIMAMO. Dibuat untuk mahasiswa yang tidak hanya mengikuti arus, tapi menggerakkan perubahan.
                </p>
                <div class="mt-10 flex flex-wrap items-center gap-5"><a href="#koleksi"
                        class="bg-[#20e0bd] px-7 py-4 text-xs font-black uppercase tracking-[.12em] text-[#080a09] transition hover:bg-white">Lihat
                        koleksi <span class="ml-3">↗</span></a><span
                        class="mono text-[10px] uppercase tracking-[.14em] text-white/40">● Pre-order dibuka</span>
                </div>
            </div>
            <div class="relative mx-auto w-full max-w-[520px]">
                <div class="absolute -right-8 -top-8 size-32 rounded-full border border-[#20e0bd]/40"></div>
                <div
                    class="absolute -bottom-6 -left-6 z-10 flex size-28 rotate-[-12deg] items-center justify-center rounded-full bg-[#20e0bd] text-center text-[10px] font-black uppercase leading-4 tracking-[.12em] text-[#080a09]">
                    HIMAMO<br>Built<br>Different</div>
                <div class="relative overflow-hidden border border-white/15 bg-[#151916] shadow-[18px_18px_0_#20e0bd]">
                    <img src="{{ asset('assets/katalog_assets/all.jpeg') }}" alt="Koleksi lengkap merchandise HIMAMO"
                        class="aspect-[4/4.4] w-full object-cover">
                    <div class="absolute bottom-4 left-4 mono text-[9px] uppercase tracking-[.2em] text-white/60">HM /
                        FULL COLLECTION</div>
                </div>
            </div>
        </section>

        <section id="koleksi"
            class="relative z-10 border-y border-white/10 bg-[#101310] px-5 py-20 lg:px-10 lg:py-28">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 flex flex-col justify-between gap-6 sm:flex-row sm:items-end">
                    <div>
                        <p class="mono mb-3 text-[10px] font-bold uppercase tracking-[.25em] text-[#20e0bd]">01 / The
                            collection</p>
                        <h2 class="text-5xl font-black uppercase leading-[.88] tracking-[-.07em] sm:text-7xl">
                            Choose<br><span class="text-white/35">your signal.</span></h2>
                    </div>
                    <p class="max-w-xs text-xs leading-6 text-white/45">Potongan terbatas. Karakter permanen. Setiap
                        item membawa energi HIMAMO ke luar ruang kelas.</p>
                </div>
                <div class="grid gap-x-5 gap-y-12 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ([['stiker1.jpeg', 'HM-01', 'Stiker HIMAMO', 'Koleksi stiker resmi HIMAMO.'], ['stiker2.jpeg', 'HM-02', 'Stiker HIMAMO', 'Koleksi stiker resmi HIMAMO.'], ['stiker3.jpeg', 'HM-03', 'Stiker HIMAMO', 'Koleksi stiker resmi HIMAMO.'], ['stiker4.jpeg', 'HM-04', 'Stiker HIMAMO', 'Koleksi stiker resmi HIMAMO.'], ['lanyard.jpeg', 'HM-05', 'Lanyard HIMAMO', 'Lanyard dengan identitas HIMAMO.'], ['gelang.jpeg', 'HM-06', 'Gelang HIMAMO', 'Gelang merchandise resmi HIMAMO.'], ['gantungan_kunci.jpeg', 'HM-07', 'Gantungan Kunci HIMAMO', 'Gantungan kunci merchandise HIMAMO.'], ['enamel.jpeg', 'HM-08', 'Enamel HIMAMO', 'Enamel pin dengan identitas HIMAMO.']] as $item)
                        <article class="product-card group">
                            <div class="relative mb-5 overflow-hidden border border-white/10 bg-[#1a1e1a]"><img
                                    src="{{ asset('assets/katalog_assets/' . $item[0]) }}" alt="{{ $item[2] }}"
                                    class="aspect-[4/4.5] w-full object-cover grayscale-[.2]"><span
                                    class="absolute left-3 top-3 border border-[#20e0bd] bg-[#080a09] px-2 py-1 mono text-[9px] font-bold tracking-[.18em] text-[#20e0bd]">{{ $item[1] }}</span>
                            </div>
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h3 class="text-sm font-black uppercase tracking-[-.02em]">{{ $item[2] }}</h3>
                                    <p class="mt-2 text-xs leading-5 text-white/40">{{ $item[3] }}</p>
                                </div><span
                                    class="whitespace-nowrap mono text-xs font-bold text-[#20e0bd]">Rp.xxx</span>
                            </div><button
                                class="mt-5 w-full border border-white/15 py-3 text-[10px] font-black uppercase tracking-[.16em] text-white/60 transition hover:border-[#20e0bd] hover:text-[#20e0bd]">Lihat
                                detail +</button>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="cerita" class="relative z-10 px-5 py-24 lg:px-10 lg:py-32">
            <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[.8fr_1.2fr] lg:items-end">
                <p class="mono text-[10px] font-bold uppercase tracking-[.24em] text-[#20e0bd]">02 / Our manifesto</p>
                <div>
                    <p class="max-w-4xl text-4xl font-black uppercase leading-[.9] tracking-[-.07em] sm:text-6xl">Not
                        just merch.<br><span class="text-[#20e0bd]">A mark of motion.</span></p>
                    <p class="mt-8 max-w-xl border-l border-white/20 pl-5 text-sm leading-7 text-white/45">HIMAMO adalah
                        ruang untuk tumbuh, berani mencoba, dan membangun masa depan dengan tangan sendiri. Pakai
                        identitasmu. Gerakkan ceritamu.</p>
                </div>
            </div>
        </section>
    </main>
    <footer id="kontak"
        class="relative z-10 mx-auto flex max-w-7xl flex-col gap-5 border-t border-white/10 px-5 py-8 text-[10px] font-bold uppercase tracking-[.14em] text-white/35 sm:flex-row sm:items-center sm:justify-between lg:px-10">
        <p>© {{ date('Y') }} HIMAMO / All systems operational.</p>
        <p class="text-[#20e0bd]">Instagram · himamo.official</p>
    </footer>
</body>

</html>
