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
</head> --}}
<style>
    .book-cover {
        width: 100%;
        height: auto;
        max-width: 200px;
        border-radius: 10px;
    }

    .description-card {
        border-radius: 10px;
    }

    .info-label {
        text-align: left;
        padding-right: 5px;
    }

    .info-separator {
        padding-left: 0;
        padding-right: 5px;
        text-align: center;
    }

    .info-value {
        text-align: left;
        padding-left: 0;
    }

    .text-black {
        color: black !important;
    }

    .btn-custom {
        width: 120px;
        height: 40px;
    }
</style>
{{-- 
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

        <!--Container Main start-->
        <div class="wrap bg-light">
            <div class="parallax3">
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

            <section id="ae-pustaka" class="about bg-light">
                <div class="container book-info text-black">
                    <div class="row">
                        <div class="col-md-3 mt-5">
                            <img src="img/img-one.jpeg" alt="Cover Buku" class="book-cover">
                        </div>
                        <div class="col-md-9 mt-5">
                            <div class="text-start text-dark">
                                <h3 class="fw-bold">Judul Buku</h3>
                                <div class="row mb-2">
                                    <div class="col-md-2 info-label"><strong>Penulis</strong></div>
                                    <div class="col-md-1 info-separator">:</div>
                                    <div class="col-md-7 info-value">Lorem Ipsum</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-2 info-label"><strong>Jenis Koleksi</strong></div>
                                    <div class="col-md-1 info-separator">:</div>
                                    <div class="col-md-7 info-value">Lorem Ipsum</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-2 info-label"><strong>Penerbit</strong></div>
                                    <div class="col-md-1 info-separator">:</div>
                                    <div class="col-md-7 info-value">Lorem Ipsum</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-2 info-label"><strong>Tahun Terbit</strong></div>
                                    <div class="col-md-1 info-separator">:</div>
                                    <div class="col-md-7 info-value">Lorem Ipsum</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-2 info-label"><strong>ISBN/ISSN</strong></div>
                                    <div class="col-md-1 info-separator">:</div>
                                    <div class="col-md-7 info-value">Lorem Ipsum</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-2 info-label"><strong>Jumlah Hal</strong></div>
                                    <div class="col-md-1 info-separator">:</div>
                                    <div class="col-md-7 info-value">Lorem Ipsum</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-2 info-label"><strong>Deskripsi</strong></div>
                                    <div class="col-md-1 info-separator">:</div>
                                    <div class="col-md-7 info-value">Lorem Ipsum</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-2 info-label"><strong>Bahasa</strong></div>
                                    <div class="col-md-1 info-separator">:</div>
                                    <div class="col-md-7 info-value">Lorem Ipsum</div>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mt-4">
                                <button class="btn btn-primary btn-custom">Baca</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 ps-5 pe-5">
                            <div class="shadow-sm p-3 mb-5 bg-white rounded">
                                <div class="card-body text-start description-card">
                                    <h5 class="card-title fw-bold">Deskripsi Buku</h5>
                                    <p class="card-text ">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                        do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                                        sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

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
                                        <a target="_blank"
                                            href="https://himamo.org/assets/images/organigram/himamo-24.jpg"
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
            //Get the button:
            mybutton = document.getElementById("myBtn");
            // When the user clicks on the button, scroll to the top of the document

            function topFunction() {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }

            //scroll function saat scroll lakukan...
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll > 20) {
                    mybutton.style.display = "block";
                    document.getElementById("header").classList.add('bg-light');
                } else {
                    mybutton.style.display = "none";
                    document.getElementById("header").classList.remove('bg-light');
                }
            })
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

    {{-- </body>

</html> --}}