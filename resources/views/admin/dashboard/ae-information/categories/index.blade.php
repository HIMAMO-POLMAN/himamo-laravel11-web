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

    <div class="d-flex card shadow p-3">
        <div class="table-responsive col-lg-12">
            <div class="d-flex justify-content-between mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                    Buat Kategori
                </button>

                <form action="{{ route('information-categories.index') }}" method="GET"
                    class="form-inline navbar-search justify-content-end">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-1 small" placeholder="Cari..."
                            name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Create Modal Start --}}
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
                                        <label for="name" class="form-label">Nama Kategori</label>
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Create Modal End --}}
            @if ($information_category->count() > 0)
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = $information_category->firstItem();
                        @endphp
                        @foreach ($information_category as $kategori)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $kategori->name }}</td>
                                <td>{{ $kategori->slug }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('information-categories.edit', $kategori->id)}}"><i class="bx bx-edit-alt me-1"></i>
                                                Ubah</a>
                                                <form action="{{ route('information-categories.destroy', $kategori->id) }}" method="POST">
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
                <div class="d-flex justify-content-center py-3">
                    {{ $information_category->links('pagination::bootstrap-4') }}
                </div>

               @else
            <div class="alert alert-light" role="alert">
                Tidak ada data!
            </div>
        @endif

        </div>
    </div>
@endsection
