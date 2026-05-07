@extends('guest.layouts.app')

@section('content')

{{-- Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --himamo-green: #009688;
        --himamo-dark: #004d40;
        --himamo-light-green: #e0f2f1;
        --adyaksana-accent: #ffd700; /* Emas untuk Adyaksana */
    }

    .kabinet-adyaksana-page {
        font-family: 'Outfit', sans-serif;
        background-color: #f8faf9;
        color: #334155;
        letter-spacing: -0.01em;
    }

    .kabinet-adyaksana-page h1,
    .kabinet-adyaksana-page h2,
    .kabinet-adyaksana-page h3,
    .kabinet-adyaksana-page h4 {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: var(--himamo-dark);
        letter-spacing: -0.02em;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        background-image: url("{{ asset('assets-guest/img/img-carousel-1.webp') }}");
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        color: white;
        padding: 160px 0;
        overflow: hidden;
    }

    .hero-section .overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(135deg, rgba(0, 77, 64, 0.9) 0%, rgba(0, 40, 30, 0.8) 100%);
        z-index: 1;
    }

    .hero-section .container {
        position: relative;
        z-index: 2;
    }

    /* Premium Card */
    .premium-clean-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(226, 232, 240, 0.8);
        border-radius: 30px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 77, 64, 0.03);
        transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        height: 100%;
    }

    .premium-clean-card:hover {
        transform: translateY(-12px);
        background: #ffffff;
        box-shadow: 0 30px 60px rgba(0, 77, 64, 0.1);
        border-color: var(--himamo-green);
    }

    .section-title {
        font-size: 2.5rem;
        margin-bottom: 2.5rem;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: "";
        display: block;
        width: 60px; height: 5px;
        background: var(--himamo-green);
        margin: 15px auto 0;
        border-radius: 10px;
    }

    .icon-container {
        width: 70px; height: 70px;
        background: linear-gradient(135deg, var(--himamo-light-green), #fff);
        border-radius: 20px;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 25px;
        color: var(--himamo-green);
        font-size: 2rem;
    }

    /* DARK MODE (Standard HIMAMO) */
    [data-theme="dark"] .kabinet-adyaksana-page {
        background-color: #191d24 !important;
        color: #e2e8f0;
    }

    [data-theme="dark"] .premium-clean-card {
        background: #393e46 !important;
        border-color: rgba(255, 255, 255, 0.1);
        box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    }

    [data-theme="dark"] .kabinet-adyaksana-page h1,
    [data-theme="dark"] .kabinet-adyaksana-page h2,
    [data-theme="dark"] .kabinet-adyaksana-page h3,
    [data-theme="dark"] .kabinet-adyaksana-page h4,
    [data-theme="dark"] .kabinet-adyaksana-page h5 {
        color: #f8fafc !important;
    }

    [data-theme="dark"] .kabinet-adyaksana-page .section-title,
    [data-theme="dark"] .kabinet-adyaksana-page .text-success {
        color: #4db6ac !important;
    }

    [data-theme="dark"] .icon-container {
        background: rgba(77, 182, 172, 0.15) !important;
        color: #4db6ac !important;
    }
</style>

<div class="kabinet-adyaksana-page">
    {{-- Hero --}}
    <div class="hero-section text-center">
        <div class="overlay"></div>
        <div class="container">
            <h1 class="display-3 fw-bold mb-0">Kabinet Adyaksana</h1>
            <p class="fs-4 opacity-75 mt-3">2026 - 2027</p>
        </div>
    </div>

    {{-- Filosofi --}}
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h2 class="section-title">Filosofi Adyaksana</h2>
                <p class="fs-5 lh-lg opacity-90">"Adyaksana" diambil dari bahasa Sanskerta yang berarti penjaga atau pemimpin yang adil dan bijaksana. Kabinet ini membawa visi untuk menjadi garda terdepan dalam menjaga integritas, marwah, dan prestasi HIMAMO. Dengan semangat keberlanjutan dari kabinet sebelumnya, Adyaksana bertekad untuk menyempurnakan sistem yang ada dan membawa inovasi baru yang bermanfaat bagi seluruh mahasiswa Teknik Otomasi.</p>
            </div>
        </div>
    </div>

    {{-- Visi & Misi --}}
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="premium-clean-card text-center">
                    <div class="icon-container">
                        <i class='bx bx-crown'></i>
                    </div>
                    <h3 class="mb-4">Visi</h3>
                    <p class="fs-5 opacity-90">Mewujudkan HIMAMO sebagai organisasi yang berintegritas tinggi, inovatif dalam teknologi, dan menjadi pusat pengembangan karakter mahasiswa otomasi yang unggul di tingkat nasional.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="premium-clean-card">
                    <div class="icon-container">
                        <i class='bx bx-shield-quarter'></i>
                    </div>
                    <h3 class="text-center mb-4">Misi</h3>
                    <ul class="list-unstyled fs-6 lh-lg">
                        <li class="mb-3 d-flex align-items-start"><i class='bx bxs-check-shield text-success me-2 mt-1 fs-5'></i> 1. Memperkuat pondasi internal organisasi yang berbasis kekeluargaan dan profesionalisme.</li>
                        <li class="mb-3 d-flex align-items-start"><i class='bx bxs-check-shield text-success me-2 mt-1 fs-5'></i> 2. Mengakselerasi adaptasi teknologi otomasi terbaru dalam setiap program kerja.</li>
                        <li class="mb-3 d-flex align-items-start"><i class='bx bxs-check-shield text-success me-2 mt-1 fs-5'></i> 3. Menjalin kolaborasi strategis dengan industri dan alumni.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
