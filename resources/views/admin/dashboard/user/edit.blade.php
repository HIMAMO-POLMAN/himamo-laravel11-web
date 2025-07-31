@extends('admin.layouts.master')
@section('title', 'Ubah Pengguna')
@section('card', 'Pengguna')
@section('keterangan', 'Ubah Pengguna')
@section('content')

@include('admin.partials.alert')

    <div class="d-flex card shadow p-3">
        <h5 class="card-header">Ubah Pengguna</h5>
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="memberNumber" class="form-label">Nomor Anggota</label>
                        <input type="text" id="memberNumber" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username', $user->username) }}" placeholder="MO xxxxxxx" />
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Masukan Nama" name="name" value="{{ old('name', $user->name) }}" />
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="emailLarge" class="form-label">Email</label>
                        <input type="email" id="emailLarge" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email', $user->email) }}" placeholder="xxxx@xxxxx.xxx" />
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="role" class="form-label">Peran</label>
             <select class="form-select @error('role') is-invalid @enderror" name="role"
                                            required id="role" aria-label="Default select example">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role }}"
                                                    {{ old('role', $user->getRoleNames()->first()) == $role ? 'selected' : '' }}>
                                                    {{ ucfirst($role) }}</option>
                                            @endforeach

                                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="password" class="col-md col-form-label">Kata Sandi (Kosongkan jika tidak ingin
                            mengubah)</label>
                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"
                            placeholder="******" id="password" />
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="password_confirmation" class="col-md col-form-label">Konfirmasi Kata
                            Sandi</label>
                        <input
                            class="form-control @error('password_confirmation') is-invalid @enderror "name="password_confirmation"
                            type="password" placeholder="******" id="password_confirmation" />
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
@endsection
