@extends('auth.layout.master')
@section('title', 'Daftar')
@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="{{ route('home') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img height="50" src="{{ asset('assets/img/icons/img-himamo.webp') }}" alt="Logo">
                                </span>
                            </a>
                        </div>
                        <h4 class="mb-2"><strong>Buat akun HIMAMO</strong></h4>
                        <p class="mb-4">Akun baru mendapat akses anggota. Hubungi admin untuk akses khusus.</p>

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form class="mb-3" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Kata sandi</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi kata sandi</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required>
                            </div>
                            <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
                        </form>

                        <p class="text-center mb-0">
                            Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
