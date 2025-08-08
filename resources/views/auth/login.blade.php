@extends('auth.layout.master')
@section('title', 'Masuk')
@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="{{ route('home')}}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img height="50" src="{{ asset('assets/img/icons/img-himamo.webp') }}" alt="Logo">
                                </span>
                            </a>
                        </div>
                        <h4 class="mb-2"><strong>Selamat datang Staff! 👋</strong></h4>
                        <p class="mb-4">Silahkan masuk ke akun Anda dan selamat bertugas</p>
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="Masukan email" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Kata Sandi</label>
                                    <a href="{{ route('password.request')}}">
                                        <small>Lupa Kata Sandi?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        value="{{ old('password') }}"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
