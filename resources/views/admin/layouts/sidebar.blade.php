<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/icons/logo_01.webp') }}" alt="Logo">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">
                <img src="{{ asset('assets/img/icons/logo_02.webp') }}" alt="Logo">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        @if (auth()->user()->role === 'admin')
        {{-- Pengguna --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pengguna</span>
        </li>
        <li class="menu-item {{ Route::is('user.index') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="Documentation">Pengguna</div>
            </a>
        </li>
        @endif
        {{-- Informasi & Pustaka --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Informasi & Pustaka</span>
        </li>
        <li class="menu-item {{ Request::is('ae-information*') ? 'active' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="AE Information">AE Informasi</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('ae-information/lihat-data*') ? 'active' : '' }}">
                    <a href="{{ url('ae-information/lihat-data') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-show"></i>
                        <div data-i18n="Lihat Data">Lihat Data</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('ae-information/tambah-data*') ? 'active' : '' }}">
                    <a href="{{ url('ae-information/tambah-data') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-plus"></i>
                        <div data-i18n="Tambah Data">Tambah Data</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('ae-information/kategori*') ? 'active' : '' }}">
                    <a href="{{ url('ae-information/kategori') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-category-alt"></i>
                        <div data-i18n="Kategori">Kategori</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('ae-pustaka*') ? 'active' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book-open"></i>
                <div data-i18n="AE Pustaka">AE Pustaka</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('ae-pustaka/lihat-data*') ? 'active' : '' }}">
                    <a href="{{ url('ae-pustaka/lihat-data') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-show"></i>
                        <div data-i18n="Lihat Data">Lihat Data</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('ae-pustaka/tambah-data*') ? 'active' : '' }}">
                    <a href="{{ url('ae-pustaka/tambah-data') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-plus"></i>
                        <div data-i18n="Tambah Data">Tambah Data</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Misc -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Bantuan</span>
        </li>
        <li class="menu-item">
            <a href="https://github.com/HIMAMO-Project/web-himamo" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Dokumentasi</div>
            </a>
        </li>
    </ul>
</aside>
