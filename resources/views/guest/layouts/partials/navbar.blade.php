<header id="main-header" class="fixed top-0 inset-x-0 z-50 transition-all duration-300 border-b border-transparent py-4">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between">

        <a href="/" class="flex items-center gap-3 group">
            <div
                class="w-12 h-12 rounded-xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center transition-transform group-hover:scale-105">
                <img src="{{ asset('assets-guest/img/img-himamo.webp') }}" alt="HIMAMO Logo"
                    class="w-9 h-9 object-contain">
            </div>
            <span class="font-mono font-bold text-2xl tracking-wider text-slate-900 dark:text-white mt-0.5">
                HIMA<span class="text-teal-500">MO</span>
            </span>
        </a>

        <nav class="hidden md:flex items-center gap-8 font-medium text-sm">
            <a href="#hero"
                class="text-slate-600 dark:text-slate-400 hover:text-teal-500 dark:hover:text-white transition-colors">Beranda</a>

            <a href="#digital-hub"
                class="text-slate-600 dark:text-slate-400 hover:text-teal-500 dark:hover:text-white transition-colors">Digital
                Hub</a>

            <a href="#prodi-gateway"
                class="text-slate-600 dark:text-slate-400 hover:text-teal-500 dark:hover:text-white transition-colors">Program
                Studi</a>

            <div class="relative group py-4">
                <button
                    class="flex items-center gap-1 text-slate-600 dark:text-slate-400 group-hover:text-teal-500 dark:group-hover:text-white transition-colors outline-none cursor-pointer">
                    Tentang Kami <i
                        class='bx bx-chevron-down text-lg transition-transform duration-300 group-hover:-rotate-180'></i>
                </button>

                <div
                    class="absolute top-full left-0 mt-[-8px] w-56 bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 overflow-hidden">
                    <div class="p-2 flex flex-col">
                        <a href="#about"
                            class="px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-teal-500 dark:hover:text-white rounded-xl transition-colors">Profil
                            & Sejarah</a>
                        <a href="#division"
                            class="px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-teal-500 dark:hover:text-white rounded-xl transition-colors">Struktur
                            Bidang</a>
                        <a href="#leadership"
                            class="px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-teal-500 dark:hover:text-white rounded-xl transition-colors">Kepemimpinan</a>
                        <a href="#media"
                            class="px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-teal-500 dark:hover:text-white rounded-xl transition-colors">Momen
                            & Dokumentasi</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex items-center gap-4">
            <button id="theme-toggle"
                class="p-2.5 rounded-lg border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-900 transition-all"
                aria-label="Toggle Theme">
                <i id="theme-toggle-dark-icon" class="bx bx-moon text-xl hidden"></i>
                <i id="theme-toggle-light-icon" class="bx bx-sun text-xl hidden"></i>
            </button>

            <button id="mobile-menu-toggle"
                class="md:hidden p-2 text-slate-600 dark:text-slate-400 hover:text-teal-500 transition-colors"
                aria-label="Open Menu">
                <i class='bx bx-menu text-2xl'></i>
            </button>
        </div>
    </div>

    <div id="mobile-menu"
        class="hidden md:hidden absolute top-full inset-x-0 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-white/5 p-6 flex flex-col gap-4 shadow-xl max-h-[85vh] overflow-y-auto">

        <a href="#hero" class="font-medium text-slate-700 dark:text-slate-300 hover:text-teal-500">Beranda</a>
        <a href="#digital-hub" class="font-medium text-slate-700 dark:text-slate-300 hover:text-teal-500">Digital
            Hub</a>
        <a href="#prodi-gateway" class="font-medium text-slate-700 dark:text-slate-300 hover:text-teal-500">Program
            Studi</a>

        <div class="pt-4 border-t border-slate-100 dark:border-white/5 flex flex-col gap-4">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest font-mono">Tentang Kami</span>

            <a href="#about"
                class="font-medium text-slate-600 dark:text-slate-400 hover:text-teal-500 pl-4 border-l-2 border-slate-100 dark:border-white/10">Profil
                & Sejarah</a>
            <a href="#division"
                class="font-medium text-slate-600 dark:text-slate-400 hover:text-teal-500 pl-4 border-l-2 border-slate-100 dark:border-white/10">Struktur
                Bidang</a>
            <a href="#leadership"
                class="font-medium text-slate-600 dark:text-slate-400 hover:text-teal-500 pl-4 border-l-2 border-slate-100 dark:border-white/10">Kepemimpinan</a>
            <a href="#media"
                class="font-medium text-slate-600 dark:text-slate-400 hover:text-teal-500 pl-4 border-l-2 border-slate-100 dark:border-white/10">Momen
                & Dokumentasi</a>
        </div>
    </div>
</header>

<script>
    // Logic Header Blur saat Scroll
    const header = document.getElementById('main-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            header.classList.add('bg-white/80', 'dark:bg-slate-950/80', 'backdrop-blur-md',
                'border-slate-200/50', 'dark:border-white/5', 'shadow-sm');
        } else {
            header.classList.remove('bg-white/80', 'dark:bg-slate-950/80', 'backdrop-blur-md',
                'border-slate-200/50', 'dark:border-white/5', 'shadow-sm');
        }
    });

    // Mobile Menu Toggle
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    mobileToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Dark Mode Switch Logic
    const themeToggleBtn = document.getElementById('theme-toggle');
    const darkIcon = document.getElementById('theme-toggle-dark-icon');
    const lightIcon = document.getElementById('theme-toggle-light-icon');

    // Set icon sesuai state awal
    if (document.documentElement.classList.contains('dark')) {
        lightIcon.classList.remove('hidden');
    } else {
        darkIcon.classList.remove('hidden');
    }

    themeToggleBtn.addEventListener('click', () => {
        darkIcon.classList.toggle('hidden');
        lightIcon.classList.toggle('hidden');

        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
</script>
