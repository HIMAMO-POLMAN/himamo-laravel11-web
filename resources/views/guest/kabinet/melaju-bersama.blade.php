@extends('guest.layouts.app')

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
    .kabinet-melaju-bersama-page {
        font-family: 'Outfit', sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    .kabinet-melaju-bersama-page h1,
    .kabinet-melaju-bersama-page h2,
    .kabinet-melaju-bersama-page h3,
    .kabinet-melaju-bersama-page h4 {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #004d40;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        background-image: url("{{ asset('assets-guest/img/img-carousel-1.webp') }}");
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        color: white;
    }

    .hero-section .overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(135deg, rgba(0, 77, 64, 0.8) 0%, rgba(0, 121, 107, 0.7) 100%);
        z-index: 1;
    }

    .hero-section .container {
        position: relative;
        z-index: 2;
    }

    /* Premium Cards */
    .premium-card {
        background: #ffffff;
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        height: 100%;
    }

    .premium-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,77,64,0.1);
    }

    .section-title {
        font-weight: 800;
        color: #004d40;
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
    }

    .section-title::after {
        content: "";
        position: absolute;
        bottom: 0; left: 50%;
        transform: translateX(-50%);
        width: 60px; height: 4px;
        background: #ffc107;
        border-radius: 10px;
    }

    .icon-circle {
        width: 80px; height: 80px;
        background: rgba(0, 121, 107, 0.1);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 20px;
        color: #00796b;
        font-size: 2.5rem;
    }

    .bidang-badge {
        position: absolute;
        top: 15px; right: 20px;
        font-size: 2.5rem;
        font-weight: 900;
        opacity: 0.05;
        color: #004d40;
    }
</style>

