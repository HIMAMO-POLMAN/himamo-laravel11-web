@extends('guest.layouts.app')

@section('content')

{{-- Page-specific Fonts and Styles --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
<style>
    .kabinet-melaju-bersama-page {
        font-family: 'Open Sans', sans-serif;
        background-color: #f8f9fa;
    }
    .kabinet-melaju-bersama-page h1,
    .kabinet-melaju-bersama-page h2,
    .kabinet-melaju-bersama-page h3,
    .kabinet-melaju-bersama-page h4,
    .kabinet-melaju-bersama-page h5,
    .kabinet-melaju-bersama-page h6,
    .kabinet-melaju-bersama-page .card-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }
    .kabinet-melaju-bersama-page .lead,
    .kabinet-melaju-bersama-page .card-text,
    .kabinet-melaju-bersama-page .list-unstyled {
        font-family: 'Open Sans', sans-serif;
    }
    .hero-section {
        position: relative;
        background-image: url("{{ asset('assets-guest/img/img-carousel-1.webp') }}");
        background-size: cover;
        background-position: center;
        color: white;
    }
    .hero-section .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 77, 64, 0.7);
        z-index: 1;
    }
    .hero-section .container {
        position: relative;
        z-index: 2;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
    }
    .section-title {
        font-weight: 700;
        color: #004d40;
    }
</style>

