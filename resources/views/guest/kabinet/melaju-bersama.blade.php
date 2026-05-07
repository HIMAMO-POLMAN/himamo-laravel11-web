@extends('guest.layouts.app')

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --himamo-primary: #00796b;
        --himamo-dark: #004d40;
        --himamo-accent: #ffc107;
        --himamo-text: #333;
    }

    .kabinet-container {
        font-family: 'Inter', sans-serif;
        background-color: #fcfcfc;
        color: var(--himamo-text);
        line-height: 1.6;
    }

    h1, h2, h3, h4, .font-poppins {
        font-family: 'Poppins', sans-serif;
    }

    /* Hero Section */
    .hero-banner {
        background: linear-gradient(rgba(0, 77, 64, 0.9), rgba(0, 77, 64, 0.9)), url("{{ asset('assets-guest/img/img-carousel-1.webp') }}");
        background-size: cover;
        background-position: center;
        padding: 100px 0;
        text-align: center;
        color: white;
    }

    .hero-banner h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    /* Visi Misi Layout (Following Reference 7) */
    .visi-misi-section {
        background: #fff;
        padding: 80px 0;
    }

    .visi-box {
        background: #6a1b9a; /* Warna ungu sesuai referensi, bisa diganti ke hijau himamo jika mau */
        color: white;
        padding: 40px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .misi-list {
        padding: 40px;
    }

    /* Makna Logo Layout (Following Reference 2 & 8) */
    .logo-meaning-section {
        background: #f9f9f9;
        padding: 80px 0;
    }

    .logo-container {
        background: white;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .logo-img {
        max-width: 100%;
        height: auto;
    }

    .meaning-content h4 {
        color: #000;
        font-weight: 700;
        margin-bottom: 20px;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
    }

    /* Organigram Layout (Following Reference 9) */
    .organigram-section {
        padding: 80px 0;
        background: white;
    }

    .bidang-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-top: 50px;
    }

    .bidang-item h5 {
        font-weight: 700;
        color: #000;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }

    .bidang-item p {
        font-size: 0.95rem;
        color: #555;
    }

    .highlight-text {
        color: var(--himamo-primary);
        font-weight: 600;
    }

    @media (max-width: 992px) {
        .bidang-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .bidang-grid {
            grid-template-columns: 1fr;
        }
        .hero-banner h1 { font-size: 2.5rem; }
    }
</style>

<div class="kabinet-container">
    {{-- Header / Hero --}}
    <section class="hero-banner">
        <div class="container">
            <p class="mb-2 fw-bold text-uppercase tracking-widest" style="letter-spacing: 3px; color: var(--himamo-accent);">Kepengurusan 2025-2026</p>
            <h1>Kabinet Melaju Bersama</h1>
            <p class="lead opacity-75">"Satukan Langkah, Ciptakan Sejarah"</p>
        </div>
    </section>

    {{-- Visi & Misi (Reference 7 Style) --}}
    <section class="visi-misi-section">
        <div class="container">
            <h2 class="mb-5 fw-bold">* Visi & Misi</h2>
            <div class="row g-0 border shadow-sm">
                <div class="col-lg-4">
                    <div class="visi-box" style="background: var(--himamo-dark);">
                        <h4 class="mb-3 fw-bold">Visi</h4>
                        <p class="mb-0 fs-5">Menjadikan Himamo sebagai wadah yang progresif, inklusif, dan kompeten dalam pengembangan individu serta membangun sistem kerja yang berkelanjutan.</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="misi-list">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <p><i class='bx bx-check text-success'></i> Menjadikan Himamo lahan berkembang bagi setiap individu.</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <p><i class='bx bx-check text-success'></i> Membangun rasa bangga melalui lingkungan yang sehat.</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <p><i class='bx bx-check text-success'></i> Menyempurnakan sistem, birokrasi, dan transparansi.</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <p><i class='bx bx-check text-success'></i> Meningkatkan eksistensi di internal dan eksternal Polman.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Makna Logo (Reference 2 Style) --}}
    <section class="logo-meaning-section">
        <div class="container">
            <h2 class="mb-5 fw-bold">* Makna Logo</h2>
            <div class="logo-container">
                <div class="row align-items-center">
                    <div class="col-lg-5 text-center mb-5 mb-lg-0">
                        <img src="{{ asset('assets-guest/img/kabinet/logo-kabinet-melaju-bersama.png') }}" alt="Logo Kabinet" class="logo-img">
                    </div>
                    <div class="col-lg-7 px-lg-5">
                        <div class="meaning-content">
                            <h4 class="text-uppercase">Bentuk</h4>
                            <ul class="list-unstyled mb-5">
                                <li class="mb-3"><strong>5 Petir:</strong> Merepresentasikan 5 bidang pada Himamo yang melaju bersama.</li>
                                <li class="mb-3"><strong>Sudut 95°:</strong> Berasal dari tahun berdirinya HIMAMO, yaitu 1995.</li>
                                <li><strong>Arah:</strong> Ke atas kanan merepresentasikan peningkatan dan kemajuan.</li>
                            </ul>

                            <h4 class="text-uppercase">Warna</h4>
                            <ul class="list-unstyled">
                                <li class="mb-3"><span class="highlight-text">Hijau Teal:</span> Melambangkan pertumbuhan, harmoni, dan profesionalitas.</li>
                                <li><span class="highlight-text">Kuning Emas:</span> Melambangkan kejayaan, optimisme, dan semangat yang menyala.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Struktur Organigram (Reference 9 Style) --}}
    <section class="organigram-section">
        <div class="container">
            <h2 class="mb-5 fw-bold">* Struktur Organisasi</h2>
            <div class="text-center mb-5">
                <p class="fw-bold mb-3" style="color: #666;">Organogram</p>
                <img src="{{ asset('assets-guest/img/kabinet/struktur-organigram-melaju-bersama.png') }}" alt="Organigram" class="img-fluid border p-2 shadow-sm rounded">
            </div>

            <div class="bidang-grid">
                <div class="bidang-item">
                    <h5>Bidang 1: KPSDM</h5>
                    <p><span class="highlight-text">#MelajuBerdaya</span> Membina, membentuk, dan mengembangkan sumber daya mahasiswa di himpunan melalui kaderisasi dan program peningkatan kompetensi.</p>
                </div>
                <div class="bidang-item">
                    <h5>Bidang 2: Tata Kelola Internal</h5>
                    <p><span class="highlight-text">#HarmoniInternal</span> Mengatur dan mengelola kegiatan internal himpunan serta menjaga keharmonisan hubungan antar anggota.</p>
                </div>
                <div class="bidang-item">
                    <h5>Bidang 3: Tata Kelola Eksternal</h5>
                    <p><span class="highlight-text">#RelasiKoneksi</span> Mengoptimalkan hubungan dengan pihak eksternal dan meningkatkan kontribusi sosial pengabdian masyarakat.</p>
                </div>
                <div class="bidang-item">
                    <h5>Bidang 4: Medinfo Kreatif</h5>
                    <p><span class="highlight-text">#ArusInovasi</span> Mengelola arus informasi organisasi dan mendorong inovasi ekonomi kreatif di lingkungan himpunan.</p>
                </div>
                <div class="bidang-item">
                    <h5>Bidang 5: PPK</h5>
                    <p><span class="highlight-text">#EvaluasiStrategis</span> Bertanggung jawab atas perencanaan, pengelolaan, dan evaluasi seluruh program kerja HIMAMO.</p>
                </div>
                <div class="bidang-item">
                    <h5>Kesekretariatan & Keuangan</h5>
                    <p><span class="highlight-text">#TertibAdministrasi</span> Mengelola sistem administrasi persuratan dan manajemen keuangan yang transparan dan akuntabel.</p>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection