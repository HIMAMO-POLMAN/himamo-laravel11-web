@extends('admin.layouts.master')
@section('title', 'Koleksi Pustaka')
@section('card', 'Koleksi Pustaka')
@section('keterangan', 'Lihat Koleksi Pustaka')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="d-flex card shadow p-3">
        <div class="row mb-3">
            <div class="col-12 col-md-auto mb-2">
                <a href="{{ route('library-collection.create') }}" class="btn btn-primary w-100">
                    Buat Koleksi
                </a>
            </div>
            <div class="col-12 col-md mb-2">
                <form method="GET" class="d-flex">
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

            <div class="col-12 col-md-auto mb-2">
                <div class="btn-group w-100">
                    <button type="button" class="btn btn-primary dropdown-toggle w-100" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Urutkan
                    </button>
                    <ul class="dropdown-menu w-100">
                        <li>
                            <h6 class="dropdown-header text-uppercase">Pilih Urutan</h6>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('library-collection.index', ['sort' => 'terbaru', 'search' => request('search'), 'koleksi' => request('koleksi')]) }}">
                                Terbaru
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('library-collection.index', ['sort' => 'terlama', 'search' => request('search'), 'koleksi' => request('koleksi')]) }}">
                                Terlama
                            </a>
                        </li>
                        {{-- <li>
                                <a class="dropdown-item" href="{{ route('library-collection.index', ['sort' => 'views_count', 'search' => request('search'), 'kategori' => request('kategori')]) }}">
                                    Terpopuler
                                </a>
                            </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        @if (request('search'))
            <p class="lead mb-0">Ditemukan {{ $collections->total() }} pencarian untuk kata kunci:
                "{{ request('search') }}"</p>
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
                    <tbody class="table-border-bottom-0">
                        @foreach ($collections as $index => $koleksi)
                            <tr>
                                <td>{{ $index + $collections->firstItem() }}</td>
                                <td>{{ $koleksi->name }}</td>
                                <td>{{ $koleksi->created_at ? $koleksi->created_at->format('d M Y') : '-' }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('library-collection.edit', $koleksi->slug) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('library-collection.destroy', $koleksi->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-trash me-1"></i>
                                                    Delete</button>
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
