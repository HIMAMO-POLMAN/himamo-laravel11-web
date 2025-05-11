@extends('admin.layouts.master')
@section('title', 'Kategori - AE Informasi')
@section('card', 'AE Informasi / Kategori')
@section('keterangan', 'Lihat Kategori')
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                    Buat Kategori
                </button>
            </div>
            <div class="col-12 col-md mb-2">
                <form action="{{ route('information-categories.index') }}" method="GET" class="d-flex">

                    <input type="text" class="form-control bg-light border-1 small me-2" placeholder="Cari..."
                        name="search" value="{{ request('search') }}">

                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search fa-sm"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('information-categories.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="name" class="form-label">Nama Kategori <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="name"
                                        class="form-control  @error('name') is-invalid @enderror" name="name"
                                        placeholder="Masukan Nama Kategori" />
                                    @error('name')
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
        @if (request('search'))
            <p class="lead mb-0">Ditemukan {{ $information_category->total() }} pencarian untuk kata kunci:
                "{{ request('search') }}"</p>
        @endif
        @if ($information_category->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th>Dibuat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($information_category as $index => $kategori)
                            <tr>
                                <td>{{ $index + $information_category->firstItem() }}</td>
                                <td>{{ $kategori->name }}</td>
                                <td>{{ $kategori->slug }}</td>
                                <td>{{ $kategori->created_at ? \Carbon\Carbon::parse($kategori->created_at)->locale('id')->translatedFormat('d F Y') : '-' }}
                                </td>

                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('information-categories.edit', $kategori->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Ubah</a>
                                            <form action="{{ route('information-categories.destroy', $kategori->id) }}"
                                                method="POST">
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
                {{ $information_category->links('pagination::bootstrap-4') }}
            </div>
        @else
            <div class="alert alert-light text-center" role="alert">
                Tidak ada data!
            </div>
        @endif
    </div>
    </div>
@endsection
