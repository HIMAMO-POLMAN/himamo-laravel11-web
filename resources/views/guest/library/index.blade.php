@extends('guest.layouts.app')
@section('content')
    <style>
        /* .search-wrapper {
            max-width: 600px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .search-box {
            position: relative;
            background: white;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .search-box:focus-within {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .search-input {
            border: 2px solid #eee;
            border-radius: 30px;
            padding: 15px 25px;
            padding-right: 50px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: #028784;
            box-shadow: none;
        }

        .search-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            transition: all 0.3s ease;
        }

        .search-box:focus-within .search-icon {
            color: #028784;
        }

        .suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border-radius: 15px;
            margin-top: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .search-box:focus-within .suggestions {
            opacity: 1;
            transform: translateY(0);
        }

        .suggestion-item {
            padding: 12px 20px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .suggestion-item:hover {
            background: #f8f9fa;
        }

        .suggestion-item i {
            margin-right: 10px;
            color: #666;
        }

        .recent-searches {
            color: #666;
            font-size: 0.8rem;
            padding: 10px 20px;
            background: #f8f9fa;
            border-radius: 15px 15px 0 0;
        } */

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
            font-weight: bold;
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
            background-color: #e9ecef;
            width: 120px;
            height: 160px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 20px;
            color: #6c757d;
            font-weight: bold;
            flex-shrink: 0;
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
            {{-- <div class="search-wrapper">
                <div class="search-box">
                    <form class=" justify-content-center" method="GET" action="{{ url()->current() }}">
                        <div class="input-group mb-3 input-search">
                            <input type="text" class="search-input form-control bg-light text-dark"
                                placeholder="Search anything..." name="search">
                            <button class="btn btn-primary search-button" type="submit" id="button-addon2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 19L14.65 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        @if (request('collection'))
                            <input type="hidden" name="collection" value="{{ request('collection') }}">
                        @endif
                    </form>
                    <i class="fas fa-search search-icon"></i>
                    <div class="suggestions bg-light text-dark">
                        <div class="recent-searches">Recent Searches</div>
                        <div class="suggestion-item text-dark">
                            <i class="fas fa-history"></i>
                            Wireless Headphones
                        </div>
                        <div class="suggestion-item text-dark">
                            <i class="fas fa-history"></i>
                            Smart Watches
                        </div>
                        <div class="suggestion-item text-dark">
                            <i class="fas fa-search"></i>
                            Popular: Latest Smartphones
                        </div>
                        <div class="suggestion-item text-dark">
                            <i class="fas fa-fire"></i>
                            Trending: Fitness Trackers
                        </div>
                    </div>
                </div>
            </div> --}}

            <section id="ae-informasi" class="about bg-light ">
                <div class="justify-content-center search-bar">
                <form class="d-flex justify-content-center" method="GET" action="{{ url()->current() }}">
                    <div class="input-group mb-3 input-search">
                        <input type="text" name="search" class="form-control bg-light text-dark search-input"
                            placeholder="Search" aria-label="Search" value="{{ old('search', request('search')) }}">
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
           <div class="container search-info d-flex flex-column gap-2 gap-sm-0 flex-sm-row justify-content-between align-items-start">
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

                    <div class="sort-by d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-2">
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
                    <div class="book-card bg-light text-dark d-flex flex-column flex-md-row">
                        <div class="d-flex flex-row">
                            <div class="book-cover">COVER BUKU</div>
                            <div class="book-info">
                                <div class="book-title"><a class="text-dark" href="book-detail.html">Judul Buku</a></div>
                                <div class="book-details text-dark">Penulis : Lorem Ipsum</div>
                                <div class="book-details text-dark">Jenis Koleksi : Lorem Ipsum</div>
                                <div class="book-details text-dark">Jumlah Hal : 1XX</div>
                                <div class="book-details text-dark">Tahun Terbit : 20XX</div>
                            </div>
                        </div>
                        <div class="align-self-end">
                            <a href="/library/details" class="btn btn-primary read-button">Baca</a>
                        </div>
                    </div>
                    <div class="book-card bg-light text-dark d-flex flex-column flex-md-row">
                        <div class="d-flex flex-row">
                            <div class="book-cover">COVER BUKU</div>
                            <div class="book-info">
                                <div class="book-title"><a class="text-dark" href="book-detail.html">Judul Buku</a></div>
                                <div class="book-details text-dark">Penulis : Lorem Ipsum</div>
                                <div class="book-details text-dark">Jenis Koleksi : Lorem Ipsum</div>
                                <div class="book-details text-dark">Jumlah Hal : 1XX</div>
                                <div class="book-details text-dark">Tahun Terbit : 20XX</div>
                            </div>
                        </div>
                        <div class="align-self-end">
                            <a href="/library/details" class="btn btn-primary read-button">Baca</a>
                        </div>
                    </div>
                    <div class="book-card bg-light text-dark d-flex flex-column flex-md-row">
                        <div class="d-flex flex-row">
                            <div class="book-cover">COVER BUKU</div>
                            <div class="book-info">
                                <div class="book-title"><a class="text-dark" href="book-detail.html">Judul Buku</a></div>
                                <div class="book-details text-dark">Penulis : Lorem Ipsum</div>
                                <div class="book-details text-dark">Jenis Koleksi : Lorem Ipsum</div>
                                <div class="book-details text-dark">Jumlah Hal : 1XX</div>
                                <div class="book-details text-dark">Tahun Terbit : 20XX</div>
                            </div>
                        </div>
                        <div class="align-self-end">
                            <a href="/library/details" class="btn btn-primary read-button">Baca</a>
                        </div>
                    </div>
                    <div class="book-card bg-light text-dark d-flex flex-column flex-md-row">
                        <div class="d-flex flex-row">
                            <div class="book-cover">COVER BUKU</div>
                            <div class="book-info">
                                <div class="book-title"><a class="text-dark" href="book-detail.html">Judul Buku</a></div>
                                <div class="book-details text-dark">Penulis : Lorem Ipsum</div>
                                <div class="book-details text-dark">Jenis Koleksi : Lorem Ipsum</div>
                                <div class="book-details text-dark">Jumlah Hal : 1XX</div>
                                <div class="book-details text-dark">Tahun Terbit : 20XX</div>
                            </div>
                        </div>
                        <div class="align-self-end">
                            <a href="/library/details" class="btn btn-primary read-button">Baca</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
