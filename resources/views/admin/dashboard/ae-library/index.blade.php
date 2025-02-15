@extends('admin.layouts.master')
@section('title', 'AE Pustaka')
@section('card', 'AE Pustaka')
@section('keterangan', 'Lihat Pustaka')
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
                <a href="{{ route('ae-library.create') }}" class="btn btn-primary w-100"">
                    Buat Pustaka
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
                        Filter Koleksi
                    </button>
                    <ul class="dropdown-menu w-100">
                        <li>
                            <h6 class="dropdown-header text-uppercase">Pilih Koleksi</h6>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('ae-library.index', ['search' => request('search'), 'sort' => request('sort')]) }}">
                                Semua
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('ae-library.index', ['koleksi' => 'TRO', 'search' => request('search')]) }}">
                                TRO
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('ae-library.index', ['koleksi' => 'TRMO', 'search' => request('search')]) }}">
                                TRMO
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('ae-library.index', ['koleksi' => 'TRIN', 'search' => request('search')]) }}">
                                TRIN
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('ae-library.index', ['koleksi' => 'Teori', 'search' => request('search')]) }}">
                                Teori
                            </a>
                        </li>
                    </ul>
                </div>
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
                                href="{{ route('ae-library.index', ['sort' => 'terbaru', 'search' => request('search'), 'koleksi' => request('koleksi')]) }}">
                                Terbaru
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('ae-library.index', ['sort' => 'terlama', 'search' => request('search'), 'koleksi' => request('koleksi')]) }}">
                                Terlama
                            </a>
                        </li>
                        {{-- <li>
                                <a class="dropdown-item" href="{{ route('ae-library.index', ['sort' => 'views_count', 'search' => request('search'), 'kategori' => request('kategori')]) }}">
                                    Terpopuler
                                </a>
                            </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        @if (request('search'))
            <p class="lead mb-0">Ditemukan {{ $pustakas->total() }} pencarian untuk kata kunci:
                "{{ request('search') }}"</p>
        @endif
        @if ($pustakas->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Koleksi</th>
                            <th>Dibuat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($pustakas as $index => $pustaka)
                            <tr>
                                <td>{{ $index + $pustakas->firstItem() }}</td>
                                <td class="p-2"><img src="{{ $pustaka->cover ?? asset('assets/img/avatars/book.svg') }}"
                                        style="max-width:160px; max-height:98px;" alt="Cover"></td>
                                <td>{{ $pustaka->title }}</td>
                                <td>{{ $pustaka->collection }}</td>
                                <td>{{ $pustaka->created_at ? $pustaka->created_at->format('d M Y') : '-' }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ $pustaka->url }}" target="_blank"><i
                                                    class="bx bx-show-alt me-1"></i> Lihat Pustaka</a>
                                            <a class="dropdown-item"
                                                href="{{ route('ae-library.edit', $pustaka->slug) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('ae-library.destroy', $pustaka->slug) }}"
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
                {{ $pustakas->links('pagination::bootstrap-4') }}
            </div>
        @else
            <div class="alert alert-light text-center" role="alert">
                Tidak ada data!
            </div>
        @endif
    </div>
@endsection
