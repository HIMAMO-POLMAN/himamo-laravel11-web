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

        <section id="ae-informasi" class="about bg-light content-ae-informasi">
            <div class=" justify-content-center search-bar">
                <div class="d-flex justify-content-center">
                    <div class="input-group mb-3 input-search">
                        <input type="text" class="form-control bg-light text-dark search-input" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-primary search-button" type="button" id="button-addon2">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 19L14.65 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class=" pt-5 ">
                <div class="container search-info d-flex flex-column gap-2 gap-sm-0 flex-sm-row justify-content-between">
                    <div class="text-dark search-text">Ditemukan 1XX pencarian Anda melalui kata kunci: (Nama
                        Subjek/Pencarian)
                    </div>
                    <div class="sort-by d-flex flex-column flex-lg-row align-items-left align-items-lg-center">
                        <div class="sort-by-text text-dark mb-2">Pilih berdasarkan :</div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle bg-light text-dark" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Paling Relevan <i class="fas fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item text-dark" href="#">
                                    <li>Paling Relevan</li>
                                </a>
                                <a class="dropdown-item text-dark" href="#">
                                    <li>Terbaru</li>
                                </a>
                                <a class="dropdown-item text-dark" href="#">
                                    <li>Sering Dibaca</li>
                                </a>
                                <a class="dropdown-item text-dark" href="#">
                                    <li>Tahun terbit (terbaru)</li>
                                </a>
                                <a class="dropdown-item text-dark" href="#">
                                    <li>Tahun terbit (terlama)</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-sm pb-3">
                <div class=" pt-3 info-list informasi-list">
                    @foreach ($informasi as $item)
                        <div class=" informasi-content">
                            <a class="text-center text-dark" href="{{ url('ae-informasi/detail/' . $item->slug) }}">
                                <div class="info-box">
                                    <div class="img-box align-items-center">
                                        <img src="{{ asset('storage/informasi/' . $item->image) }}"
                                            alt="{{ $item->title }}" class="info-image mx-auto" loading="lazy">
                                    </div>
                                    <p class="info-title text-dark mt-2">{{ $item->title }}</p>
                                    {{ $item->excerpt }}</p>
                                    <p class="info-date text-dark">{{ date('d/m/Y', strtotime($item->created_at)) }}</p>
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
        document.querySelector('#dropdownMenuButton').addEventListener('click', function() {
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
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
