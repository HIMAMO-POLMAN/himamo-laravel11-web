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
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Beranda</div>
            </a>
        </li>

        @if (auth()->user()->role === 'admin')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Pengguna</span>
            </li>
            <li
                class="menu-item {{ Request::routeIs('user.index') || Request::routeIs('user.edit') || Request::routeIs('user.create') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-pin"></i>
                    <div data-i18n="Documentation">Pengguna</div>
                </a>
            </li>
        @endif

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Informasi & Pustaka</span>
        </li>
        <li
            class="menu-item {{ Request::is('ae-information*') || Request::routeIs('information-categories.index') ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book-open"></i>
                <div data-i18n="AE Information">AE Informasi</div>
            </a>
            <ul class="menu-sub">
                <li
                    class="menu-item {{ Request::routeIs('ae-information.index') || Request::routeIs('ae-information.edit') ? 'active' : '' }}">
                    <a href="{{ route('ae-information.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-show"></i>
                        <div data-i18n="Lihat Data">Lihat Data</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('ae-information.create') ? 'active' : '' }}">
                    <a href="{{ route('ae-information.create') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-plus"></i>
                        <div data-i18n="Tambah Data">Tambah Data</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('information-categories.index') ? 'active' : '' }}">
                    <a href="{{ route('information-categories.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-bookmark"></i>
                        <div data-i18n="Kategori">Kategori</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item {{ Request::is('ae-library*') ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-library"></i>
                <div data-i18n="AE Pustaka">AE Pustaka</div>
            </a>
            <ul class="menu-sub">
                <li
                    class="menu-item {{ Request::routeIs('ae-library.index') || Request::routeIs('ae-library.edit') ? 'active' : '' }}">
                    <a href="{{ route('ae-library.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-show"></i>
                        <div data-i18n="Lihat Data">Lihat Data</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('ae-library.create') ? 'active' : '' }}">
                    <a href="{{ route('ae-library.create') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-plus"></i>
                        <div data-i18n="Tambah Data">Tambah Data</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('library-collection.index') ? 'active' : '' }}">
                    <a href="{{ route('library-collection.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-tag"></i>
                        <div data-i18n="Koleksi">Koleksi</div>
                    </a>
                </li>
            </ul>
        </li>


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
