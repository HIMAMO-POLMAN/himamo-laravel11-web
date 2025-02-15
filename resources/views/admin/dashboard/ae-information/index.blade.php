@extends('admin.layouts.master')
@section('title', 'AE Informasi')
@section('card', 'AE Informasi')
@section('keterangan', 'Lihat Informasi')
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
                <a href="{{ route('ae-information.create') }}" class="btn btn-primary w-100">
                    Buat Informasi
                </a>
            </div>

            <div class="col-12 col-md mb-2">
                <form action="{{ route('ae-information.index') }}" method="GET" class="d-flex">
                    <input type="text" class="form-control bg-light border-1 small me-2" placeholder="Cari..."
                        name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search fa-sm"></i>
                    </button>
                </form>
            </div>

            <div class="col-12 col-md-auto mb-2">
                <div class="btn-group w-100">
                    <button type="button" class="btn btn-primary dropdown-toggle w-100" data-bs-toggle="dropdown">
                        Filter Kategori
                    </button>
                    <ul class="dropdown-menu w-100">
                        <li>
                            <h6 class="dropdown-header text-uppercase">Pilih Kategori</h6>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('ae-information.index') }}">Semua</a></li>
                        @foreach ($kategori_informasi as $kategori)
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('ae-information.index', ['kategori' => $kategori->id]) }}">
                                    {{ $kategori->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-auto mb-2">
                <div class="btn-group w-100">
                    <button type="button" class="btn btn-primary dropdown-toggle w-100" data-bs-toggle="dropdown">
                        Urutkan
                    </button>
                    <ul class="dropdown-menu w-100">
                        <li>
                            <h6 class="dropdown-header text-uppercase">Pilih Urutan</h6>
                        </li>
                        <li><a class="dropdown-item"
                                href="{{ route('ae-information.index', ['sort' => 'terbaru']) }}">Terbaru</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('ae-information.index', ['sort' => 'terlama']) }}">Terlama</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('ae-information.index', ['sort' => 'views_count']) }}">Terpopuler</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @if (request('search'))
            <p class="lead mb-0">Ditemukan {{ $ae_informations->total() }} pencarian untuk kata kunci:
                "{{ request('search') }}"</p>
        @endif
        @if ($ae_informations->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Kategori</th>
                            <th>Pembuat</th>
                            <th>Dibuat</th>
                            <th>Dilihat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($ae_informations as $index => $ae_information)
                            <tr>
                                <td>{{ $index + $ae_informations->firstItem() }}</td>
                                <td>
                                    <img src="{{ asset('storage/informasi/' . $ae_information->image) }}" class="img-fluid"
                                        style="max-height: 100px; width: auto;">
                                </td>
                                <td>{{ $ae_information->title }}</td>
                                <td>{{ $ae_information->kategori_informasi->name ?? 'Tidak ada kategori' }}</td>
                                <td>{{ $ae_information->user->name ?? 'Tidak diketahui' }}</td>
                                <td>{{ $ae_information->created_at ? $ae_information->created_at->format('d M Y') : '-' }}
                                </td>
                                <td>{{ $ae_information->views_count ?? '0' }} kali</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('ae-information.show', $ae_information->slug) }}"><i
                                                    class="bx bx-show-alt me-1"></i> Lihat</a>
                                            <a class="dropdown-item"
                                                href="{{ route('ae-information.edit', $ae_information->slug) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('ae-information.destroy', $ae_information->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"><i
                                                        class="bx bx-trash me-1 text-danger"></i> Delete</button>
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
                {{ $ae_informations->links('pagination::bootstrap-4') }}
            </div>
        @else
            <div class="alert alert-light text-center" role="alert">
                Tidak ada data!
            </div>
        @endif
    </div>
@endsection
