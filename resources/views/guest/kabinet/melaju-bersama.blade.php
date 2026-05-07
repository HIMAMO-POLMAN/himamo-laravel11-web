@extends('guest.layouts.app')

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --kabinet-teal: #00796b;
        --kabinet-dark: #004d40;
        --kabinet-gold: #ffc107;
        --kabinet-glass: rgba(255, 255, 255, 0.9);
    }

    .kabinet-page {
        font-family: 'Outfit', sans-serif;
        background-color: #f0f4f3;
        color: #2d3436;
        overflow-x: hidden;
    }

    /* Typography */
    .kabinet-page h1, .kabinet-page h2, .kabinet-page h3, .kabinet-page h4 {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        color: var(--kabinet-dark);
    }

    /* Hero Section */
    .premium-hero {
        position: relative;
        height: 60vh;
        min-height: 450px;
        background-image: url("{{ asset('assets-guest/img/img-carousel-1.webp') }}");
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
    }

    .premium-hero::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(135deg, rgba(0, 77, 64, 0.85) 0%, rgba(0, 121, 107, 0.7) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        padding: 20px;
    }

    .hero-badge {
        background: var(--kabinet-gold);
        color: var(--kabinet-dark);
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        display: inline-block;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
    }

    .hero-title {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        line-height: 1.1;
        margin-bottom: 15px;
        text-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    /* Sections */
    .section-padding {
        padding: 100px 0;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-header h2 {
        font-size: 2.5rem;
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
    }

    .section-header h2::after {
        content: "";
        position: absolute;
        bottom: 0; left: 50%;
        transform: translateX(-50%);
        width: 80px; height: 5px;
        background: var(--kabinet-teal);
        border-radius: 10px;
    }

    /* Cards */
    .vision-mision-card {
        background: var(--kabinet-glass);
        backdrop-filter: blur(10px);
        border-radius: 24px;
        border: 1px solid rgba(255,255,255,0.3);
        padding: 45px;
        height: 100%;
        box-shadow: 0 20px 40px rgba(0,0,0,0.05);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .vision-mision-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 60px rgba(0,77,64,0.12);
        background: #fff;
    }

    .icon-box {
        width: 80px;
        height: 80px;
        background: rgba(0, 121, 107, 0.1);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        color: var(--kabinet-teal);
        font-size: 2.5rem;
    }

    /* Identity Section */
    .identity-bg {
        background: #fff;
        border-radius: 40px;
        padding: 60px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
    }

    .logo-img {
        max-width: 320px;
        filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));
        transition: transform 0.5s ease;
    }

    .logo-img:hover {
        transform: scale(1.05) rotate(2deg);
    }

    .identity-list li {
        margin-bottom: 20px;
        padding-left: 20px;
        border-left: 4px solid var(--kabinet-gold);
    }

    /* Organigram */
    .organigram-container {
        background: white;
        border-radius: 30px;
        padding: 40px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.08);
    }

    /* Bidang Cards */
    .bidang-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        height: 100%;
        border-bottom: 5px solid var(--kabinet-teal);
        transition: all 0.3s ease;
    }

    .bidang-card:hover {
        background: var(--kabinet-teal);
        color: white;
        transform: translateY(-5px);
    }

    .bidang-card:hover h4 {
        color: white;
    }

    .bidang-num {
        font-weight: 800;
        opacity: 0.1;
        font-size: 3rem;
        position: absolute;
        right: 20px;
        top: 10px;
    }
</style>

