@extends('guest.layouts.app')
@section('content')
{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- title page -->
    <title>HIMAMO | Himpunan Mahasiswa Otomasi Manufaktur & Mekatronika</title>
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> -->
    <!-- favicon -->
    <link rel="shortcut icon" href="img/segitiga.png">
    <!-- css gue -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dark-mode.css">
    <!-- icon from boxicon -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <!-- font spectral-->
    <link
        href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!-- font karla -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <!-- owlcarousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> --}}

    <style>
        /* Center the search bar horizontally */
        .search-bar {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        /* Style for the search input */
        .search-input {
            border-radius: 10px 0 0 10px;
            /* Rounded corners on the left */
            padding: 10px;
        }

        /* Style for the search button */
        .search-button {
            border-radius: 0 10px 10px 0;
            /* Rounded corners on the right */
            padding: 10px;
            border-left: 0;
            /* Removes border on the left side */
        }

        .input-group {
            width: 100%;
        }

        .input-group .form-control,
        .input-group .btn {
            border: 1px solid #ced4da;
            /* Ensure consistent border style */
        }

        .input-group .btn {
            background-color: #f8f9fa;
            /* Light background for the button */
        }

        .input-group .form-control:focus,
        .input-group .btn:focus {
            box-shadow: none;
            /* Removes default focus shadow */
            outline: none;
            /* Removes default focus outline */
        }

        /* Search Info and Dropdown */
        #ae-pustaka{
            min-height: 100vh;
        }

        @media (max-width:992px){
            #ae-pustaka .subject-list{
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
        }

        #ae-pustaka .search-info .sort-by {
            display: flex;
            align-items: center;
        }

        @media (max-width: 992px){
            #ae-pustaka .search-info .sort-by {
                flex-direction: column;
            align-items: baseline;
            }
        }

        #ae-pustaka .search-info .sort-by-text {
            margin-right: 10px;
            font-weight: bold;
        }


        .dropdown .dropdown-toggle{
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

.dropdown .dropdown-toggle::after {
    display: none; /* Menyembunyikan panah dropdown bawaan */
}

.dropdown .dropdown-toggle i{
    margin-left: 12px;
}

@media (max-width:576px){
    .dropdown .dropdown-menu{
        width: 100%;
    }
}
        /* Book Card */
        #ae-pustaka .book-card {
            background-color: rgba(255, 255, 255, 0.8);

            border-radius: 10px;
            padding: 20px;
            display: flex;
            /* Change to flexbox layout */
            flex-direction: row;
            /* Arrange items horizontally */
            justify-content: space-between;
            align-items: center;
            height: auto;
            /* Adjust height to fit content */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 20px;
        }

        #ae-pustaka .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width:768px){
            #ae-pustaka .book-card > .flex-row , #ae-pustaka .book-card > .align-self-end, #ae-pustaka .book-card .read-button{
                width: 100%
            }
            
        }

        /* Book Cover */
        #ae-pustaka .book-cover {
            background-color: #e9ecef;
            width: 120px;
            /* Set fixed width for cover */
            height: 160px;
            /* Set fixed height for cover */
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 20px;
            /* Add space between cover and book info */
            color: #6c757d;
            font-weight: bold;
            flex-shrink: 0;
            /* Prevent image from shrinking */
        }

        /* Book Info */
        #ae-pustaka .book-info {
            flex: 1;
            /* Allow the book info to take the remaining space */
            color: #212529;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: left;
            /* Ensure text is left-aligned */
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
            /* Ensure details are left-aligned */
        }

        /* Read Button */
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
            /* Align the button to the right */
        }

        @media (max-width:768px){
            #ae-pustaka .read-button {
                margin-top: 30px
            }
        }

        #ae-pustaka .read-button:hover {
            background-color: #0056b3;
        }

        /* Container for the book cards */
        #ae-pustaka .book-cards-container {
            display: grid;
            grid-template-columns: auto auto;
            flex-wrap: wrap;
            /* Allows items to wrap to the next row */
            gap: 20px;
            /* Adds space between the cards */
            /* justify-content: space-between; */
            /* Ensures cards are spaced evenly */
        }

        @media(max-width:992px){
            #ae-pustaka .book-cards-container {
            grid-template-columns: auto;
            }
        }

        /* Each book card */
        #ae-pustaka .book-card {
            background-color: white;
            border: 1px solid #dee2e6;
            padding: 20px;
            /* Makes each card take 50% width with some space for the gap */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            /* Centers items vertically */
        }

        /* Adjustments for small screens */
        @media (max-width: 768px) {
            #ae-pustaka .book-card {
                width: 100%;
                /* Makes cards full width on small screens */
            }
        }
    </style>
{{-- </head>

<body>

    <body id="body-pd">

        <header class="header" id="header">
            <div class="header_toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
            <div class="row pe-2">
                <div class="col pe-3 text-center">
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
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="#" class="img_logo">
                        <img src="img/logo_01.png">
                        <span class="nav_logo-name">
                            <img src="img/logo_02.png">
                        </span> </a>
                    <div class="nav_list">
                        <a href="./index.html#" class="nav_link"> <i class='bx bx-home nav_icon'></i></i>
                            <span class="nav_name">Home</span></a>
                        <a href="./index.html#about" class="nav_link"> <i class='bx bx-info-circle nav_icon'></i></i>
                            <span class="nav_name">About</span> </a>
                        <a href="./index.html#history" class="nav_link">
                            <i class='bx bx-time nav_icon'></i></i> <span class="nav_name">History</span></a>
                        <a href="./index.html#division" class="nav_link"><i
                                class='bx bxs-network-chart nav_icon'></i></i> <span class="nav_name">Division</span>
                        </a>
                        <a href="./index.html#leader" class="nav_link"> <i
                                class='bx bxs-user-account nav_icon'></i><span class="nav_name">Leadership</span> </a>
                        <a href="./index.html#ae-pustaka" class="nav_link"> <i class='bx bxs-book nav_icon'></i>
                            <span class="nav_name">AE-Pustaka</span></a>
                        <a href="#" class="nav_link active"> <i class='bx bxs-info-square nav_icon'></i>
                            <span class="nav_name">AE-Informasi</span></a>
                        <!-- <a href="./404.html" class="nav_link"> <i class='bx bx-rss nav_icon'></i></i> <span
                                class="nav_name">Blog</span> </a> -->
                        <!-- <a href="http://ae.polman-bandung.ac.id/" class="nav_link"> <i class='bx bxs-school'></i><span
                                class="nav_name">Website AE</span> </a> -->
                        <a href="./contact-form.html" class="nav_link"> <i
                                class='bx bxs-phone nav_icon'></i>Contact</span> </a>

                    </div>
                </div>
            </nav>
        </div> --}}

        <!--BUTON TO UP-->
        <a onclick="topFunction()">
            <div id="myBtn" class="scroll-up text-center butonUP">
                <span>
                    <i class='text-white pt-2 bx bx-up-arrow-alt'></i>
                </span>
            </div>
        </a>

        <!-- Container Main start -->
        <div class="wrap bg-light">
            <div class="parallax3">
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
        </div>

        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <section id="ae-pustaka" class="about">
            <div class=" justify-content-center search-bar">
                <div class="d-flex justify-content-center">
                    <div class="input-group mb-3 input-search">
                        <input type="text" class="form-control bg-light text-dark search-input" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary search-button" type="button" id="button-addon2">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 19L14.65 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="container cont-2 px-5">
                <div class="row pt-3 subject-list">
                    <a href="/pustaka.html" class="col-lg-3 text-center">
                        <div class="subject-box bg-light shadow-sm">
                            <img src="{{ asset('assets-guest/img/tro_subject.svg') }}" alt="Robotika" class="subject-image">
                            <p class="subject-name text-dark">Teknologi Rekayasa<br>Otomasi</p>
                        </div>
                    </a>
                    <a href="/pustaka.html" class="col-lg-3 text-center">
                        <div class="subject-box bg-light shadow-sm">
                            <img src="{{ asset('assets-guest/img/trmo_subject.svg') }}" alt="Robotika" class="subject-image">
                            <p class="subject-name text-dark">Teknologi Rekayasa Mekatronika</p>
                        </div>
                    </a>
                    <a href="/pustaka.html" class="col-lg-3 text-center">
                        <div class="subject-box bg-light shadow-sm">
                            <img src="{{ asset('assets-guest/img/trin_subject.svg')}}" alt="Robotika" class="subject-image">
                            <p class="subject-name text-dark">Teknologi Rekayasa Informatika Industri</p>
                        </div>
                    </a>
                    <a href="/pustaka.html" class="col-lg-3 text-center">
                        <div class="subject-box bg-light shadow-sm">
                            <img src="{{ asset('assets-guest/img/teori_subject.svg') }}" alt="Robotika" class="subject-image">
                            <p class="subject-name text-dark">Penunjang Teori <br><br></p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- dropdown -->
            <div class="container">
                <div class="row pt-5">
                    <div class="col-12">
                        <div class="search-info">
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
                                        <a class="dropdown-item text-dark" href="#"><li>Paling Relevan</li></a>
                                        <a class="dropdown-item text-dark" href="#"><li>Terbaru</li></a>
                                        <a class="dropdown-item text-dark" href="#"><li>Sering Dibaca</li></a>
                                        <a class="dropdown-item text-dark" href="#"><li>Tahun terbit (terbaru)</li></a>
                                        <a class="dropdown-item text-dark" href="#"><li>Tahun terbit (terlama)</li></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Books Section -->
                <!-- Loop through books and create cards dynamically -->
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
                            <a href="#" class="btn btn-primary read-button">Baca</a>
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
                            <a href="#" class="btn btn-primary read-button">Baca</a>
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
                            <a href="#" class="btn btn-primary read-button">Baca</a>
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
                            <a href="#" class="btn btn-primary read-button">Baca</a>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    {{-- <footer class="footer">
        <div class="container px-5">
            <div class="row">
                <div class="col-md pt-5 text-md-start">
                    <img src="img/logo.png">
                    <p class="text-white pt-3">HIMAMO merupakan himpunan pertama yang didirikan di kampus
                        Politeknik Manufaktur Negeri Bandung.
                    </p>
                    <ul class="footer-social list-unstyled pt-1">
                        <li class="">
                            <a class="ig" target="_blank" href="https://www.instagram.com/himamo_polman/"><i
                                    class='text-white bx bxl-instagram'></i></a>
                        </li>
                        <li class=""><a class="yt" target="_blank"
                                href="https://www.youtube.com/channel/UC0ZEfY5moa9gWIIksG3aflw"><i
                                    class='text-white bx bxl-youtube'></i></i></a></li>
                        <li class=""><a class="email" target="_blank" href="mailto:Officialhimamo@gmail.com"><i
                                    class='text-white bx bxs-envelope'></i></a></li>
                    </ul>
                </div>
                <div class="col-md pt-5 text-md-start">
                    <h4 class="text-white quote">Helpful Links</h4>
                    <ul class="list-unstyled pt-1 text-white">
                        <li class="">
                            <div class="row">
                                <div class="col-icon">
                                    <i class='pe-3 footericon bx bx-globe'></i>
                                </div>
                                <div class="col-tulisan">
                                    <a target="_blank" href="http://ae.polman-bandung.ac.id/"
                                        class="ps-2 text-white d-inline-block">
                                        Website Jurusan AE
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="row pt-2">
                                <div class="col-icon">
                                    <i class='pe-3 footericon bx bx-globe'></i>
                                </div>
                                <div class="col-tulisan">
                                    <a target="_blank" href="https://polman-bandung.ac.id/"
                                        class="ps-2 text-white d-inline-block">
                                        Website POLMAN
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="row pt-2">
                                <div class="col-icon">
                                    <i class='pe-3 footericon bx bx-sitemap'></i>
                                </div>
                                <div class="col-tulisan">
                                    <a target="_blank" href="https://himamo.org/assets/images/organigram/himamo-24.jpg"
                                        class="ps-2 text-white d-inline-block">
                                        Organigram Himamo
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md pt-5 text-md-start">
                    <h4 class="text-white quote">Have a Question ?</h4>
                    <ul class="list-unstyled pt-1 text-white">
                        <li class="">
                            <div class="row">
                                <div class="col-icon">
                                    <i class='pe-3 footericon bx bxs-map-alt'></i>
                                </div>
                                <div class="col-tulisan">
                                    <p class="ps-2">
                                        Jl.Kanayakan No 21,Dago,Bandung
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="row">
                                <div class="col-icon">
                                    <i class='pe-3 footericon bx bxs-envelope'></i>
                                </div>
                                <div class="col-tulisan">
                                    <p class="ps-2">
                                        Officialhimamo@gmail.com
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="row">
                                <div class="col-icon">
                                    <i class='pe-3 footericon bx bx-globe'></i>
                                </div>
                                <div class="col-tulisan">
                                    <p class="ps-2">
                                        Himamo.org
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="credit py-2">
            <div class="container pt-3 px-5">
                <p class="">Copyright ©2017 - 2021 All rights reserved | Made With <span><i
                            class='bx bxs-heart'></i></span>
                    By <span class="text-white">KOMINFO Division</span>
                </p>
            </div>
        </div>
    </footer> --}}

    </div>
    <!--Container Main end-->
    <!--jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--gsap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
    <!-- js gue -->
    <script type='text/javascript' src='js/main.js'></script>
    <script src="js/dark-mode-switch.min.js"></script>
    <!--owlcarousel-->
    <script type='text/javascript' src='js/owl.carousel.min.js'></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <script>
        // //Get the button:
        // mybutton = document.getElementById("myBtn");
        // // When the user clicks on the button, scroll to the top of the document

        // function topFunction() {
        //     document.body.scrollTop = 0; // For Safari
        //     document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        // }

        // //scroll function saat scroll lakukan...
        // $(window).scroll(function () {
        //     var scroll = $(window).scrollTop();
        //     if (scroll > 20) {
        //         mybutton.style.display = "block";
        //         document.getElementById("header").classList.add('bg-light');
        //     } else {
        //         mybutton.style.display = "none";
        //         document.getElementById("header").classList.remove('bg-light');
        //     }
        // })
    </script>
    <script>
        //switch 2 mode
        var moon = document.querySelector('.btn-moon');
        var sun = document.querySelector('.btn-sun');

        document.getElementById("darkSwitch").addEventListener("click", function () {
            moon.classList.toggle('d-none');
            sun.classList.toggle('d-none');
        });
    </script>
    <script>
        // account settings 
        var user_button = document.querySelector('.bxs-user-circle');
        var settings_account = document.querySelector('.settings_account');

        user_button.addEventListener("click", function () {
            settings_account.classList.toggle('d-none');
        })
    </script>
    <script>
        document.querySelector('#dropdownMenuButton').addEventListener('click', function () {
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        });
    </script>
    <script>
     document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.getElementById('dropdownMenuButton');
    const dropdownMenu = dropdownButton.nextElementSibling; // Mengambil elemen <ul> yang merupakan menu dropdown

    // Menangani klik pada tombol dropdown
    dropdownButton.addEventListener('click', function(event) {
        event.stopPropagation(); // Mencegah event bubbling
        dropdownButton.classList.toggle('show');
        dropdownMenu.classList.toggle('show'); // Tambahkan atau hapus kelas 'show'
    });

    // Menangani klik di luar dropdown untuk menutupnya
    document.addEventListener('click', function() {
        if (dropdownMenu.classList.contains('show')) {
            dropdownMenu.classList.remove('show'); // Hapus kelas 'show' jika ada
        }
    });
});
    </script>
    <script>
        $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > 20) {
            document.getElementById("header").classList.add('bg-light');
        } else {
            document.getElementById("header").classList.remove('bg-light');}});
    </script>
{{-- </body>

</html> --}}