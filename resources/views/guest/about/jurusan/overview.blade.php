@extends('guest.layouts.app')
@section('title', 'Tentang Jurusan')
@section('meta_description', 'Visi dan Misi Jurusan Teknik Otomasi Manufaktur dan Mekatronika Politeknik Manufaktur Negeri Bandung.')

@section('content')
<div class="kabinet-melaju-bersama-page"> {{-- Reusing the class for consistent styling --}}
    <div class="hero-section">
        <div class="overlay"></div>
        <div class="container py-5 text-center">
            <h1 class="display-4 fw-bold">Jurusan Teknik Otomasi Manufaktur dan Mekatronika</h1>
            <p class="lead">Visi dan Misi Jurusan</p>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h2 class="section-title">Bendera Jurusan</h2>
                <p class="lead mt-3">
                    <!-- Placeholder for Department Flag Image -->
                    <img src="{{ asset('assets-guest/img/placeholder-flag.png') }}" alt="Bendera Jurusan" class="img-fluid" style="max-width: 300px;">
                </p>
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
                        <h3 class="card-title mt-2">Visi Jurusan</h3>
                        <p class="card-text">
                            <!-- Placeholder for Department Vision -->
                            [Visi Jurusan akan ditempatkan di sini]
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-lg border-0 card-hover">
                    <div class="card-body text-center p-5">
                        <div class="mb-4">
                            <i class='bx bx-list-check' style='font-size: 4rem; color: #00796b;'></i>
                        </div>
                        <h3 class="card-title mt-2">Misi Jurusan</h3>
                        <ol class="card-text text-start">
                            <!-- Placeholder for Department Mission -->
                            <li>[Misi 1 Jurusan akan ditempatkan di sini]</li>
                            <li>[Misi 2 Jurusan akan ditempatkan di sini]</li>
                            <li>[Misi 3 Jurusan akan ditempatkan di sini]</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
