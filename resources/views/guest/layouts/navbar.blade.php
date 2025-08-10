{{-- <div class="bg-light" id="loading">
    <img class="heartbeat" src="{{ asset('assets-guest/img/load.png') }}" alt="Loading">
    <div id="bruh"></div>
</div> --}}

<header class="header" id="header">
    <div class="header_toggle">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets-guest/img/himamo.webp') }}" alt="">
        </a>
    </div>

    <div class="dropdown">
        <a href="#"><b>Tentang Kami <span> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        class="ms-2" viewBox="0 0 64 64" fill="currentColor">
                        <path d="M48.293 23.293L32 39.586 15.707 23.293l-1.414 1.561 17 17.146h1.414l17-17.146z">
                        </path>
                    </svg></span></b></a>
        <ul class="dropdown-menu">
            <li><a
                    href="{{ Route::currentRouteNamed('landing-page') ? '#ae-pustaka' : url('/#ae-pustaka') }}">Profil</a>
            </li>
            <li><a
                    href="{{ Route::currentRouteNamed('landing-page') ? '#ae-informasi' : url('/#ae-informasi') }}">Jurusan</a>
            </li>
            <li><a
                    href="{{ Route::currentRouteNamed('landing-page') ? '#ae-informasi' : url('/#ae-informasi') }}">Kabinet</a>
            </li>
        </ul>
    </div>
    <div class="dropdown">
        <a href="{{ route('guest.information.index') }}"><b>AE Informasi</b></a>
    </div>
    <div class="dropdown">
        <a href="{{ route('guest.library.index') }}"><b>AE Pustaka</b></a>
    </div>
    {{-- <div class="dropdown">
        <a href=""><b>HIMAMO Merch</b></a>
    </div>
    <div class="dropdown">
        <a href="#"><b>Form Aspirasi</b></a>
    </div> --}}
    <div class="dropdown">
        <a href="{{ route('contact') }}"><b>Hubungi Kami</b></a>
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
