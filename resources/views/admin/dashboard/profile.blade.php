@extends('admin.layouts.master')
@section('title', 'Profile')
@section('card', 'Profile')
@section('keterangan', 'Pengaturan Profil')
@section('content')


    <!-- Content -->
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Akun</a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Detail Profil</h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ asset('assets/img/avatars/img-avatar-pria.svg') }}" alt="user-avatar"
                            class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="memberNumber" class="form-label">Nomor Anggota</label>
                            <input type="text" id="memberNumber" class="form-control"
                                value="{{ auth()->user()->username }}" readonly />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" id="name" class="form-control" value="{{ auth()->user()->name }}"
                                readonly />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" name="email"
                                value="{{ auth()->user()->email }}" readonly />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="peran" class="form-label">Peran</label>
                            <input type="text" id="peran" class="form-control" value="{{ auth()->user()->role }}"
                                readonly />
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2" data-bs-toggle="modal"
                            data-bs-target="#profileModal">Ubah Profil</button>
                        <button type="submit" class="btn btn-warning me-2" data-bs-toggle="modal"
                            data-bs-target="#passwordModal">Ubah Kata Sandi</button>
                    </div>
                </div>
                <!-- /Account -->

                {{-- Edit Modal Start --}}
                <div class="modal fade" id="profileModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel3">Ubah Profil</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('user-profile-information.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="memberNumber" class="form-label">Nomor Anggota</label>
                                            <input type="text" id="memberNumber"
                                                class="form-control @error('username') is-invalid @enderror"
                                                name="username"" name="username" value="{{ auth()->user()->username }}"
                                                placeholder="MO xxxxxxx" />
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Masukan Nama" name="name"
                                                value="{{ auth()->user()->name }}" />
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="emailLarge" class="form-label">Email</label>
                                            <input type="email" id="emailLarge"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ auth()->user()->email }}" placeholder="xxxx@xxxxx.xxx" />
                                            @error('email')
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
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Edit Modal End --}}

                {{-- Edit Modal Password Start --}}
                <div class="modal fade" id="passwordModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel3">Ubah Kata Sandi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('user-password.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb">
                                            <label for="html5-password-input" class="col-md-2 col-form-label">Kata Sandi
                                                Sekarang</label>
                                            <input class="form-control @error('current_password') is-invalid @enderror"
                                                type="password" placeholder="******" id="html5-password-input"
                                                name="current_password" />
                                            @error('current_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="html5-password-input" class="col-md-2 col-form-label">Kata
                                                Sandi</label>
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                type="password" placeholder="******" id="html5-password-input"
                                                name="password" />
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="html5-password-input" class="col-md col-form-label">Konfirmasi
                                                Kata Sandi</label>
                                            <input
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                type="password" placeholder="******" id="html5-password-input"
                                                name="password_confirmation" />
                                            @error('password')
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
                                    <button type="submit" class="btn btn-primary">Perbarui Kata Sandi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Edit Modal Password End --}}

            </div>
            <div class="card">
                <h5 class="card-header">Hapus Akun</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Apakah Anda yakin ingin menghapus akun Anda?</h6>
                            <p class="mb-0">Setelah Anda menghapus akun, tidak ada cara untuk mengembalikannya. Harap
                                pastikan dengan yakin.</p>
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="accountActivation"
                            id="accountActivation" />
                        <label class="form-check-label" for="accountActivation">Saya mengonfirmasi penonaktifan akun
                            saya.</label>
                    </div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalHapus"
                        class="btn btn-danger deactivate-account">Nonaktifkan Akun</button>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalScrollableTitle">Hapus Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Apakah Anda yakin ingin menghapus akun ini? Setelah akun dihapus, semua data yang terkait dengan akun Anda akan hilang secara permanen dan tidak dapat dipulihkan.
                            </p>
                            <p>
                                Tindakan ini tidak dapat dibatalkan. Mohon pastikan keputusan Anda sebelum melanjutkan.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <form id="formAccountDeactivation" action="{{ route('profile.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Tutup
                                </button>
                                <button type="submit" class="btn btn-danger">Hapus Akun</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
    <!-- / Content -->
@endsection
