@include('guest.layouts.header')
<body onload="load()" id="body-pd">
    <div id="app">

        @include('guest.layouts.navbar')
        <a onclick="topFunction()">
            <div id="myBtn" class="scroll-up text-center butonUP">
                <span>
                    <i class='text-white pt-2 bx bx-up-arrow-alt'></i>
                </span>
            </div>
        </a>
        @include('guest.layouts.footer')
    </div>

    {{-- Scripts --}}

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    {{-- GSAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js" defer></script>

    {{-- Navigasi JS --}}
    <script src="{{ asset('assets-guest/js/dark-mode-switch.min.js') }}" defer></script>
    <script src="{{ asset('assets-guest/js/navbar.js') }}" defer></script>

    {{-- Owl Carousel --}}
    <script type='text/javascript' src="{{ asset('assets-guest/js/owl.carousel.min.js') }}"></script>

    {{-- Additional Scripts --}}
    @stack('scripts')
</body>
</html>
