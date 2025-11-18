@extends('guest.layouts.app')

@section('content')

{{-- Page-specific Fonts and Styles --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
<style>
    .kabinet-melaju-bersama-page {
        font-family: 'Open Sans', sans-serif;
    }
    .kabinet-melaju-bersama-page h1,
    .kabinet-melaju-bersama-page h2,
    .kabinet-melaju-bersama-page h3,
    .kabinet-melaju-bersama-page h4,
    .kabinet-melaju-bersama-page h5,
    .kabinet-melaju-bersama-page h6,
    .kabinet-melaju-bersama-page .card-title {
        font-family: 'Poppins', sans-serif;
    }
    .kabinet-melaju-bersama-page .lead,
    .kabinet-melaju-bersama-page .card-text,
    .kabinet-melaju-bersama-page .list-unstyled {
        font-family: 'Open Sans', sans-serif;
    }

    /* Card Hover Effect */
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    }

    /* Bidang Card Color Accents */
    .bidang-card .card-title {
        border-left: 4px solid;
        padding-left: 10px;
    }
    .bidang-1 .card-title { border-color: #00796b; } /* Teal */
    .bidang-2 .card-title { border-color: #43a047; } /* Green */
    .bidang-3 .card-title { border-color: #00897b; } /* Dark Cyan */
    .bidang-4 .card-title { border-color: #66bb6a; } /* Light Green */
    .bidang-5 .card-title { border-color: #2e7d32; } /* Darker Green */

    /* Hero Scroll Indicator */
    .hero-section {
        position: relative;
    }
    .scroll-down-indicator {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 3rem;
        color: white;
        animation: bounce 2s infinite;
    }
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateX(-50%) translateY(0);
        }
        40% {
            transform: translateX(-50%) translateY(-20px);
        }
        60% {
            transform: translateX(-50%) translateY(-10px);
        }
    }
</style>

<div class="kabinet-melaju-bersama-page">
    <div class="container-fluid hero-section">
        <div class="row">
            <div class="col-12 text-center py-5" style="background-image: linear-gradient(to right, #004d40, #00796b);">
                <h1 class="text-white display-4">Kabinet Melaju Bersama 2025/2026</h1>
            </div>
        </div>
        <div class="scroll-down-indicator">
            <i class='bx bx-chevron-down'></i>
        </div>
    </div>

    <div class="container py-5 gs_reveal">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h2>Penjelasan Umum Kabinet</h2>
                <p class="lead">"Melaju Bersama" bukan sekadar nama, tetapi representasi visi besar sebuah perjalanan kolektif dalam himpunan ini. Filosofi ini lahir dari keyakinan bahwa perubahan yang berarti tidak dibangun oleh satu langkah individu, tetapi oleh banyak langkah kecil yang bergerak seirama dalam satu tujuan besar dengan satu faham dan satu pemikiran. Kabinet ini hadir untuk merangkul keberagaman, menyatukan potensi, dan mengajak seluruh anggota himpunan untuk tidak hanya menjadi penonton perubahan, tetapi menjadi bagian dari mereka yang menciptakan sejarah dan membawanya melaju menuju masa depan yang lebih baik.</p>
            </div>
        </div>
    </div>

    <div class="container py-5 gs_reveal" style="background-color: #f0f8f0;">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100 card-hover">
                    <div class="card-body text-center">
                        <i class='bx bx-bullseye' style='font-size: 3rem; color: #00796b;'></i>
                        <h3 class="card-title mt-2">Visi</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 card-hover">
                    <div class="card-body text-center">
                        <i class='bx bx-list-check' style='font-size: 3rem; color: #00796b;'></i>
                        <h3 class="card-title mt-2">Misi</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex. Proin vitae magna sit amet enim tincidunt finibus.</p>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 gs_reveal">
        <div class="row">
            <div class="col-12 text-center">
                <h3>Makna Logo/Slogan</h3>
            </div>
        </div>
        <div class="row mt-4 d-flex align-items-center">
            <div class="col-md-5">
                <img src="{{ asset('assets-guest/img/kabinet/logo-kabinet-melaju-bersama.png') }}" alt="Makna Logo" class="img-fluid mx-auto d-block" style="max-width: 300px;">
            </div>
            <div class="col-md-7">
                <ul class="list-unstyled">
                    <li><strong>5 Petir:</strong><br>Merepresentasikan 5 bidang pada Himamo. Ditempatkan di belakang kepala mammoth sebagai simbol bahwa lima bidang ini, atau kabinet ini, akan melaju Bersama.</li>
                    <li class="mt-3"><strong>Sudut 95°:</strong><br>Sudut 95° berasal dari tahun berdirinya HIMAMO, yaitu 1995.</li>
                    <li class="mt-3"><strong>Arah:</strong><br>Arah ke atas kanan merepresentasikan bahwa kabinet ini akan membawa peningkatan dan kemajuan bagi Himamo.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container py-5" style="background-color: #f0f8f0;">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center mb-4">Struktur Organigram</h3>
                <div class="text-center mb-4 gs_reveal">
                    <img src="{{ asset('assets-guest/img/kabinet/struktur-organigram-melaju-bersama.png') }}" alt="Struktur Organigram" class="img-fluid" style="max-width: 800px; margin: auto;">
                </div>
                <div class="row text-center gs_reveal">
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 card-hover">
                            <div class="card-body">
                                <h4 class="card-title">Fungsional</h4>
                                <p class="lead mb-0">25 orang</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 card-hover">
                            <div class="card-body">
                                <h4 class="card-title">Staff Ahli</h4>
                                <p class="lead mb-0">214 orang</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 card-hover">
                            <div class="card-body">
                                <h4 class="card-title">Staff Muda</h4>
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
                <h3 class="text-center mb-4">Penjelasan Bidang</h3>
                <div class="row bidang-cards-container">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm h-100 card-hover bidang-card bidang-1">
                            <div class="card-body">
                                <h4 class="card-title">Bidang 1: KPSDM</h4>
                                <p class="card-text">Bertanggung jawab dalam membina, membentuk, dan mengembangkan sumber daya mahasiswa di himpunan, melalui kaderisasi dan program peningkatan kompetensi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm h-100 card-hover bidang-card bidang-2">
                            <div class="card-body">
                                <h4 class="card-title">Bidang 2: Tata Kelola Internal</h4>
                                <p class="card-text">Mengatur dan mengelola kegiatan internal himpunan, menjaga keharmonisan hubungan antar anggota, serta menaungi divisi Hubungan Dalam dan Sarana Prasarana.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm h-100 card-hover bidang-card bidang-3">
                            <div class="card-body">
                                <h4 class="card-title">Bidang 3: Tata Kelola Eksternal</h4>
                                <p class="card-text">Mengoptimalkan hubungan dengan pihak eksternal dan meningkatkan kontribusi sosial melalui Divisi Relasi Organisasi dan Pengabdian Masyarakat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm h-100 card-hover bidang-card bidang-4">
                            <div class="card-body">
                                <h4 class="card-title">Bidang 4: Media Informasi Kreatif</h4>
                                <p class="card-text">Mengelola arus informasi organisasi dan mendorong inovasi ekonomi kreatif melalui Divisi Media & Informasi dan Ekonomi Kreatif.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm h-100 card-hover bidang-card bidang-5">
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

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    // GSAP is already registered in the main layout, so we can just use it.
    
    // Stagger animation for the Bidang cards
    gsap.from(".bidang-card", {
        scrollTrigger: {
            trigger: ".bidang-cards-container",
            start: "top 80%", // when the top of the trigger hits 80% of the viewport height
            toggleActions: "play none none none"
        },
        duration: 0.5,
        y: 50,
        opacity: 0,
        stagger: 0.2,
        ease: "power1.out"
    });
});
</script>
@endpush
