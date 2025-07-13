@extends('guest.layouts.app')
@section('title', 'AE Pustaka | HIMAMO')
@section('meta_description',
    'AE Pustaka adalah sumber informasi dan referensi terlengkap seputar Teknik Otomasi
    Manufaktur dan Mekatronika. Temukan berbagai macam buku, jurnal, artikel, dan materi pembelajaran lainnya untuk
    mendukung pengembangan pengetahuan dan keterampilan Anda.')
@section('content')
    <style>
        #ae-pustaka {
            min-height: 100vh;
        }

        @media (max-width:992px) {
            #ae-pustaka .subject-list {
                gap: 20px;
            }
        }

        #ae-pustaka .search-info {
            padding: 10px 20px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            color: #212529;
            border-color: #028784 !important;
            box-shadow: none;
        }

        #ae-pustaka .search-info .sort-by {
            display: flex;
            align-items: center;
        }

        @media (max-width: 992px) {
            #ae-pustaka .search-info .sort-by {
                flex-direction: column;
                align-items: baseline;
            }
        }

        #ae-pustaka .search-info .sort-by-text {
            margin-right: 10px;
        }

        #ae-pustaka .book-card {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            height: auto;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 20px;
        }

        #ae-pustaka .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width:768px) {

            #ae-pustaka .book-card>.flex-row,
            #ae-pustaka .book-card>.align-self-end,
            #ae-pustaka .book-card .read-button {
                width: 100%
            }

        }

#ae-pustaka .book-cover {
    width: 120px;
    height: 160px;
    border-radius: 10px;
    background-color: #e9ecef;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 20px;
    /* overflow: hidden;  */
    /* Tambahan agar gambar tidak keluar dari frame */
}

#ae-pustaka .book-cover img{
    width: 120px;
    height: 160px;
}


        #ae-pustaka .book-info {
            flex: 1;
            color: #212529;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: left;
        }

        #ae-pustaka .book-title {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }

        #ae-pustaka .book-title a {
            color: black;
        }

        #ae-pustaka .book-details {
            font-size: 14px;
            margin-bottom: 5px;
            color: #495057;
            text-align: left;
        }

        #ae-pustaka .read-button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s ease;
            align-self: flex-end;
            width: 96px;
        }

        @media (max-width:768px) {
            #ae-pustaka .read-button {
                margin-top: 30px
            }
        }

        #ae-pustaka .read-button:hover {
            background-color: #0056b3;
        }

        #ae-pustaka .book-cards-container {
            display: grid;
            grid-template-columns: auto auto;
            flex-wrap: wrap;
            gap: 20px;
        }

        @media(max-width:992px) {
            #ae-pustaka .book-cards-container {
                grid-template-columns: auto;
            }
        }

        #ae-pustaka .book-card {
            background-color: white;
            border: 1px solid #dee2e6;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
        }

        @media (max-width: 768px) {
            #ae-pustaka .book-card {
                width: 100%;
            }
        }

        .dropdown-menu {
            min-width: auto;
            width: 100%;
        }

        .dropdown-item {
            white-space: normal;
        }


        .dropdown .dropdown-toggle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            background-color: white;
            color: black;
            border-radius: 5px;
            padding: 5px 10px;
            border: 1px solid #dee2e6;
        }

        @media (max-width:576px) {
            .dropdown .dropdown-menu {
                width: 100%;
            }
        }
    </style>

    <!-- Container Main start -->
    <div class="wrap bg-light">
        <div class="contain-ae-informasi">
            <div class="container pt-4 pb-5">
                <div class="row">
                    <div class="col pt-4">
                        <div class="row slider-text text-center">
                            <h1 class="pt-5 quote"><span>AE</span> Pustaka</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="ae-pustaka" class="about bg-light">
            <section id="ae-informasi" class="about bg-light ">
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
            </section>


            <div class="pt-5">
                <div
                    class="container search-info d-flex flex-column gap-2 gap-sm-0 flex-sm-row justify-content-between align-items-start">
                    <div class="text-dark search-text">
                        @if (request('search'))
                            <div class="text-dark search-text">
                                Ditemukan {{ $library->total() }} pencarian Anda melalui kata kunci:
                                {{ request('search') }}
                            </div>
                        @else
                            <div></div>
                        @endif
                    </div>

                    <div class="sort-by d-flex flex-column flex-lg-row align-items-left align-items-lg-center gap-2">
                        <div class="sort-by-text text-dark mb-2">Pilih berdasarkan :</div>
                        <div class="dropdown">
                            <button
                                class="btn dropdown-toggle bg-light text-dark d-flex align-items-center rounded shadow-sm"
                                type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                @php
                                    $sort = request('sort', 'terbaru');
                                @endphp

                                @switch($sort)
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
                                    <a class="dropdown-item text-dark {{ request('sort') === 'terbaru' ? 'active' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['sort' => 'terbaru']) }}">Terbaru</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-dark {{ request('sort') === 'terlama' ? 'active' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['sort' => 'terlama']) }}">Terlama</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-dark {{ request('sort') === 'trending' ? 'active' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['sort' => 'trending']) }}">Trending</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container">
                <div class="book-cards-container">
                    @foreach ($library as $item)
                        <div class="book-card bg-light text-dark d-flex flex-column flex-md-row">
                            <div class="d-flex flex-row">
                                <div class="book-cover">
                                    <img class="max-w-[120px] max-h-[160px]" src="{{ $item->cover ?? asset('assets/img/avatars/book.svg') }}"
                                      alt="Cover">
                                </div>
                                <div class="book-info">
                                    <div class="book-title text-dark">
                                        <a class="text-dark" href="{{ url('/ae-pustaka/detail/' . $item->slug) }}">
                                            {{ $item->title }}
                                        </a>
                                    </div>
                                    <div class="book-details text-dark">Penulis:
                                        {{ $item->penulis ?? 'Penulis Tidak Diketahui' }}</div>
                                    <div class="book-details text-dark">Jenis Koleksi: {{ $item->collection->name ?? '-' }}
                                    </div>
                                    <div class="book-details text-dark">Jumlah Hal: {{ $item->jumlah_halaman ?? '-' }}
                                    </div>
                                    <div class="book-details text-dark">Tahun Terbit: {{ $item->tahun_terbit ?? '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="align-self-end">
                                <a href="{{ url('ae-pustaka/detail/' . $item->slug) }}"
                                    class="btn btn-primary read-button">Baca</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                @php
                    $currentPage = $library->currentPage();
                    $lastPage = $library->lastPage();
                @endphp

                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center mb-0 pb-4">
                        {{-- Previous Page Link --}}
                        <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                            <a class="page-link text-white btn-primary" href="{{ $library->url($currentPage - 1) }}"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        {{-- Page Number Links --}}
                        @for ($i = 1; $i <= $lastPage; $i++)
                            <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                <a class="page-link text-white btn-primary"
                                    href="{{ $library->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        {{-- Next Page Link --}}
                        <li class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}">
                            <a class="page-link text-white btn-primary" href="{{ $library->url($currentPage + 1) }}"
                                aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>


            </div>
        </section>
    </div>
@endsection
