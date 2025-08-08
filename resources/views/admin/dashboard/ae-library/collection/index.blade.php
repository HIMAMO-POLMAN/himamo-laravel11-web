@extends('admin.layouts.master')
@section('title', 'Koleksi Pustaka')
@section('card', 'Koleksi Pustaka')
@section('keterangan', 'Lihat Koleksi Pustaka')
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

    <div class="card shadow p-3 d-flex flex-column">
        <div class="row mb-3">
            <div class="col-12 col-md-auto mb-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateCollection">
                    Buat Koleksi
                </button>
            </div>
            <div class="col-12 col-md mb-2">
                <form method="GET" class="d-flex">
                    <input type="text" class="form-control bg-light border-1 small me-2" placeholder="Cari..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search fa-sm"></i>
                    </button>
                </form>
            </div>
            <div class="col-12 col-md-auto mb-2">
                <div class="btn-group w-100">
                    <button type="button" class="btn btn-primary dropdown-toggle w-100" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Urutkan
                    </button>
                    <ul class="dropdown-menu w-100">
                        <li><h6 class="dropdown-header text-uppercase">Pilih Urutan</h6></li>
                        <li><a class="dropdown-item" href="{{ route('library-collection.index', ['sort' => 'terbaru', 'search' => request('search')]) }}">Terbaru</a></li>
                        <li><a class="dropdown-item" href="{{ route('library-collection.index', ['sort' => 'terlama', 'search' => request('search')]) }}">Terlama</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Modal Buat Koleksi --}}
        <div class="modal fade" id="modalCreateCollection" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route('library-collection.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Koleksi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="name" class="form-label">Nama Koleksi <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Koleksi" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if (request('search'))
            <p class="lead mb-0">Ditemukan {{ $collections->total() }} pencarian untuk kata kunci: "{{ request('search') }}"</p>
        @endif

        @if ($collections->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Dibuat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collections as $index => $koleksi)
                            <tr>
                                <td>{{ $index + $collections->firstItem() }}</td>
                                <td>{{ $koleksi->name }}</td>
                                <td>{{ $koleksi->created_at ? $koleksi->created_at->format('d M Y') : '-' }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('library-collection.edit', $koleksi->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('library-collection.destroy', $koleksi->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i class="bx bx-trash me-1 text-danger"></i> Hapus
                                                </button>
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
                {{ $collections->links('pagination::bootstrap-4') }}
            </div>
        @else
            <div class="alert alert-light text-center" role="alert">
                Tidak ada data!
            </div>
        @endif
    </div>

@endsection