<div class="kabinet-page">
    {{-- Hero Section --}}
    <section class="premium-hero">
        <div class="hero-content container">
            <span class="hero-badge">PERIODE 2025/2026</span>
            <h1 class="hero-title">KABINET<br>MELAJU BERSAMA</h1>
            <p class="lead fs-4 opacity-75">"Satukan Langkah, Ciptakan Sejarah"</p>
        </div>
    </section>

    {{-- Intro Section --}}
    <section class="section-padding container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-header">
                    <h2>Filosofi Perjalanan</h2>
                </div>
                <p class="fs-5 text-secondary lh-lg">"Melaju Bersama" bukan sekadar nama, tetapi representasi visi besar sebuah perjalanan kolektif. Filosofi ini lahir dari keyakinan bahwa perubahan yang berarti tidak dibangun oleh satu langkah individu, tetapi oleh banyak langkah kecil yang bergerak seirama. Kabinet ini hadir untuk merangkul keberagaman, menyatukan potensi, dan mengajak seluruh anggota untuk melaju menuju masa depan yang lebih baik.</p>
            </div>
        </div>
    </section>

    {{-- Visi & Misi --}}
    <section class="section-padding bg-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="vision-mision-card">
                        <div class="icon-box">
                            <i class='bx bx-bullseye'></i>
                        </div>
                        <h3>Visi Kabinet</h3>
                        <p class="fs-5 text-secondary">Menjadikan Himamo sebagai wadah yang progresif, inklusif, dan kompeten dalam pengembangan individu, menciptakan lingkungan organisasi yang sehat dan suportif, serta membangun sistem kerja yang berkelanjutan.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="vision-mision-card">
                        <div class="icon-box">
                            <i class='bx bx-list-check'></i>
                        </div>
                        <h3>Misi Utama</h3>
                        <ul class="list-unstyled fs-6 text-secondary">
                            <li class="mb-3 d-flex align-items-start"><i class='bx bxs-check-circle me-2 mt-1 text-success'></i> Menjadikan Himamo lahan berkembang bagi setiap individu.</li>
                            <li class="mb-3 d-flex align-items-start"><i class='bx bxs-check-circle me-2 mt-1 text-success'></i> Membangun rasa bangga melalui lingkungan yang sehat.</li>
                            <li class="mb-3 d-flex align-items-start"><i class='bx bxs-check-circle me-2 mt-1 text-success'></i> Menyempurnakan sistem, birokrasi, dan transparansi.</li>
                            <li class="mb-3 d-flex align-items-start"><i class='bx bxs-check-circle me-2 mt-1 text-success'></i> Meningkatkan eksistensi di internal dan eksternal Polman.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Identity --}}
    <section class="section-padding">
        <div class="container">
            <div class="identity-bg">
                <div class="row align-items-center">
                    <div class="col-lg-5 text-center mb-5 mb-lg-0">
                        <img src="{{ asset('assets-guest/img/kabinet/logo-kabinet-melaju-bersama.png') }}" alt="Logo Kabinet" class="logo-img img-fluid">
                    </div>
                    <div class="col-lg-7">
                        <h2 class="mb-4">Identitas Visual</h2>
                        <ul class="list-unstyled identity-list fs-5">
                            <li><strong>5 Petir:</strong> Merepresentasikan 5 bidang pada Himamo yang melaju bersama di belakang semangat mammoth.</li>
                            <li><strong>Sudut 95°:</strong> Penghormatan pada akar sejarah HIMAMO yang berdiri sejak tahun 1995.</li>
                            <li><strong>Arah Panah:</strong> Simbolisme pergerakan ke atas dan ke kanan sebagai arah kemajuan konstan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Organigram --}}
    <section class="section-padding bg-white">
        <div class="container text-center">
            <div class="section-header">
                <h2>Struktur Organigram</h2>
            </div>
            <div class="organigram-container mb-5">
                <img src="{{ asset('assets-guest/img/kabinet/struktur-organigram-melaju-bersama.png') }}" alt="Organigram" class="img-fluid rounded">
            </div>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="p-4 bg-light rounded-4">
                        <h4 class="mb-1">25</h4>
                        <p class="text-secondary mb-0">Fungsional</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-light rounded-4">
                        <h4 class="mb-1">214</h4>
                        <p class="text-secondary mb-0">Staff Ahli</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-light rounded-4">
                        <h4 class="mb-1">289</h4>
                        <p class="text-secondary mb-0">Staff Muda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Bidang Section --}}
    <section class="section-padding container">
        <div class="section-header">
            <h2>Penjelasan Bidang</h2>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="bidang-card position-relative">
                    <span class="bidang-num">01</span>
                    <h4>KPSDM</h4>
                    <p class="opacity-75">Membina, membentuk, dan mengembangkan sumber daya mahasiswa melalui kaderisasi terpadu.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="bidang-card position-relative">
                    <span class="bidang-num">02</span>
                    <h4>Internal</h4>
                    <p class="opacity-75">Mengelola keharmonisan hubungan antar anggota dan sarana prasarana himpunan.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="bidang-card position-relative">
                    <span class="bidang-num">03</span>
                    <h4>Eksternal</h4>
                    <p class="opacity-75">Mengoptimalkan relasi organisasi dan kontribusi sosial pengabdian masyarakat.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="bidang-card position-relative">
                    <span class="bidang-num">04</span>
                    <h4>Medinfo</h4>
                    <p class="opacity-75">Mengelola arus informasi kreatif dan mendorong inovasi ekonomi di lingkungan himpunan.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="bidang-card position-relative">
                    <span class="bidang-num">05</span>
                    <h4>PPK</h4>
                    <p class="opacity-75">Perencanaan, pengelolaan, dan evaluasi program kerja melalui kajian strategis.</p>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection