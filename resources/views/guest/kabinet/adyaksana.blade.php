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
    }

    .kabinet-adyaksana-page {
        font-family: 'Outfit', sans-serif;
        background-color: #f8faf9;
        color: #334155;
        min-height: 80vh;
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

    /* DARK MODE */
    [data-theme="dark"] .kabinet-adyaksana-page {
        background-color: #191d24 !important;
        color: #e2e8f0;
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

    {{-- Placeholder Content --}}
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center py-5">
                <i class='bx bx-time-five' style="font-size: 5rem; color: var(--himamo-green); opacity: 0.3;"></i>
                <h2 class="fw-bold mt-4">Segera Hadir</h2>
                <p class="fs-5 opacity-75">Konten untuk Kabinet Adyaksana (2026-2027) sedang dalam tahap penyusunan. Pantau terus informasi terbaru dari kami!</p>
            </div>
        </div>
    </div>
</div>

@endsection
