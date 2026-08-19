@extends('guest.layouts.app')
@section('content')
    <div class="wrap bg-light">
        <section id="home">
            <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner gs_reveal">
                    <div class="carousel-item drk active">
                        <img src="{{ asset('assets-guest/img/img-carousel-1.webp') }}" class="d-block gbr img-fluid">

                        <div class="carousel-caption">
                            <div class="row no-gutters slider-text2 align-items-center justify-content-center">
                                <h1 class="quote">WELCOME TO <span>HIMAMO</span></h1>
                                <p class="quote">HIMPUNAN MAHASISWA OTOMASI MANUFAKTUR & MEKATRONIKA. </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item drk">
                        <img src="{{ asset('assets-guest/img/img-carousel-2.webp') }}" class="d-block gbr img-fluid">

                        <div class="carousel-caption">
                            <div class="row no-gutters slider-text align-items-center justify-content-center">
                                <h1 class="quote">Still <span>The Highest</span></h1>
                                <h1 class="quote">Still <span> The Best </span></h1>
                            </div>
                        </div>
                    </div>
                    <button class="cntrl carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <i class='bx bxs-chevron-left-circle carouselbtn'></i>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="cntrl carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <i class='bx bxs-chevron-right-circle carouselbtn'></i>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <a class="text-center" href="#about">
                    <div class="scroll-down"></div>
                </a>
            </div>
        </section>

        <section id="ae-informasi" class=" bg-light ae-informasi">
            <div class="container pb-3">
                <div class="container pb-5 px-5 pt-5">
                    <div class="row d-flex flex-col flex-lg-row">
                        <div class="col-md-12 text-center gs_reveal">
                            <h2 class="text-dark quote">AE <span class="judul">Informasi</span></h2>
                            <p class="text-dark pt-2">
                                Dapatkan informasi terbaru seputar jurusan Teknik Otomasi Manufaktur dan
                                Mekatronika, termasuk
                                berita terkini, acara mendatang, prestasi mahasiswa, lowongan pekerjaan, dan
                                perkembangan
                                teknologi di bidang ini.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="container cont-2">
                    <div class="row">
                        <div class="col-md-12 text-center gs_reveal">
                            <h3 class="text-dark quote">Berita & Pengumuman Terbaru</h3>
                        </div>
                    </div>
                    <div class=" d-flex flex-column flex-lg-row justify-content-center landing-page-ae-informasi">
                        @foreach ($informasi as $item)
                            <div class=" pt-3 info-list gs_reveal">
                                <a class="text-center text-dark" href="{{ url('ae-informasi/detail/' . $item->slug) }}">
                                    <div class="info-box">
                                        <div class="img-box align-items-center">
                                            <img src="{{ asset('storage/informasi/' . $item->image) }}"
                                                alt="{{ $item->title }}" class="info-image mx-auto">
                                        </div>
                                        <p class="info-title text-dark mt-2">{{ $item->title }}</p>
                                        <p class="info-date text-dark">{{ date('d/m/Y', strtotime($item->created_at)) }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="row justify-content-center mt-4 gs_reveal">
                        <div class="col-md-4 text-center">
                            <div class="info-button">
                                <a href="{{ url('/ae-informasi') }}" class="btn btn-primary px-3 py-2">Lihat Informasi
                                    Lainnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="ae-pustaka" class=" ae-pustaka">
            <div class="parallax2">
                <div class="container pb-3">
                    <div class="container pb-5 px-5 pt-5">
                        <div class="row">
                            <div class="col-md-12 text-center gs_reveal">
                                <h2 class="text-white quote">AE <span class="judul">Pustaka</span></h2>
                                <p class="text-white pt-2">
                                    AE Pustaka adalah sumber informasi dan referensi terlengkap seputar Teknik
                                    Otomasi
                                    Manufaktur
                                    dan Mekatronika. Temukan berbagai macam buku, jurnal, artikel, dan materi
                                    pembelajaran lainnya
                                    untuk mendukung pengembangan pengetahuan dan keterampilan Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="container cont-2 px-5 pb-2">
                        <div class="row">
                            <div class="col-md-12 text-center gs_reveal">
                                <h3 class="text-white quote">Jelajahi Koleksi Kami</h3>
                            </div>
                        </div>
                        {{-- <div class="d-flex flex-row">
                            <div class="book-cover">COVER BUKU</div>
                            <div class="book-info">
                                <div class="book-title"><a class="text-dark" href="book-detail.html">Judul Buku</a></div>
                                <div class="book-details text-dark">Penulis : Lorem Ipsum</div>
                                <div class="book-details text-dark">Jenis Koleksi : Lorem Ipsum</div>
                                <div class="book-details text-dark">Jumlah Hal : 1XX</div>
                                <div class="book-details text-dark">Tahun Terbit : 20XX</div>
                            </div>
                        </div> --}}
                        <div class="row justify-content-center mt-4 gs_reveal">
                            <div class="col-md-4 text-center">
                                <div class="info-button">
                                    <a href="/library" class="btn btn-primary px-3 py-2">Lihat Pustaka
                                        Lainnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about">
            <div class="container pb-3">
                <div class="container pb-5 px-5 pt-5">
                    <div class=" d-flex flex-lg-row-reverse flex-column">
                        <div class="col-12 col-lg-4 text-center">
                            <img class="logoae gs_reveal gs_reveal_fromLeft pt-3"
                                src="{{ asset('assets-guest/img/img-logo-jurusan.webp') }}" alt="Logo Jurusan"
                                loading="lazy">
                        </div>
                        <div class=" gs_reveal gs_reveal_fromRight about-text ">
                            <h2 class="text-dark quote pt-3 text-center text-lg-start">Apa itu <span class="judul">Jurusan
                                    Teknik Otomasi
                                    Manufaktur dan Mekatronika?</span></h2>
                            <p class="text-dark pt-2 ">
                                AE Memiliki kompetensi inti pada perancangan dan pembuatan teknologi terpadu
                                dalam
                                mekatronik
                                dan
                                otomasi manufaktur. Mekatronika adalah perpaduan dari teknik listrik, informasi,
                                mekanik dan
                                sistem kendali yang merupakan kompetensi dalam pembuatan alat atau komponen
                                digunakan untuk
                                membangun sistem otomatis. Sementara Otomasi Manufaktur menangani keterbatasan
                                manusia
                                dengan
                                sifat kerja yang berulang-ulang yang dihasilkan dari integrasi aplikasi dan
                                beberapa
                                perangkat
                                elektronik. Menyediakan layanan dalam sistem kendali otomasi yang berkualitas
                                dan
                                handal
                                bagi
                                industri manufaktur, elektronika, agro, pertambangan, tekstil, pengolahan
                                makanan
                                dan
                                minuman,
                                dan peralatan elektronik rumah sakit.</p>
                        </div>
                    </div>
                </div>
                <div class="container cont-2 px-5">
                    <div class="row">
                        <div class="col-md-12 text-center gs_reveal">
                            <h3 class="text-dark quote">Program Studi <span class="judul">Jurusan Teknik Otomasi
                                    Manufaktur dan Mekatronika</span></h3>
                        </div>
                    </div>
                    <div class="row pt-3 subject-list gs_reveal">
                        <a href="/prodi-d4-tro" class=" col-lg col-md-12 col-12 mt-2" style="text-decoration: none;">
                            <div class=" text-center">
                                <div class="subject-box bg-light shadow-sm">
                                    <img src="{{ asset('assets-guest/img/tro_subject.svg') }}" alt="Robotika"
                                        class="subject-image" loading="lazy">
                                    <p class="subject-name text-dark fw-bold ">D4 - Teknologi Rekayasa<br>Otomasi</p>
                                </div>
                            </div>
                        </a>
                        <a href="/prodi-d4-trmo" class="col-12 col-lg col-md-12 mt-2" style="text-decoration: none;">
                            <div class=" text-center">
                                <div class="subject-box bg-light shadow-sm ">
                                    <img src="{{ asset('assets-guest/img/trmo_subject.svg') }}" alt="Robotika"
                                        class="subject-image" loading="lazy">
                                    <p class="subject-name text-dark fw-bold ">D4 - Teknologi Rekayasa <br>Mekatronika</p>
                                </div>
                            </div>
                        </a>
                        <a href="prodi-d4-trin" class="col-12 col-lg col-md-12 mt-2" style="text-decoration: none;">
                            <div class=" text-center">
                                <div class="subject-box bg-light shadow-sm ">
                                    <img src="{{ asset('assets-guest/img/trin_subject.svg') }}" alt="Robotika"
                                        class="subject-image" loading="lazy">
                                    <p class="subject-name text-dark fw-bold ">D4 - Teknologi Rekayasa <br> Informatika
                                        Industri</p>
                                </div>
                            </div>
                        </a>
                        <a href="prodi-d2-trmo" class="col-lg col-12 col-md-12 mt-2 " style="text-decoration: none;">
                            <div class=" text-center ">
                                <div class="subject-box bg-light shadow-sm ">
                                    <img src="{{ asset('assets-guest/img/trmo-d2_subject.svg') }}" alt="Robotika"
                                        class="subject-image" loading="lazy">
                                    <p class="subject-name text-dark fw-bold">D2 Fast Track - Teknik <br> Mekatronika</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="container cont-2 px-5">
                    <div class="d-flex flex-lg-row flex-column-reverse">
                        <div class="  gs_reveal gs_reveal_fromRight">
                            <h2 class="text-dark quote text-center text-xl-start pt-5">Apa itu <span
                                    class="judul">Himpunan
                                    Otomasi Manufaktur
                                    dan Mekatronika?</span></h2>
                            <p class="text-dark pt-2 text-md-start">

                                Himpunan mahasiswa jurusan (disingkat HMJ) adalah organisasi mahasiswa di tingkat
                                jurusan di suatu perguruan tinggi.
                                Keberadaan himpunan mahasiswa jurusan haruslah berdasarkan prinsip dari, oleh dan
                                untuk mahasiswa. Himpunan mahasiswa
                                jurusan merupakan media bagi anggotanya untuk mengembangkan pola pikir dan
                                kepribadian yang berkaitan dengan disiplin
                                ilmunya agar siap terjun ke masyarakat. HIMAMO (Himpunan Mahasiswa Teknik Otomasi
                                Manufaktur dan Mekatronika) merupakan
                                suatu wadah organisasi yang difasilitasi oleh Politeknik Manufaktur Negeri Bandung
                                umumnya dan Jurusan Teknik Otomasi
                                Manufaktur khususnya. Keberadaan HIMAMO sangatlah penting sebagai wadah bagi
                                mahasiswa Jurusan Teknik Otomasi Manufaktur
                                dan Mekatronika untuk melatih diri dalam hal berorganisasi.</p>
                        </div>
                        <div class=" col-lg-4 pb-lg-5 text-center">
                            <img class="logoae gs_reveal gs_reveal_fromLeft pt-5" loading="lazy"
                                src="{{ asset('assets-guest/img/img-himamo.webp') }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="history" class="history">
            <div class="parallax">
                <div class="container pt-4 pb-5 px-5">
                    <div class="row">
                        <div class="col gs_reveal gs_reveal_fromLeft pt-4">
                            <div class="row no-gutters slider-text text-md-start">
                                <h1 class="quote">14 <span>November</span> <span>19</span>95</h1>
                            </div>
                        </div>
                        <div class="col-md-6 gs_reveal gs_reveal_fromRight">
                            <h2 class="text-white quote text-md-end pt-5">Sejarah <span class="judul">HIMAMO</span>
                            </h2>
                            <p class="text-white pt-2 text-md-end">
                                HIMAMO didirikan di Bandung pada tanggal 14 November 1995.
                                HIMAMO merupakan himpunan pertama yang didirikan di kampus Politeknik Manufaktur
                                Negeri Bandung. Sejak Awal didirikannya himpunan ini, sudah berazaskan dan
                                berlandaskan Pancasila dan kebenaran ilmiah tentang himpunan. HIMAMO didirikan
                                sebagai wadah untuk mengembangkan bakat dan minat mahasiswa dalam bidang teknologi
                                otomasi manufaktur
                                dan mekatronika. Organisasi ini berfungsi sebagai platform untuk meningkatkan
                                kemampuan dan keterampilan mahasiswa dalam
                                teknologi manufaktur dan otomasi, serta meningkatkan kesadaran dan partisipasi
                                mahasiswa dalam pengembangan teknologi
                                manufaktur dan otomasi di Indonesia.</p>
                        </div>
                    </div>
                </div>
        </section>
        <section id="division" class="division">
            <div class="container gs_reveal gs_reveal_fromRight pt-5 pb-5 px-5">
                <div class="d-flex flex-column flex-md-row row">
                    <div class="col-lg-3 pt-5 text-center">
                        <h2 class="text-dark quote text-md-start">Bidang <span class="judul">HIMAMO</span>
                        </h2>
                        <p class="text-dark text-md-start">
                            Bidang Himamo dibagi menjadi 5 bidang dan Majelis Tinggi Himpunan
                            yaitu sebagai berikut :</p>
                    </div>
                    <div class="pt-3 col-lg-8">
                        <div class="owl-carousel owl-one owl-theme">
                            <div class="block block-1">
                            </div>
                            <div class="block block-2">
                            </div>
                            <div class="block block-3">
                            </div>
                            <div class="block block-4">
                            </div>
                            <div class="block block-5">
                            </div>
                            <div class="block block-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="leader" class="leader">
            <div class="container gs_reveal gs_reveal_fromLeft pt-4 pb-5 px-5">
                <div class="d-flex flex-column-reverse flex-lg-row row">
                    <div class="col-lg-8 text-md-start">
                        <div class="featured-carousel owl-carousel">
                            @foreach ($leaders as $leader)
                                <div class="item">
                                    <div class="work {{ $loop->last ? 'pb-4' : '' }}">
                                        <a @if ($leader->linkedin) href="{{ $leader->linkedin }}" target="_blank" @endif
                                            class="text-light">
                                            <div class="img d-flex align-items-end justify-content-center"
                                                style="background-image: url('{{ $leader->image_url }}');">
                                                <div class="text w-100">
                                                    <span class="cat">{{ $leader->position }}</span>
                                                    <h3>{{ $leader->name }}</h3>
                                                    <span>Masa jabatan : {{ $leader->period_start }} s/d
                                                        {{ $leader->period_end }}</span>
                                                    @if ($leader->nim)
                                                        <span>NIM : {{ $leader->nim }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="teks col pt-5 text-center">
                        <h2 class="text-dark quote text-md-end">Sejarah Kepemimpinan <span class="judul">HIMAMO</span>
                        </h2>
                        <p class="text-dark text-md-end">
                            Sejarah Kepemimpinan Ketua Himpunan Mahasiswa Jurusan Teknik Otomasi Manufaktur dan
                            Mekatronika.</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="prestation" class="about">
            <div class="parallax2">
                <div class="container pt-5 pb-5 px-5">
                    <div class="row justify-content-center mb-4 gs_reveal">
                        <div class="col-md-7 text-center">
                            <h1 class="mb-3 text-white quote">Apa Kata <span class="judul">Mereka?</span></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel-testimony gs_reveal wl-theme owl-carousel">
                                <div class="item">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <i class='bx bxs-quote-right'></i>
                                    </div>
                                    <div class="testimony-wrap py-4">
                                        <div class="text">
                                            <p class="mb-4">Thank you HIMAMO for teaching me friendship, unity,
                                                community, kindness, youth, optimism, and understanding.</p>
                                            <div class="d-flex align-items-center">
                                                <div class="user-img"
                                                    style="background-image: url('{{ asset('assets-guest/img/img-avatar-pria.svg') }}');">
                                                </div>
                                                <div class="ps-3">
                                                    <p class="name">Hirzi Nurfakhrian</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <i class='bx bxs-quote-right'></i>
                                        </div>
                                        <div class="text">
                                            <p class="mb-4">It's better to burn out, than to fade away.
                                                <br>
                                                <br>
                                                <br>
                                            </p>
                                            <div class="d-flex align-items-center">
                                                <div class="user-img"
                                                    style="background-image: url('{{ asset('assets-guest/img/img-avatar-pria.svg') }}');">
                                                </div>
                                                <div class="ps-3">
                                                    <p class="name">Mochammad Aulia</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <i class='bx bxs-quote-right'></i>
                                        </div>
                                        <div class="text">
                                            <p class="mb-4">"We began as wanderers, and we are wanderers still. So
                                                keep your mind curious."
                                                <br>
                                                <br>
                                            </p>
                                            <div class="d-flex align-items-center">
                                                <div class="user-img"
                                                    style="background-image: url('{{ asset('assets-guest/img/img-avatar-pria.svg') }}');">
                                                </div>
                                                <div class="ps-3">
                                                    <p class="name">Muhammad Fikri</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <i class='bx bxs-quote-right'></i>
                                        </div>
                                        <div class="text">
                                            <p class="mb-4">Berubah untuk lebih baik.
                                                <br>
                                                <br>
                                                <br>
                                            </p>
                                            <div class="d-flex align-items-center">
                                                <div class="user-img"
                                                    style="background-image: url('{{ asset('assets-guest/img/img-avatar-wanita.svg') }}');">
                                                </div>
                                                <div class="ps-3">
                                                    <p class="name">Fitriani Pratiwi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <i class='bx bxs-quote-right'></i>
                                        </div>
                                        <div class="text">
                                            <p class="mb-4">Teruslah berkembang, teruslah berproses, teruslah
                                                menjadi lebih baik, laksanakan continous improvement.
                                            </p>
                                            <div class="d-flex align-items-center">
                                                <div class="user-img"
                                                    style="background-image: url('{{ asset('assets-guest/img/img-avatar-pria.svg') }}');">
                                                </div>
                                                <div class="ps-3">
                                                    <p class="name">Eko Rahayu Tali Jiwa</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <i class='bx bxs-quote-right'></i>
                                        </div>
                                        <div class="text">
                                            <p class="mb-4">Himamo himpunan tercintaku, aku tumbuh dan besar bersamamu.
                                                Kobarkan selalu benderamu karena aku bangga padamu.
                                            </p>
                                            <div class="d-flex align-items-center">
                                                <div class="user-img"
                                                    style="background-image: url('{{ asset('assets-guest/img/img-avatar-pria.svg') }}');">
                                                </div>
                                                <div class="ps-3">
                                                    <p class="name">Andika Rianto</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="video">
            <div class="container pt-5 pb-5 px-5">
                <div class="row justify-content-center mb-4 gs_reveal">
                    <div class="col-md-7 text-center">
                        <h1 class="mb-3 text-dark quote">Our <span class="judul">Moments</span></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center embed-responsive">
                        <iframe class="gs_reveal pideo"
                            src="https://www.youtube.com/embed/rdPUrmRmNoU?si=59Pi-h0UHwpuMQ-m"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
