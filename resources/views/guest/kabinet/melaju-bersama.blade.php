@extends('guest.layouts.app')

@section('content')

{{-- Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --himamo-green: #009688; /* Hijau khas HIMAMO */
        --himamo-dark-green: #00796b;
    }

    .kabinet-melaju-bersama-page {
        font-family: 'Inter', sans-serif;
        background-color: #fcfcfc;
        color: #334155;
    }

    .kabinet-melaju-bersama-page h1,
    .kabinet-melaju-bersama-page h2,
    .kabinet-melaju-bersama-page h3,
    .kabinet-melaju-bersama-page h4 {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #0f172a;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        background-image: url("{{ asset('assets-guest/img/img-carousel-1.webp') }}");
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        color: white;
        padding: 120px 0;
    }

    .hero-section .overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(rgba(0, 77, 64, 0.8), rgba(0, 121, 107, 0.7));
        z-index: 1;
    }

    .hero-section .container {
        position: relative;
        z-index: 2;
    }

    /* Clean Components */
    .clean-card {
        background: #ffffff;
        border: 1px solid #f1f5f9;
        border-radius: 24px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        transition: all 0.4s ease;
        height: 100%;
    }

    .clean-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.06);
        border-color: var(--himamo-green);
    }

    .section-title {
        font-weight: 800;
        font-size: 2.2rem;
        margin-bottom: 2rem;
        position: relative;
    }

    .section-title::after {
        content: "";
        display: block;
        width: 50px; height: 4px;
        background: var(--himamo-green);
        margin: 15px auto 0;
        border-radius: 10px;
    }

    /* Organigram Specific */
    .organigram-frame {
        max-width: 750px;
        margin: 0 auto;
        padding: 15px;
        background: white;
        border-radius: 20px;
        border: 1px solid #f1f5f9;
        box-shadow: 0 10px 40px rgba(0,0,0,0.04);
    }

    .organigram-img {
        width: 100%;
        border-radius: 12px;
    }

    .badge-clean {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 20px;
        border-radius: 16px;
        transition: all 0.3s ease;
    }

    .icon-wrap {
        width: 60px; height: 60px;
        background: rgba(0, 150, 136, 0.1);
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 15px;
        color: var(--himamo-green);
        font-size: 1.8rem;
    }

    .bidang-num-clean {
        font-weight: 800;
        color: var(--himamo-green);
        opacity: 0.15;
        font-size: 2.5rem;
        position: absolute;
        right: 25px;
        top: 15px;
    }

    .text-muted-custom {
        color: #64748b;
        line-height: 1.7;
    }

    /* DARK MODE SUPPORT */
    [data-theme="dark"] .kabinet-melaju-bersama-page {
        background-color: #0f172a;
        color: #cbd5e1;
    }

    [data-theme="dark"] .kabinet-melaju-bersama-page h1,
    [data-theme="dark"] .kabinet-melaju-bersama-page h2,
    [data-theme="dark"] .kabinet-melaju-bersama-page h3,
    [data-theme="dark"] .kabinet-melaju-bersama-page h4 {
        color: #f8fafc;
    }

    [data-theme="dark"] .clean-card {
        background: #1e293b;
        border-color: #334155;
    }

    [data-theme="dark"] .section-title::after {
        background: var(--himamo-green);
    }

    [data-theme="dark"] .organigram-frame {
        background: #1e293b;
        border-color: #334155;
    }

    [data-theme="dark"] .badge-clean {
        background: #1e293b;
        border-color: #334155;
        color: #f8fafc;
    }

    [data-theme="dark"] .badge-clean h4 {
        color: var(--himamo-green) !important;
    }

    [data-theme="dark"] .badge-clean span {
        color: #94a3b8 !important;
    }

    [data-theme="dark"] .icon-wrap {
        background: rgba(0, 150, 136, 0.15);
        color: var(--himamo-green);
    }

    [data-theme="dark"] .text-muted-custom {
        color: #94a3b8;
    }

    [data-theme="dark"] .bidang-num-clean {
        color: var(--himamo-green);
        opacity: 0.2;
    }

    [data-theme="dark"] .bg-white.shadow-sm.rounded-5 {
        background-color: #1e293b !important;
        box-shadow: 0 10px 40px rgba(0,0,0,0.3) !important;
        border: 1px solid #334155;
    }
</style>

