{{-- <div class="bg-light" id="loading">
    <img class="heartbeat" src="{{ asset('assets-guest/img/load.png') }}" alt="Loading">
    <div id="bruh"></div>
</div> --}}

<header class="header" id="header">
    <div class="header_toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
    </div>
    <div class="row">
        <div class="col text-center">
            <a class="">
                <span class="buttondark">
                    <label class="switch" for="darkSwitch">
                        <input type="checkbox" id="darkSwitch">
                        <div class="darktogel">
                            <i class='btn-moon bxs-moon bx nav_icon'></i>
                            <i class='btn-sun bxs-sun d-none bx nav_icon'></i>
                        </div>
                    </label>
                </span>
            </a>
        </div>
    </div>
</header>

<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="img_logo">
                <img src="{{ asset('assets-guest/img/logo_01.webp') }}" alt="Logo">
                <span class="nav_logo-name">
                    <img src="{{ asset('assets-guest/img/logo_02.webp') }}" alt="Logo Text">
                </span>
            </a>
            <div class="nav_list">
                <a href="{{ Route::currentRouteNamed('landing-page') ? '#' : url('/') }}"
                    class="nav_link @if (Route::currentRouteNamed('landing-page')) active @endif ">
                    <i class='bx bx-home nav_icon'></i>
                    <span class="nav_name">Home</span>
                </a>
                <a href="{{ Route::currentRouteNamed('landing-page') ? '#ae-informasi' : url('/#ae-informasi') }}"
                    class="nav_link @if (Route::currentRouteNamed('information.*')) active @endif">
                    <i class='bx bxs-info-square nav_icon'></i>
                    <span class="nav_name">AE-Informasi</span>
                </a>
                <a href="{{ Route::currentRouteNamed('landing-page') ? '#ae-pustaka' : url('/#ae-pustaka') }}"
                    class="nav_link">
                    <i class='bx bxs-book nav_icon'></i>
                    <span class="nav_name">AE-Pustaka</span>
                </a>
                <a href="{{ Route::currentRouteNamed('landing-page') ? '#about' : url('/#about') }}" class="nav_link">
                    <i class='bx bx-info-circle nav_icon'></i>
                    <span class="nav_name">About</span>
                </a>
                <a href="{{ Route::currentRouteNamed('landing-page') ? '#history' : url('/#history') }}"
                    class="nav_link">
                    <i class='bx bx-time nav_icon'></i>
                    <span class="nav_name">History</span>
                </a>
                <a href="{{ Route::currentRouteNamed('landing-page') ? '#division' : url('/#division') }}"
                    class="nav_link">
                    <i class='bx bxs-network-chart nav_icon'></i>
                    <span class="nav_name">Division</span>
                </a>
                <a href="{{ Route::currentRouteNamed('landing-page') ? '#leader' : url('/#leader') }}" class="nav_link">
                    <i class='bx bxs-user-account nav_icon'></i>
                    <span class="nav_name">Leadership</span>
                </a>
                <a target="_blank" href="https://fuse2024.com/" class="nav_link">
                    <i class='bx bx-trophy nav_icon'></i>
                    <span class="nav_name">FUSE 2024</span>
                </a>
                <a href="{{ route('contact') }}" class="nav_link">
                    <i class='bx bxs-phone nav_icon'></i>
                    <span class="nav_name">Contact</span>
                </a>
            </div>
        </div>
    </nav>
</div>
