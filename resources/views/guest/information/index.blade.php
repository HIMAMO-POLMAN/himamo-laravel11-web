@extends('guest.layouts.app')
@section('content')
<div class="wrap bg-light d-flex flex-column min-vh-100">
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

    <section id="ae-informasi" class="about bg-light content-ae-informasi flex-grow-1">
        <div class="justify-content-center search-bar">
            <form class="d-flex justify-content-center" method="GET" action="{{ url()->current() }}">
                <div class="input-group mb-3 input-search">
                    <input type="text" name="search" class="form-control bg-light text-dark search-input" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary search-button" type="submit" id="button-addon2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 19L14.65 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <div class="pt-5">
            <div class="container search-info d-flex flex-column gap-2 gap-sm-0 flex-sm-row justify-content-between">
                <div class="text-dark search-text">
                    Ditemukan {{ $informasi->total() }} pencarian Anda melalui kata kunci: {{ request('search') ?? '(Semua)' }}
                </div>
                <div class="sort-by d-flex flex-column flex-lg-row align-items-left align-items-lg-center">
                    <div class="sort-by-text text-dark mb-2">Pilih berdasarkan :</div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle bg-light text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Paling Relevan
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="ms-2" viewBox="0 0 64 64">
                                <path d="M48.293 23.293L32 39.586 15.707 23.293l-1.414 1.561 17 17.146h1.414l17-17.146z"></path>
                            </svg>
                        </button>
                        <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item text-dark" href="#">Paling Relevan</a></li>
                            <li><a class="dropdown-item text-dark" href="#">Terbaru</a></li>
                            <li><a class="dropdown-item text-dark" href="#">Sering Dibaca</a></li>
                            <li><a class="dropdown-item text-dark" href="#">Tahun terbit (terbaru)</a></li>
                            <li><a class="dropdown-item text-dark" href="#">Tahun terbit (terlama)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-sm pb-3">
            <div class="pt-3 info-list informasi-list">
                @foreach ($informasi as $item)
                    <div class="informasi-content">
                        <a class="text-center text-dark" href="{{ url('ae-informasi/detail/' . $item->slug) }}">
                            <div class="info-box">
                                <div class="img-box align-items-center">
                                    <img src="{{ asset('storage/informasi/' . $item->image) }}" alt="Gambar {{ $item->title }}" class="info-image mx-auto" loading="lazy">
                                </div>
                                <p class="info-title text-dark mt-2">{{ $item->title }}</p>
                                <p class="info-excerpt text-dark">{{ $item->excerpt }}</p>
                                <p class="info-date text-dark">{{ date('d/m/Y', strtotime($item->created_at)) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="pagination-wrapper d-flex justify-content-center mt-4">
            {{ $informasi->links() }}
        </div>
    </section>
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
    // Scroll to top button
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

    // Dark mode switch
    var moon = document.querySelector('.btn-moon');
    var sun = document.querySelector('.btn-sun');
    document.getElementById("darkSwitch").addEventListener("click", function() {
        moon.classList.toggle('d-none');
        sun.classList.toggle('d-none');
    });

    // Dropdown icon toggle
    document.getElementById('dropdownMenuButton').addEventListener('click', function() {
        const icon = this.querySelector('svg');
        icon.classList.toggle('rotate-180');
    });

    // User button toggle
    var user_button = document.querySelector('.bxs-user-circle');
    var settings_account = document.querySelector('.settings_account');
    user_button.addEventListener("click", function() {
        settings_account.classList.toggle('d-none');
    });
</script>
@endpush