<div class="kabinet-melaju-bersama-page">
    {{-- 1. Hero Section --}}
    <div class="hero-section text-center">
        <div class="overlay"></div>
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Kabinet Melaju Bersama</h1>
        </div>
    </div>

    {{-- 2. Filosofi --}}
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h2 class="section-title">Penjelasan Umum Kabinet</h2>
                <p class="fs-5 text-muted-custom">"Melaju Bersama" bukan sekadar nama, tetapi representasi visi besar sebuah perjalanan kolektif dalam himpunan ini. Filosofi ini lahir dari keyakinan bahwa perubahan yang berarti tidak dibangun oleh satu langkah individu, tetapi oleh banyak langkah kecil yang bergerak seirama dalam satu tujuan besar dengan satu faham dan satu pemikiran. Kabinet ini hadir untuk merangkul keberagaman, menyatukan potensi, dan mengajak seluruh anggota himpunan untuk tidak hanya menjadi penonton perubahan, tetapi menjadi bagian dari mereka yang menciptakan sejarah dan membawanya melaju menuju masa depan yang lebih baik.</p>
            </div>
        </div>
    </div>

    {{-- 3. Visi & Misi --}}
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="clean-card p-5">
                    <div class="icon-wrap">
                        <i class='bx bx-target-lock'></i>
                    </div>
                    <h3 class="text-center mb-4">Visi</h3>
                    <p class="text-muted-custom text-center fs-5">Menjadikan Himamo sebagai wadah yang progresif, inklusif, dan kompeten dalam pengembangan Individu menciptakan lingkungan organisasi yang sehat dan suportif, serta membangun sistem kerja yang berkelanjutan untuk meningkatkan eksistensi Himamo baik didalam maupun diluar Polman</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="clean-card p-5">
                    <div class="icon-wrap">
                        <i class='bx bx-check-shield'></i>
                    </div>
                    <h3 class="text-center mb-4">Misi</h3>
                    <ul class="list-unstyled text-muted-custom fs-6">
                        <li class="mb-3 d-flex align-items-start"><i class='bx bx-chevron-right text-success me-2 mt-1'></i> 1. Membuat Himamo menjadi lahan berkembang bagi setiap individu</li>
                        <li class="mb-3 d-flex align-items-start"><i class='bx bx-chevron-right text-success me-2 mt-1'></i> 2. Membangun Rasa Rasa Bangga dalam Berhimpun melalui Lingkungan yang Sehat dan Supportif</li>
                        <li class="mb-3 d-flex align-items-start"><i class='bx bx-chevron-right text-success me-2 mt-1'></i> 3. Menyempurnakan Sistem, Birokrasi, dan Transparansi dalam Jan Himamo</li>
                        <li class="d-flex align-items-start"><i class='bx bx-chevron-right text-success me-2 mt-1'></i> 4. Meningkatkan Eksistensi Himamo di Internal dan Eksternal Polman.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- 4. Makna Logo/Slogan --}}
    <div class="container py-5 my-5">
        <div class="clean-card p-5">
            <div class="row align-items-center">
                <div class="col-md-5 text-center mb-4 mb-md-0">
                    <img src="{{ asset('assets-guest/img/kabinet/logo-kabinet-melaju-bersama.png') }}" alt="Logo Kabinet" class="img-fluid" style="max-width: 250px;">
                </div>
                <div class="col-md-7 border-start ps-md-5">
                    <h3 class="mb-4">Makna Logo/Slogan</h3>
                    <div class="mb-4">
                        <h5 class="fw-bold mb-1" style="color: var(--himamo-green);">5 Petir:</h5>
                        <p class="text-muted-custom">Merepresentasikan 5 bidang pada Himamo. Ditempatkan di belakang kepala mammoth sebagai simbol bahwa lima bidang ini, atau kabinet ini, akan melaju Bersama.</p>
                    </div>
                    <div class="mb-4">
                        <h5 class="fw-bold mb-1" style="color: var(--himamo-green);">Sudut 95°:</h5>
                        <p class="text-muted-custom">Sudut 95° berasal dari tahun berdirinya HIMAMO, yaitu 1995.</p>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1" style="color: var(--himamo-green);">Arah:</h5>
                        <p class="text-muted-custom">Arah ke atas kanan merepresentasikan bahwa kabinet ini akan membawa peningkatan dan kemajuan bagi Himamo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 5. Struktur Organigram --}}
    <div class="container py-5 bg-white shadow-sm rounded-5">
        <div class="text-center mb-5">
            <h2 class="section-title">Struktur Organigram</h2>
            <div class="organigram-frame mt-4">
                <img src="{{ asset('assets-guest/img/kabinet/struktur-organigram-melaju-bersama.png') }}" alt="Organigram" class="organigram-img">
            </div>
        </div>
        <div class="row g-4 justify-content-center text-center px-4">
            <div class="col-md-4">
                <div class="badge-clean">
                    <h4 class="mb-1" style="color: var(--himamo-green);">25</h4>
                    <span class="text-muted small fw-bold uppercase">Fungsional</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="badge-clean">
                    <h4 class="mb-1" style="color: var(--himamo-green);">214</h4>
                    <span class="text-muted small fw-bold uppercase">Staff Ahli</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="badge-clean">
                    <h4 class="mb-1" style="color: var(--himamo-green);">289</h4>
                    <span class="text-muted small fw-bold uppercase">Staff Muda</span>
                </div>
            </div>
        </div>
    </div>

    {{-- 6. Penjelasan Bidang --}}
    <div class="container pt-5 pb-5 mb-0"> {{-- Diubah margin-bottomnya ke 0 --}}
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
                <div class="clean-card p-4 position-relative overflow-hidden">
                    <span class="bidang-num-clean">{{ $b['num'] }}</span>
                    <h4 class="mb-3">Bidang {{ $b['num'] }}: {{ $b['title'] }}</h4>
                    <p class="text-muted-custom mb-0">{{ $b['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection