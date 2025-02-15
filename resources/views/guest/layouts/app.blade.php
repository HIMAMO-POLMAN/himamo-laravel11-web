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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- GSAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>

    {{-- Custom JS --}}
    <script type='text/javascript' src="{{ asset('assets-guest/js/main.js') }}"></script>
    <script src="{{ asset('assets-guest/js/dark-mode-switch.min.js') }}"></script>

    {{-- Owl Carousel --}}
    <script type='text/javascript' src="{{ asset('assets-guest/js/owl.carousel.min.js') }}"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    {{-- Additional Scripts --}}
    @stack('scripts')
</body>
</html>
