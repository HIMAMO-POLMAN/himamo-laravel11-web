@extends('guest.layouts.app')
@section('content')
    <div class="wrap bg-light">
        <div class="contain-ae-informasi">
            <div class="container pt-4 pb-5">
                <div class="row">
                    <div class="col pt-4">
                        <div class="row slider-text text-center">
                            <h1 class="pt-5 quote"><span>AE</span> Informasi</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="ae-informasi" class="about bg-light">
            <div class="container pb-3">
                <div class="row pt-3 info-list">
                    @foreach ($informasi as $item)
                        <div class="col-lg-3 col-md-4 mb-4">
                            <a class="text-center" href="{{ url('ae-informasi/detail/' . $item->slug) }}">
                                <div class="info-box">
                                    <div class="img-box align-items-center">
                                        <img src="{{ asset('storage/informasi/' . $item->image) }}" alt="{{ $item->title }}"
                                            class="info-image rounded mx-auto" loading="lazy">
                                    </div>
                                    <p class="info-date">{{ date('d/m/Y', strtotime($item->created_at)) }}</p>
                                    <p class="info-title">{{ $item->title }}</p>
                                    <p>{{ $item->excerpt }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{ $informasi->links() }}
    </div>
@endsection

@push('styles')
    <style>
        .info-image {
            width: 100%;
            height: 653px;
            object-fit: cover;
            border-radius: 15px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        var mybutton = document.getElementById("myBtn");

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll > 20) {
                mybutton.style.display = "block";
                document.getElementById("header").classList.add('bg-light');
            } else {
                mybutton.style.display = "none";
                document.getElementById("header").classList.remove('bg-light');
            }
        });
    </script>
    <script>
        var moon = document.querySelector('.btn-moon');
        var sun = document.querySelector('.btn-sun');

        document.getElementById("darkSwitch").addEventListener("click", function() {
            moon.classList.toggle('d-none');
            sun.classList.toggle('d-none');
        });
    </script>
    <script>
        var user_button = document.querySelector('.bxs-user-circle');
        var settings_account = document.querySelector('.settings_account');
        user_button.addEventListener("click", function() {
            settings_account.classList.toggle('d-none');
        });
    </script>
@endpush
