@extends('guest.layouts.app')
@section('content')

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
    <a onclick="topFunction()">
        <div id="myBtn" class="scroll-up text-center butonUP">
            <span>
                <i class='text-white pt-2 bx bx-up-arrow-alt'></i>
            </span>
        </div>
    </a>

    <div class="wrap bg-light">

        <section id="ae-pustaka" class="about bg-light">
            <div class="container book-info text-black">
                <div class="row">
                    <div class="col-md-3 mt-5">
                        <img src="{{$informasi->cover ?? asset('assets/img/avatars/book.svg')}}" alt="Cover Buku" class="book-cover">
                    </div>
                    <div class="col-md-9 mt-5">
                        <div class="text-start text-dark">
                            <h3 class="fw-bold">{{$informasi->title}}</h3>
                            <div class="row mb-2">
                                <div class="col-md-2 info-label"><strong>Penulis</strong></div>
                                <div class="col-md-1 info-separator">:</div>
                                <div class="col-md-7 info-value">{{$informasi->penulis ?? '-'}}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2 info-label"><strong>Jenis Koleksi</strong></div>
                                <div class="col-md-1 info-separator">:</div>
                                <div class="col-md-7 info-value">{{$informasi->collections->name}}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2 info-label"><strong>Penerbit</strong></div>
                                <div class="col-md-1 info-separator">:</div>
                                <div class="col-md-7 info-value">{{$informasi->penerbit ?? '-'}}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2 info-label"><strong>Tahun Terbit</strong></div>
                                <div class="col-md-1 info-separator">:</div>
                                <div class="col-md-7 info-value">{{$informasi->tahun_terbit ?? '-'}}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2 info-label"><strong>ISBN/ISSN</strong></div>
                                <div class="col-md-1 info-separator">:</div>
                                <div class="col-md-7 info-value">{{$informasi->isbn ?? '-'}}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2 info-label"><strong>Jumlah Hal</strong></div>
                                <div class="col-md-1 info-separator">:</div>
                                <div class="col-md-7 info-value">{{$informasi->jumlah_halaman}}</div>
                            </div>
                            {{-- <div class="row mb-2">
                                <div class="col-md-2 info-label"><strong>Deskripsi</strong></div>
                                <div class="col-md-1 info-separator">:</div>
                                <div class="col-md-7 info-value">{{$informasi->abstrak}}</div>
                            </div> --}}
                            <div class="row mb-2">
                                <div class="col-md-2 info-label"><strong>Bahasa</strong></div>
                                <div class="col-md-1 info-separator">:</div>
                                <div class="col-md-7 info-value">{{$informasi->bahasa}}</div>
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{$informasi->url}}" target="_blank" class="btn btn-primary btn-custom">Baca</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 ps-5 pe-5">
                        <div class="shadow-sm p-3 mb-5 bg-white rounded">
                            <div class="card-body text-start description-card">
                                <h5 class="card-title fw-bold mb-2">Deskripsi Buku</h5>
                                <p class="card-text ">{{$informasi->abstrak}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    </div>
    <!--Container Main end-->
    <!--jquery-->
    <script>
        //Get the button:
        mybutton = document.getElementById("myBtn");
        // When the user clicks on the button, scroll to the top of the document

        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

        //scroll function saat scroll lakukan...
        $(window).scroll(function() {
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

        document.getElementById("darkSwitch").addEventListener("click", function() {
            moon.classList.toggle('d-none');
            sun.classList.toggle('d-none');
        });
    </script>
    <script>
        // account settings
        var user_button = document.querySelector('.bxs-user-circle');
        var settings_account = document.querySelector('.settings_account');

        user_button.addEventListener("click", function() {
            settings_account.classList.toggle('d-none');
        })
    </script>

    {{-- </body>

</html> --}}
