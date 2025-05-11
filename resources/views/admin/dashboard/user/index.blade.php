@extends('admin.layouts.master')
@section('title', 'Pengguna')
@section('card', 'Pengguna')
@section('keterangan', 'Lihat Pengguna')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex card shadow p-3">
        <div class="row mb-3">
            <div class="col-12 col-md-auto mb-2">
                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#largeModal">
                    Buat Pengguna
                </button>
            </div>
            <div class="col-12 col-md mb-2">
                <form action="{{ route('user.index') }}" method="GET" class="d-flex">

                    <input type="text" class="form-control bg-light border-1 small me-2" placeholder="Cari..."
                        name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search fa-sm"></i>
                    </button>
                </form>
            </div>
            <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel3">Tambah Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="username" class="form-label">Nomor Anggota <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="username"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            required value="{{ old('username') }}" placeholder="MO xxxxxxx" />
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="name" class="form-label">Nama <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name" required
                                            value="{{ old('name') }}" placeholder="Masukan Nama" />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-3">
                                        <label for="emailLarge" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" id="emailLarge"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            required value="{{ old('email') }}" placeholder="xxxx@xxxxx.xxx" />
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col mb-3">
                                        <label for="role" class="form-label">Peran <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select @error('role') is-invalid @enderror" name="role"
                                            required id="role" aria-label="Default select example">
                                            <option selected>Pilih Peran</option>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>
                                                Staff</option>
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="password" class="col-md-2 col-form-label">Kata Sandi <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            name="password" required type="password" placeholder="******"
                                            id="password" />
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="password_confirmation" class="col-md col-form-label">Konfirmasi Kata
                                            Sandi <span class="text-danger">*</span></label>
                                        <input
                                            class="form-control @error('password_confirmation') is-invalid @enderror "name="password_confirmation"
                                            required type="password" placeholder="******" id="password_confirmation" />
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Tutup
                                </button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($users->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. Anggota</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Verifikasi</th>
                            <th>Peran</th>
                            <th>Dibuat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + $users->firstItem() }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->email_verified_at)
                                        <span class="badge bg-label-success me-1">Terverifikasi</span>
                                    @else
                                        <span class="badge bg-label-danger me-1">Belum Verifikasi</span>
                                    @endif
                                </td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at ? $user->created_at->locale('id')->translatedFormat('d F Y') : '-' }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('user.edit', $user->id) }}"><i
                                                    class="bx bx-edit-alt
                                                me-1"></i>
                                                Ubah</a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"><i
                                                        class="bx bx-trash me-1 text-danger"></i> Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center py-3">
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        @else
            <div class="alert alert-light text-center" role="alert">
                Tidak ada data!
            </div>
        @endif
    </div>
@endsection