<div class="kabinet-melaju-bersama-page">
    <div class="hero-section">
        <div class="overlay"></div>
        <div class="container py-5 text-center">
            <h1 class="display-4 fw-bold">Kabinet Melaju Bersama 2025/2026</h1>
            <p class="lead">Satukan Langkah, Ciptakan Sejarah</p>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h2 class="section-title">Penjelasan Umum Kabinet</h2>
                <p class="lead mt-3">"Melaju Bersama" bukan sekadar nama, tetapi representasi visi besar sebuah perjalanan kolektif dalam himpunan ini. Filosofi ini lahir dari keyakinan bahwa perubahan yang berarti tidak dibangun oleh satu langkah individu, tetapi oleh banyak langkah kecil yang bergerak seirama dalam satu tujuan besar dengan satu faham dan satu pemikiran. Kabinet ini hadir untuk merangkul keberagaman, menyatukan potensi, dan mengajak seluruh anggota himpunan untuk tidak hanya menjadi penonton perubahan, tetapi menjadi bagian dari mereka yang menciptakan sejarah dan membawanya melaju menuju masa depan yang lebih baik.</p>
            </div>
        </div>
    </div>

    <div class="container py-5" style="background-color: #ffffff;">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-lg border-0 card-hover">
                    <div class="card-body text-center p-5">
                        <div class="mb-4">
                            <i class='bx bx-bullseye' style='font-size: 4rem; color: #00796b;'></i>
                        </div>
                        <h3 class="card-title mt-2">Visi</h3>
                        <p class="card-text">Menjadikan Himamo sebagai wadah yang progresif, inklusif. dan kompeten dalam pengembangan Individu menciptakan lingkungan organisasi yang sehat dan suportif. serta membangun sistem kerja yang berkelanjutan untuk meningkatkan eksistensi Himamo baik didalam maupun diluar Polman</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-lg border-0 card-hover">
                    <div class="card-body text-center p-5">
                        <div class="mb-4">
                            <i class='bx bx-list-check' style='font-size: 4rem; color: #00796b;'></i>
                        </div>
                        <h3 class="card-title mt-2">Misi</h3>
                        <ol class="card-text text-start">
                            <li>Membuat Himamo menjadi lahan berkembang bagi setiap individu</li>
                            <li>Membangun Rasa Rasa Bangga dalam Berhimpun melalui Lingkungan yang Sehat dan Supportif</li>
                            <li>Menyempurnakan Sistem. Birokrasi, dan Transparansi dalan Jan Himamo</li>
                            <li>Meningkatkan Eksister isi Himamo di Internal dan Eksternal Polman.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">Makna Logo/Slogan</h2>
            </div>
        </div>
        <div class="row mt-4 d-flex align-items-center">
            <div class="col-md-5 text-center">
                <img src="{{ asset('assets-guest/img/kabinet/logo-kabinet-melaju-bersama.png') }}" alt="Makna Logo" class="img-fluid" style="max-width: 300px;">
            </div>
            <div class="col-md-7">
                <ul class="list-unstyled fs-5">
                    <li class="mb-3"><strong>5 Petir:</strong><br>Merepresentasikan 5 bidang pada Himamo. Ditempatkan di belakang kepala mammoth sebagai simbol bahwa lima bidang ini, atau kabinet ini, akan melaju Bersama.</li>
                    <li class="mb-3"><strong>Sudut 95°:</strong><br>Sudut 95° berasal dari tahun berdirinya HIMAMO, yaitu 1995.</li>
                    <li><strong>Arah:</strong><br>Arah ke atas kanan merepresentasikan bahwa kabinet ini akan membawa peningkatan dan kemajuan bagi Himamo.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container py-5" style="background-color: #ffffff;">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-4 section-title">Struktur Organigram</h2>
                <div class="text-center mb-5">
                    <img src="{{ asset('assets-guest/img/kabinet/struktur-organigram-melaju-bersama.png') }}" alt="Struktur Organigram" class="img-fluid" style="max-width: 900px; margin: auto; box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);">
                </div>
                <div class="row text-center">
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <i class='bx bx-user-check' style="font-size: 3rem; color: #00796b;"></i>
                                <h4 class="card-title mt-2">Fungsional</h4>
                                <p class="lead mb-0">25 orang</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <i class='bx bx-user-pin' style="font-size: 3rem; color: #00796b;"></i>
                                <h4 class="card-title mt-2">Staff Ahli</h4>
                                <p class="lead mb-0">214 orang</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <i class='bx bx-user-plus' style="font-size: 3rem; color: #00796b;"></i>
                                <h4 class="card-title mt-2">Staff Muda</h4>
                                <p class="lead mb-0">289 orang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-5 section-title">Penjelasan Bidang</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm h-100 card-hover border-top-0 border-end-0 border-bottom-0 border-5 border-success">
                            <div class="card-body">
                                <h4 class="card-title">Bidang 1: KPSDM</h4>
                                <p class="card-text">Bertanggung jawab dalam membina, membentuk, dan mengembangkan sumber daya mahasiswa di himpunan, melalui kaderisasi dan program peningkatan kompetensi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm h-100 card-hover border-top-0 border-end-0 border-bottom-0 border-5 border-success">
                            <div class="card-body">
                                <h4 class="card-title">Bidang 2: Tata Kelola Internal</h4>
                                <p class="card-text">Mengatur dan mengelola kegiatan internal himpunan, menjaga keharmonisan hubungan antar anggota, serta menaungi divisi Hubungan Dalam dan Sarana Prasarana.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm h-100 card-hover border-top-0 border-end-0 border-bottom-0 border-5 border-success">
                            <div class="card-body">
                                <h4 class="card-title">Bidang 3: Tata Kelola Eksternal</h4>
                                <p class="card-text">Mengoptimalkan hubungan dengan pihak eksternal dan meningkatkan kontribusi sosial melalui Divisi Relasi Organisasi dan Pengabdian Masyarakat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm h-100 card-hover border-top-0 border-end-0 border-bottom-0 border-5 border-success">
                            <div class="card-body">
                                <h4 class="card-title">Bidang 4: Media Informasi Kreatif</h4>
                                <p class="card-text">Mengelola arus informasi organisasi dan mendorong inovasi ekonomi kreatif melalui Divisi Media & Informasi dan Ekonomi Kreatif.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm h-100 card-hover border-top-0 border-end-0 border-bottom-0 border-5 border-success">
                            <div class="card-body">
                                <h4 class="card-title">Bidang 5: Pengelola Program Kerja</h4>
                                <p class="card-text">Bertanggung jawab atas perencanaan, pengelolaan, dan evaluasi program kerja HIMAMO melalui divisi Kajian Strategis dan Time Liner.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection