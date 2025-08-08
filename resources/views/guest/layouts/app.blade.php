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

    {{-- Custom JS --}}
    <script src="{{ asset('assets-guest/js/main.js') }}" defer></script>
    <script src="{{ asset('assets-guest/js/dark-mode-switch.min.js') }}" defer></script>


    {{-- Owl Carousel --}}
    <script type='text/javascript' src="{{ asset('assets-guest/js/owl.carousel.min.js') }}"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" defer></script>

    {{-- Additional Scripts --}}
    @stack('scripts')
</body>
</html>