<div class="kabinet-melaju-bersama-page">
    {{-- Hero Section (Sesuai Layout Asli) --}}
    <div class="hero-section">
        <div class="overlay"></div>
        <div class="container py-5 text-center">
            <div class="py-5">
                <h1 class="display-3 fw-bold mb-3">Kabinet Melaju Bersama</h1>
                <p class="lead fs-3 opacity-90">"Satukan Langkah, Ciptakan Sejarah"</p>
            </div>
        </div>
    </div>

    {{-- Penjelasan Umum (Sesuai Layout Asli) --}}
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h2 class="section-title mb-4">Filosofi Perjalanan</h2>
                <p class="lead mt-3 text-secondary">"Melaju Bersama" bukan sekadar nama, tetapi representasi visi besar sebuah perjalanan kolektif dalam himpunan ini. Filosofi ini lahir dari keyakinan bahwa perubahan yang berarti tidak dibangun oleh satu langkah individu, tetapi oleh banyak langkah kecil yang bergerak seirama dalam satu tujuan besar. Kabinet ini hadir untuk merangkul keberagaman, menyatukan potensi, dan mengajak seluruh anggota untuk melaju menuju masa depan yang lebih baik.</p>
            </div>
        </div>
    </div>

    {{-- Visi & Misi (Sesuai Layout Asli) --}}
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6 mb-4">
                <div class="card premium-card p-4">
                    <div class="card-body text-center">
                        <div class="icon-circle">
                            <i class='bx bx-bullseye'></i>
                        </div>
                        <h3 class="card-title mb-3">Visi</h3>
                        <p class="card-text fs-5 text-secondary">Menjadikan Himamo sebagai wadah yang progresif, inklusif, dan kompeten dalam pengembangan individu menciptakan lingkungan organisasi yang sehat dan suportif.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card premium-card p-4">
                    <div class="card-body">
                        <div class="icon-circle">
                            <i class='bx bx-list-check'></i>
                        </div>
                        <h3 class="card-title text-center mb-3">Misi</h3>
                        <ul class="list-unstyled fs-6 text-secondary">
                            <li class="mb-2"><i class='bx bx-check-double text-success me-2'></i> Lahan berkembang bagi setiap individu.</li>
                            <li class="mb-2"><i class='bx bx-check-double text-success me-2'></i> Rasa bangga melalui lingkungan sehat.</li>
                            <li class="mb-2"><i class='bx bx-check-double text-success me-2'></i> Menyempurnakan sistem & transparansi.</li>
                            <li class="mb-2"><i class='bx bx-check-double text-success me-2'></i> Meningkatkan eksistensi Himamo.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Makna Logo (Sesuai Layout Asli) --}}
    <div class="container py-5 bg-white rounded-5 shadow-sm my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-5">Makna Identitas</h2>
            </div>
        </div>
        <div class="row mt-4 d-flex align-items-center">
            <div class="col-md-5 text-center mb-4 mb-md-0">
                <img src="{{ asset('assets-guest/img/kabinet/logo-kabinet-melaju-bersama.png') }}" alt="Logo" class="img-fluid" style="max-width: 280px; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));">
            </div>
            <div class="col-md-7">
                <div class="ps-md-4">
                    <ul class="list-unstyled fs-5">
                        <li class="mb-4">
                            <span class="badge bg-warning text-dark mb-2">5 Petir</span><br>
                            <span class="text-secondary">Simbol 5 bidang yang melaju bersama mendukung semangat Mammoth.</span>
                        </li>
                        <li class="mb-4">
                            <span class="badge bg-warning text-dark mb-2">Sudut 95°</span><br>
                            <span class="text-secondary">Representasi tahun berdirinya HIMAMO (1995).</span>
                        </li>
                        <li>
                            <span class="badge bg-warning text-dark mb-2">Arah Panah</span><br>
                            <span class="text-secondary">Simbol peningkatan dan kemajuan bagi organisasi.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Organigram (Sesuai Layout Asli) --}}
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-5">Struktur Organigram</h2>
                <div class="mb-5 p-3 bg-white rounded-4 shadow-sm">
                    <img src="{{ asset('assets-guest/img/kabinet/struktur-organigram-melaju-bersama.png') }}" alt="Organigram" class="img-fluid rounded shadow-sm">
                </div>
                <div class="row text-center g-4">
                    <div class="col-md-4">
                        <div class="card premium-card p-3">
                            <div class="card-body">
                                <i class='bx bx-user-check fs-1 text-teal'></i>
                                <h4 class="mt-2">Fungsional</h4>
                                <p class="fs-4 fw-bold text-success">25 Orang</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card premium-card p-3">
                            <div class="card-body">
                                <i class='bx bx-user-pin fs-1 text-teal'></i>
                                <h4 class="mt-2">Staff Ahli</h4>
                                <p class="fs-4 fw-bold text-success">214 Orang</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card premium-card p-3">
                            <div class="card-body">
                                <i class='bx bx-user-plus fs-1 text-teal'></i>
                                <h4 class="mt-2">Staff Muda</h4>
                                <p class="fs-4 fw-bold text-success">289 Orang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Penjelasan Bidang (Sesuai Layout Asli) --}}
    <div class="container py-5 mb-5">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Penjelasan Bidang</h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card premium-card p-4 overflow-hidden position-relative">
                    <span class="bidang-badge">01</span>
                    <h4>Bidang 1: KPSDM</h4>
                    <p class="text-secondary mt-3">Membina, membentuk, dan mengembangkan sumber daya mahasiswa di himpunan melalui kaderisasi.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card premium-card p-4 overflow-hidden position-relative">
                    <span class="bidang-badge">02</span>
                    <h4>Bidang 2: Internal</h4>
                    <p class="text-secondary mt-3">Mengelola kegiatan internal, menjaga keharmonisan, serta menaungi Sarana Prasarana.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card premium-card p-4 overflow-hidden position-relative">
                    <span class="bidang-badge">03</span>
                    <h4>Bidang 3: Eksternal</h4>
                    <p class="text-secondary mt-3">Mengoptimalkan hubungan dengan pihak eksternal dan kontribusi pengabdian masyarakat.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-lg-2">
                <div class="card premium-card p-4 overflow-hidden position-relative">
                    <span class="bidang-badge">04</span>
                    <h4>Bidang 4: Medinfo</h4>
                    <p class="text-secondary mt-3">Mengelola arus informasi kreatif dan mendorong inovasi ekonomi kreatif.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card premium-card p-4 overflow-hidden position-relative">
                    <span class="bidang-badge">05</span>
                    <h4>Bidang 5: PPK</h4>
                    <p class="text-secondary mt-3">Perencanaan, pengelolaan, dan evaluasi program kerja melalui kajian strategis.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection