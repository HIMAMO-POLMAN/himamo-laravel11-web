@extends('guest.layouts.app')
@section('content')
<!--Container Main start-->
<div class="wrap bg-light">

    <section id="ae-pustaka" class="about bg-light">
        <!-- Program di sini -->
            <div class="container my-4">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center text-dark text-black fw-bold py-4">D4 Teknologi Rekayasa Mekatronika</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center breadcrumb-prodi">
                                <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a></li>
                                <li class="breadcrumb-item active text-dark" aria-current="page">D4 Teknologi Rekayasa Mekatronika</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('assets-guest/img/img-prodi-trmo.jpg') }}" alt="Building" class="img-cover img-fluid rounded-5 mx-auto d-block">
                </div>
            </div>
        </div>
        <div class="container book-info text-black">
            <div class="row mt-4">
                <div class="col-12 ps-5 pe-5">
                    <div class="p-3 mb-4 text-dark rounded">
                        <div class="card-body text-start description-card">
                            <h3 class="card-title fw-bold mb-4">D4 Teknologi Rekayasa Mekatronika </h3>
                            <h5 class="card-text fw-bold">Program Studi Teknologi Rekayasa Mekatronika</h5>
                            <p>Program Studi Teknologi Rekayasa Mekatronika (TRMO) adalah sinergi ilmu pengetahuan dan teknologi dari teknik mesin, teknik elektronika, teknik informatika, dan teknik pengaturan (atau teknik kendali) untuk merancang, membuat atau memproduksi, mengoperasikan dan memelihara sebuah sistem untuk mencapai tujuan yang diinginkan (Definisi Mekatronika, Komunitas Mekatronika Indonesia, 2016).</p>
                            <hr>
                            <h5 class="fw-bold">Jenjang Pendidikan dan Gelar Akademik Program Program Studi Teknologi Rekayasa Mekatronika</h5>
                            <p>Program Sarjana Terapan (Diploma-IV) dengan gelar lulusan Sarjana Terapan Teknik (S.Tr.T.)</p>
                            <hr>
                            <h5 class="fw-bold">Visi Program Program Studi Teknologi Rekayasa Mekatronika</h5>
                            <p>Menjadi program studi terkemuka dalam penerapan dan pengembangan teknologi otomasi manufaktur dan mekatronika pada permesinan industri di indonesia dan diakui secara internasional.</p>
                            <hr>
                            <h5 class="fw-bold">Misi Program Studi Teknologi Rekayasa Mekatronika</h5>
                            <p>1. Melaksanakan pendidikan tinggi terapan pada bidang teknologi mekatronika yang mengacu kepada kebutuhan industri manufaktur.</p>
                            <p>2. Melaksanakan kegiatan penelitian terapan dan pengembangan teknologi mekatronika yang menunjang peningkatan mutu pendidikan.</p>
                            <p>3. Melaksanakan kegiatan pemberdayaan dan layanan masyarakat dalam lingkup teknologi mekatronika yang menunjang peningkatan mutu pendidikan, produktifitas dan kualitas sumber daya manusia.</p>
                            <hr>
                            <h5 class="fw-bold">Struktur Kurikulum Program Studi Teknologi Rekayasa Mekatronika</h5>
                            <p>Struktur kurikulum pada Prodi TRMO memiliki total 146 SKS yang dapat ditempuh selama kurun waktu 4 tahun. Prodi TRMO membekali mahasiswa untuk menjadi ahli teknik yang kompeten dalam menangani sistem dan perangkat otomatis. Pengetahuan mekanika dan keterampilan dalam bidang elektronika dan informatika menjadi dasar untuk merancang, merangkai dan memelihara mesin atau peralatan otomatis, baik secara terpisah maupun setelah terintegrasi dalam suatu sistem manufaktur.</p>
                            <hr>
                            <p>Prodi TRMO meningkatkan interaksi antar pelaku IPTEK dengan praktisi karena sifatnya yang selalu berkembang tanpa henti penuh dengan inovasi. Sementara itu dalam proses perkembangannya sinergi antardisiplin IPTEK akan mendorong sinergi antarpemangku kepentingan. Untuk itu mekatronika dapat berperan sebagai science-driven technology yang pada akhirnya dapat menjadi poros dari kekuatan nasional. Mekatronika memiliki posisi strategis dalam rantai IPTEK, yang untuk itu akan memiliki posisi yang sangat strategis bagi industri di Indonesia. Di era persaingan global daya saing industri sangat dipengaruhi oleh pemanfaatan IPTEK mekatronika karena ia meningkatkan efisiensi dan efektivitas, serta memiliki ruang inovasi yang luas. Dalam rangka meningkatakan dinamika ekonomi menuju perluasan lapangan kerja untuk meningkatkan kesejahteraan rakyat maka sebagai negara berkembang Indonesia perlu segera menguasai dan memanfaatkan IPTEK mekatronika secara cepat dan tepat.</p>
                            <a href="https://drive.google.com/drive/folders/1I2hqDn9o81xM8cNGPYZFuT1-_AaDqsts?usp=drive_link" class="btn btn-primary form-control mt-3" target="_blank">Bahan Ajar D4 Teknologi Rekayasa Mekatronika</a>
                        </div>
                    </div>
                    <!-- <ul class="list-group mb-4">
                        <li class="list-group-item border-0">
                            <a href="#">• D2 Jalur Cepat Teknik Mekatronika</a>
                        </li>
                        <li class="list-group-item border-0">
                            <a href="#">• D4 Prodi Teknologi Rekayasa Otomasi</a>
                        </li>
                        <li class="list-group-item border-0">
                            <a href="#">• D4 Prodi Teknologi Rekayasa Informatika Industri</a>
                        </li>
                    </ul> -->
                    <div class="container cont-2 px-5 pb-2">
                            <div class="row">
                                <div class="col-md-12 text-center ">
                                    <h3 class="text-dark fw-bold">Lihat lainnya</h3>
                                </div>
                            </div>
                            <div class="row pt-1 pb-4 subject-list ">
                                <div class="col-12 col-md-6 mt-4 col-lg text-center">
                                    <div class="subject-box">
                                        <a href="prodi-d2-trmo" class="text-dark">
                                        <img src="{{ asset('assets-guest/img/trmo-d2_subject.svg') }}" alt="Robotika" class="subject-image" >
                                            <p class="subject-name">D2 Jalur Cepat<br>Teknik  Mekatronika</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-4 col-lg text-center">
                                    <div class="subject-box">
                                        <a href="prodi-d4-tro" class="text-dark">
                                        <img src="{{ asset('assets-guest/img/tro_subject.svg') }}" alt="Robotika" class="subject-image" >
                                            <p class="subject-name">D4 Prodi<br>Teknologi Rekayasa Otomasi</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-4 col-lg text-center">
                                    <div class="subject-box">
                                        <a href="prodi-d4-trmo" class="text-dark">
                                        <img src="{{ asset('assets-guest/img/trin_subject.svg') }}" alt="Robotika" class="subject-image" >
                                            <p class="subject-name">D4 Prodi<br>Teknologi Rekayasa Informatika Industri</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
</div>
<!--Container Main end-->
@endsection

@push('scripts')
    <script>
            // Ambil elemen header dan tombol
        var header = document.getElementById('header');
        var mybutton = document.getElementById('myBtn');

        // Fungsi untuk menangani scroll
        function handleScroll() {
            var scroll = window.scrollY; // Ambil posisi scroll

            if (scroll > 20) {
                mybutton.style.display = "block"; // Tampilkan tombol
                header.classList.add('bg-light'); // Tambahkan class bg-light
            } else {
                mybutton.style.display = "none"; // Sembunyikan tombol
                header.classList.remove('bg-light'); // Hapus class bg-light
            }
        }

        // Tambahkan event listener untuk scroll
        window.addEventListener('scroll', handleScroll);
    </script>
@endpush