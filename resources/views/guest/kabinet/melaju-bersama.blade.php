@extends('guest.layouts.app')

@section('content')

{{-- Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
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
        background: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.6));
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
        border-color: #e2e8f0;
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
        background: #0ea5e9;
        margin: 15px auto 0;
        border-radius: 10px;
    }

    /* Organigram Specific */
    .organigram-frame {
        max-width: 750px; /* Diperkecil sesuai request */
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

    .badge-clean:hover {
        background: #f1f5f9;
    }

    .icon-wrap {
        width: 60px; height: 60px;
        background: #f1f5f9;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 15px;
        color: #0ea5e9;
        font-size: 1.8rem;
    }

    .bidang-num-clean {
        font-weight: 800;
        color: #0ea5e9;
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
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }

    [data-theme="dark"] .clean-card:hover {
        background: #1e293b;
        border-color: #0ea5e9;
        box-shadow: 0 15px 35px rgba(0,0,0,0.3);
    }

    [data-theme="dark"] .section-title::after {
        background: #38bdf8;
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

    [data-theme="dark"] .icon-wrap {
        background: rgba(14, 165, 233, 0.1);
        color: #38bdf8;
    }

    [data-theme="dark"] .text-muted-custom {
        color: #94a3b8;
    }

    [data-theme="dark"] .badge-clean h4 {
        color: #38bdf8 !important;
    }

    [data-theme="dark"] .badge-clean span {
        color: #94a3b8 !important;
    }

    [data-theme="dark"] .bidang-num-clean {
        color: #38bdf8;
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
            <p class="lead fs-4 opacity-80">"Satukan Langkah, Ciptakan Sejarah"</p>
        </div>
    </div>

    {{-- 2. Filosofi --}}
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Filosofi Perjalanan</h2>
                <p class="fs-5 text-muted-custom">"Melaju Bersama" bukan sekadar nama, tetapi representasi visi besar sebuah perjalanan kolektif dalam himpunan ini. Filosofi ini lahir dari keyakinan bahwa perubahan yang berarti tidak dibangun oleh satu langkah individu, tetapi oleh banyak langkah kecil yang bergerak seirama dalam satu tujuan besar. Kabinet ini hadir untuk merangkul keberagaman, menyatukan potensi, dan mengajak seluruh anggota untuk melaju menuju masa depan yang lebih baik.</p>
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
                    <p class="text-muted-custom text-center fs-5">Menjadikan Himamo sebagai wadah yang progresif, inklusif, dan kompeten dalam pengembangan individu menciptakan lingkungan organisasi yang sehat dan suportif.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="clean-card p-5">
                    <div class="icon-wrap">
                        <i class='bx bx-check-shield'></i>
                    </div>
                    <h3 class="text-center mb-4">Misi</h3>
                    <ul class="list-unstyled text-muted-custom fs-6">
                        <li class="mb-3 d-flex align-items-center"><i class='bx bx-chevron-right text-info me-2'></i> Lahan berkembang bagi setiap individu.</li>
                        <li class="mb-3 d-flex align-items-center"><i class='bx bx-chevron-right text-info me-2'></i> Rasa bangga melalui lingkungan sehat.</li>
                        <li class="mb-3 d-flex align-items-center"><i class='bx bx-chevron-right text-info me-2'></i> Menyempurnakan sistem & transparansi.</li>
                        <li class="d-flex align-items-center"><i class='bx bx-chevron-right text-info me-2'></i> Meningkatkan eksistensi Himamo.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- 4. Makna Identitas --}}
    <div class="container py-5 my-5">
        <div class="clean-card p-5">
            <div class="row align-items-center">
                <div class="col-md-5 text-center mb-4 mb-md-0">
                    <img src="{{ asset('assets-guest/img/kabinet/logo-kabinet-melaju-bersama.png') }}" alt="Logo Kabinet" class="img-fluid" style="max-width: 250px;">
                </div>
                <div class="col-md-7 border-start ps-md-5">
                    <h3 class="mb-4">Makna Identitas</h3>
                    <div class="mb-4">
                        <h5 class="fw-bold text-info mb-1">5 Petir</h5>
                        <p class="text-muted-custom">Representasi 5 bidang yang melaju bersama mendukung semangat Mammoth.</p>
                    </div>
                    <div class="mb-4">
                        <h5 class="fw-bold text-info mb-1">Sudut 95°</h5>
                        <p class="text-muted-custom">Tanda penghormatan pada tahun kelahiran HIMAMO (1995).</p>
                    </div>
                    <div>
                        <h5 class="fw-bold text-info mb-1">Arah Panah</h5>
                        <p class="text-muted-custom">Simbolisme pergerakan progresif ke arah kemajuan organisasi.</p>
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
                    <h4 class="mb-1 text-primary">25</h4>
                    <span class="text-muted small fw-bold uppercase">Fungsional</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="badge-clean">
                    <h4 class="mb-1 text-primary">214</h4>
                    <span class="text-muted small fw-bold uppercase">Staff Ahli</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="badge-clean">
                    <h4 class="mb-1 text-primary">289</h4>
                    <span class="text-muted small fw-bold uppercase">Staff Muda</span>
                </div>
            </div>
        </div>
    </div>

    {{-- 6. Penjelasan Bidang --}}
    <div class="container py-5 my-5">
        <div class="text-center mb-5">
            <h2 class="section-title">Penjelasan Bidang</h2>
        </div>
        <div class="row g-4 justify-content-center">
            @php
                $bidang = [
                    ['num' => '01', 'title' => 'KPSDM', 'desc' => 'Membina, membentuk, dan mengembangkan sumber daya mahasiswa di himpunan melalui kaderisasi.'],
                    ['num' => '02', 'title' => 'Internal', 'desc' => 'Mengelola kegiatan internal, menjaga keharmonisan, serta menaungi Sarana Prasarana.'],
                    ['num' => '03', 'title' => 'Eksternal', 'desc' => 'Mengoptimalkan hubungan dengan pihak eksternal dan kontribusi pengabdian masyarakat.'],
                    ['num' => '04', 'title' => 'Medinfo', 'desc' => 'Mengelola arus informasi kreatif dan mendorong inovasi ekonomi kreatif.'],
                    ['num' => '05', 'title' => 'PPK', 'desc' => 'Perencanaan, pengelolaan, dan evaluasi program kerja melalui kajian strategis.']
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