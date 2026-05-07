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
    }

    .kabinet-melaju-bersama-page {
        font-family: 'Outfit', sans-serif; /* Font lebih modern & premium */
        background-color: #f8faf9;
        color: #334155;
        letter-spacing: -0.01em;
    }

    .kabinet-melaju-bersama-page h1,
    .kabinet-melaju-bersama-page h2,
    .kabinet-melaju-bersama-page h3,
    .kabinet-melaju-bersama-page h4 {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: var(--himamo-dark);
        letter-spacing: -0.02em;
    }

    /* Hero Section - Lebih Sinematik */
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
        background: linear-gradient(135deg, rgba(0, 77, 64, 0.85) 0%, rgba(0, 30, 20, 0.7) 100%);
        z-index: 1;
    }

    .hero-section .container {
        position: relative;
        z-index: 2;
    }

    /* Clean Premium Card */
    .premium-clean-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(226, 232, 240, 0.8);
        border-radius: 30px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 77, 64, 0.03);
        transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        height: 100%;
        position: relative;
    }

    .premium-clean-card:hover {
        transform: translateY(-12px) scale(1.02);
        background: #ffffff;
        box-shadow: 0 30px 60px rgba(0, 77, 64, 0.08);
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
        box-shadow: 0 2px 10px rgba(0, 150, 136, 0.3);
    }

    .icon-container {
        width: 70px; height: 70px;
        background: linear-gradient(135deg, var(--himamo-light-green), #fff);
        border-radius: 20px;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 25px;
        color: var(--himamo-green);
        font-size: 2rem;
        box-shadow: 0 5px 15px rgba(0, 150, 136, 0.1);
    }

    /* Organigram Frame */
    .organigram-frame {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background: #fff;
        border-radius: 35px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9;
        transition: transform 0.4s ease;
    }

    .organigram-frame:hover {
        transform: scale(1.01);
    }

    .stat-badge {
        background: white;
        border: 1px solid #f1f5f9;
        padding: 25px;
        border-radius: 24px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.02);
    }

    .stat-badge h4 {
        font-size: 2rem;
        margin-bottom: 5px;
        color: var(--himamo-green) !important;
    }

    .stat-badge:hover {
        background: var(--himamo-dark);
        border-color: var(--himamo-dark);
    }

    .stat-badge:hover h4, .stat-badge:hover span {
        color: white !important;
    }

    /* DARK MODE (Sync & High Contrast) */
    [data-theme="dark"] .kabinet-melaju-bersama-page {
        background-color: #191d24 !important;
        color: #e2e8f0;
    }

    [data-theme="dark"] .premium-clean-card {
        background: #393e46 !important;
        border-color: rgba(255, 255, 255, 0.1);
        box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    }

    [data-theme="dark"] .premium-clean-card:hover {
        background: #4a505a !important;
        border-color: #4db6ac;
    }

    [data-theme="dark"] .organigram-frame,
    [data-theme="dark"] .stat-badge {
        background: #393e46 !important;
        border-color: rgba(255, 255, 255, 0.1);
    }

    [data-theme="dark"] .bg-white.shadow-sm.rounded-5 {
        background-color: #393e46 !important;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    [data-theme="dark"] .kabinet-melaju-bersama-page h1,
    [data-theme="dark"] .kabinet-melaju-bersama-page h2,
    [data-theme="dark"] .kabinet-melaju-bersama-page h3,
    [data-theme="dark"] .kabinet-melaju-bersama-page h4,
    [data-theme="dark"] .kabinet-melaju-bersama-page h5 {
        color: #f8fafc !important;
    }

    /* Vibrant Teal for Dark Mode Readability */
    [data-theme="dark"] .kabinet-melaju-bersama-page .text-success,
    [data-theme="dark"] .kabinet-melaju-bersama-page [style*="color: var(--himamo-green)"],
    [data-theme="dark"] .kabinet-melaju-bersama-page h3,
    [data-theme="dark"] .kabinet-melaju-bersama-page h4,
    [data-theme="dark"] .kabinet-melaju-bersama-page .section-title {
        color: #4db6ac !important;
    }

    [data-theme="dark"] .kabinet-melaju-bersama-page .section-title::after {
        background: #4db6ac !important;
        box-shadow: 0 2px 10px rgba(77, 182, 172, 0.4);
    }

    [data-theme="dark"] .icon-container {
        background: rgba(77, 182, 172, 0.15) !important;
        color: #4db6ac !important;
    }
</style>

<div class="kabinet-melaju-bersama-page">
    {{-- 1. Hero Section --}}
    <div class="hero-section text-center">
        <div class="overlay"></div>
        <div class="container">
            <h1 class="display-3 fw-bold mb-0">Kabinet Melaju Bersama</h1>
        </div>
    </div>

    {{-- 2. Filosofi --}}
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h2 class="section-title">Penjelasan Umum Kabinet</h2>
                <p class="fs-5 lh-lg opacity-90">"Melaju Bersama" bukan sekadar nama, tetapi representasi visi besar sebuah perjalanan kolektif dalam himpunan ini. Filosofi ini lahir dari keyakinan bahwa perubahan yang berarti tidak dibangun oleh satu langkah individu, tetapi oleh banyak langkah kecil yang bergerak seirama dalam satu tujuan besar dengan satu faham dan satu pemikiran. Kabinet ini hadir untuk merangkul keberagaman, menyatukan potensi, dan mengajak seluruh anggota himpunan untuk tidak hanya menjadi penonton perubahan, tetapi menjadi bagian dari mereka yang menciptakan sejarah dan membawanya melaju menuju masa depan yang lebih baik.</p>
            </div>
        </div>
    </div>

    {{-- 3. Visi & Misi --}}
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="premium-clean-card text-center">
                    <div class="icon-container">
                        <i class='bx bx-target-lock'></i>
                    </div>
                    <h3 class="mb-4">Visi</h3>
                    <p class="fs-5 opacity-90">Menjadikan Himamo sebagai wadah yang progresif, inklusif, dan kompeten dalam pengembangan Individu menciptakan lingkungan organisasi yang sehat dan suportif, serta membangun sistem kerja yang berkelanjutan untuk meningkatkan eksistensi Himamo baik didalam maupun diluar Polman</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="premium-clean-card">
                    <div class="icon-container">
                        <i class='bx bx-check-shield'></i>
                    </div>
                    <h3 class="text-center mb-4">Misi</h3>
                    <ul class="list-unstyled fs-6 lh-lg">
                        <li class="mb-3 d-flex align-items-start"><i class='bx bxs-check-circle text-success me-2 mt-1 fs-5'></i> 1. Membuat Himamo menjadi lahan berkembang bagi setiap individu</li>
                        <li class="mb-3 d-flex align-items-start"><i class='bx bxs-check-circle text-success me-2 mt-1 fs-5'></i> 2. Membangun Rasa Rasa Bangga dalam Berhimpun melalui Lingkungan yang Sehat dan Supportif</li>
                        <li class="mb-3 d-flex align-items-start"><i class='bx bxs-check-circle text-success me-2 mt-1 fs-5'></i> 3. Menyempurnakan Sistem, Birokrasi, dan Transparansi dalam Jan Himamo</li>
                        <li class="d-flex align-items-start"><i class='bx bxs-check-circle text-success me-2 mt-1 fs-5'></i> 4. Meningkatkan Eksistensi Himamo di Internal dan Eksternal Polman.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- 4. Makna Logo/Slogan --}}
    <div class="container py-5 my-5">
        <div class="premium-clean-card p-lg-5">
            <div class="row align-items-center">
                <div class="col-md-5 text-center mb-5 mb-md-0">
                    <img src="{{ asset('assets-guest/img/kabinet/logo-kabinet-melaju-bersama.png') }}" alt="Logo Kabinet" class="img-fluid" style="max-width: 260px; filter: drop-shadow(0 15px 25px rgba(0,0,0,0.1));">
                </div>
                <div class="col-md-7 border-start ps-md-5">
                    <h3 class="mb-4">Makna Logo/Slogan</h3>
                    <div class="mb-4">
                        <h5 class="fw-bold mb-2" style="color: var(--himamo-green);">5 Petir:</h5>
                        <p class="opacity-90">Merepresentasikan 5 bidang pada Himamo. Ditempatkan di belakang kepala mammoth sebagai simbol bahwa lima bidang ini, atau kabinet ini, akan melaju Bersama.</p>
                    </div>
                    <div class="mb-4">
                        <h5 class="fw-bold mb-2" style="color: var(--himamo-green);">Sudut 95°:</h5>
                        <p class="opacity-90">Sudut 95° berasal dari tahun berdirinya HIMAMO, yaitu 1995.</p>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-2" style="color: var(--himamo-green);">Arah:</h5>
                        <p class="opacity-90">Arah ke atas kanan merepresentasikan bahwa kabinet ini akan membawa peningkatan dan kemajuan bagi Himamo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 5. Struktur Organigram --}}
    <div class="container py-5 bg-white shadow-sm rounded-5 my-5">
        <div class="text-center mb-5">
            <h2 class="section-title">Struktur Organigram</h2>
            <div class="organigram-frame mt-4 p-3">
                <img src="{{ asset('assets-guest/img/kabinet/struktur-organigram-melaju-bersama.png') }}" alt="Organigram" class="img-fluid rounded-4">
            </div>
        </div>
        <div class="row g-4 justify-content-center text-center px-4">
            <div class="col-md-4">
                <div class="stat-badge">
                    <h4>25</h4>
                    <span class="text-secondary small fw-bold">Fungsional</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-badge">
                    <h4>214</h4>
                    <span class="text-secondary small fw-bold">Staff Ahli</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-badge">
                    <h4>289</h4>
                    <span class="text-secondary small fw-bold">Staff Muda</span>
                </div>
            </div>
        </div>
    </div>

    {{-- 6. Penjelasan Bidang --}}
    <div class="container py-5 mb-0">
        <div class="text-center mb-5">
            <h2 class="section-title">Penjelasan Bidang</h2>
        </div>
        <div class="row g-4 justify-content-center">
            @php
                $bidang = [
                    ['num' => '1', 'title' => 'KPSDM', 'desc' => 'Bertanggung jawab dalam membina, membentuk, dan mengembangkan sumber daya mahasiswa di himpunan, melalui kaderisasi dan program peningkatan kompetensi.'],
                    ['num' => '2', 'title' => 'Tata Kelola Internal', 'desc' => 'Mengatur dan mengelola kegiatan internal himpunan, menjaga keharmonisan hubungan antar anggota, serta menaungi divisi Hubungan Dalam dan Sarana Prasarana.'],
                    ['num' => '3', 'title' => 'Tata Kelola Eksternal', 'desc' => 'Mengoptimalkan hubungan dengan pihak eksternal dan meningkatkan kontribusi sosial melalui Divisi Relasi Organisasi dan Pengabdian Masyarakat.'],
                    ['num' => '4', 'title' => 'Media Informasi Kreatif', 'desc' => 'Mengelola arus informasi organisasi dan mendorong inovasi ekonomi kreatif melalui Divisi Media & Informasi dan Ekonomi Kreatif.'],
                    ['num' => '5', 'title' => 'Pengelola Program Kerja', 'desc' => 'Bertanggung jawab atas perencanaan, pengelolaan, dan evaluasi program kerja HIMAMO melalui divisi Kajian Strategis dan Time Liner.']
                ];
            @endphp
            @foreach($bidang as $b)
            <div class="col-lg-4 col-md-6">
                <div class="premium-clean-card p-4">
                    <h4 class="mb-3" style="color: var(--himamo-green);">Bidang {{ $b['num'] }}: {{ $b['title'] }}</h4>
                    <p class="opacity-90 small">{{ $b['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection