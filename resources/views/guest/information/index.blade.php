@extends('guest.layouts.app')
@section('title', 'AE Informasi | HIMAMO')
@section('meta_description', 'Dapatkan informasi terbaru seputar jurusan Teknik Otomasi Manufaktur dan Mekatronika, termasuk berita terkini, acara mendatang, prestasi mahasiswa, lowongan pekerjaan, dan perkembangan teknologi di bidang ini.')
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
                        <input type="text" name="search" class="form-control bg-light text-dark search-input"
                            placeholder="Cari" aria-label="Search" value="{{ old('search', request('search')) }}">
                        <button class="btn btn-primary search-button" type="submit" id="button-addon2">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 19L14.65 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    @if (request('kategori'))
                        <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                    @endif
                </form>
            </div>

            <div class="pt-5">
                <div class="container search-info d-flex flex-column gap-2 gap-sm-0 flex-sm-row justify-content-between ">
                    @if (request('search'))
                        <div class="text-dark search-text">
                            Ditemukan {{ $informasi->total() }} pencarian Anda melalui kata kunci:
                            {{ request('search') }}
                        </div>
                    @else
                        <div></div>
                    @endif

                    <div class="sort-by d-flex flex-column flex-lg-row align-items-left align-items-lg-center">
                        <div class="sort-by-text text-dark mb-2">Pilih berdasarkan :</div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle bg-light text-dark" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @switch($currentSort)
                                    @case('terlama')
                                        Terlama
                                    @break

                                    @case('trending')
                                        Trending
                                    @break

                                    @default
                                        Terbaru
                                @endswitch
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="ms-2"
                                    viewBox="0 0 64 64">
                                    <path
                                        d="M48.293 23.293L32 39.586 15.707 23.293l-1.414 1.561 17 17.146h1.414l17-17.146z">
                                    </path>
                                </svg>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end bg-light border-0 shadow rounded mt-2"
                                aria-labelledby="dropdownMenuButton">
                                <li>
                                    <h6 class="dropdown-header text-uppercase">URUTKAN</h6>
                                </li>
                                <li>
                                    <a class="dropdown-item text-dark {{ $currentSort === 'terbaru' ? 'active' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['sort' => 'terbaru']) }}">Terbaru</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-dark {{ $currentSort === 'terlama' ? 'active' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['sort' => 'terlama']) }}">Terlama</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-dark {{ $currentSort === 'trending' ? 'active' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['sort' => 'trending']) }}">Trending</a>
                                </li>
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
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                            class="info-image mx-auto">
                                    </div>
                                    <p class="info-date text-dark mt-2">{{ $item->category->name }}</p>
                                    <p class="info-title text-dark mt-2 d-block d-sm-none">
                                        {{ Str::limit($item->title, 26) }}</p>
                                    <p class="info-title text-dark mt-2 d-none d-md-none">
                                        {{ Str::limit($item->title, 32) }}</p>
                                    <p class="info-title text-dark mt-2 d-none text-break d-md-block">
                                        {{ Str::limit($item->title, 20) }}</p>
                                    <p class="info-date text-dark">
                                        {{ \Carbon\Carbon::parse($item->created_at)->locale('id')->translatedFormat('d F Y') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            @php
                $currentPage = $informasi->currentPage();
                $lastPage = $informasi->lastPage();
            @endphp

            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    {{-- Previous Page Link --}}
                    <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                        <a class="page-link text-white btn-primary" href="{{ $informasi->url($currentPage - 1) }}"
                            aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    {{-- Page Number Links --}}
                    @for ($i = 1; $i <= $lastPage; $i++)
                        <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                            <a class="page-link text-white btn-primary"
                                href="{{ $informasi->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Next Page Link --}}
                    <li class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}">
                        <a class="page-link text-white btn-primary" href="{{ $informasi->url($currentPage + 1) }}"
                            aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>

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

        .dropdown-item.active {
            background-color: #f8f9fa;
            font-weight: bold;
        }
    </style>
@endpush
