{{-- <div class="bg-light" id="loading">
    <img class="heartbeat" src="{{ asset('assets-guest/img/load.png') }}" alt="Loading">
    <div id="bruh"></div>
</div> --}}

<header class="header" id="header">
    <div class="header_toggle">
        <a href="">
            <img src="{{ asset('assets/img/icons/img-himamo-nav.png') }}" alt="">
        </a>
    </div>

    <div class="dropdown">

        <a href="#"><b>AE <span>▼</span></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ Route::currentRouteNamed('landing-page') ? '#ae-pustaka' : url('/#ae-pustaka') }}">Pustaka</a></li>
            <li><a href="{{ Route::currentRouteNamed('landing-page') ? '#ae-informasi' : url('/#ae-informasi') }}">Informasi</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <a href="#"><b>HIMAMO <span>▼</span></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{ Route::currentRouteNamed('landing.page') ? '#about' : url('/#about') }}">Tentang</a></li>
            <li><a href="{{ Route::currentRouteNamed('landing.page') ? '#history' : url('/#history') }}">Sejarah</a></li>
            <li><a href="{{ Route::currentRouteNamed('landing.page') ? '#division' : url('/#division') }}">Divisi</a></li>
            <li><a href="{{ Route::currentRouteNamed('landing.page') ? '#leader' : url('/#leader') }}">Kepemimpinan</a></li>
            <li><a href="{{ url('/kontak') }}">Kontak</a></li>
        </ul>
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
