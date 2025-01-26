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
        <div class="table-responsive col-lg-12">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('ae-information.create') }}" class="btn btn-primary">
                    Buat Informasi
                </a>

                <form action="{{ route('ae-information.index') }}" method="GET"
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
            @if ($ae_informations->count() > 0)
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($ae_informations as $index => $ae_information)
                            <tr>
                                <td>{{ $index + $ae_informations->firstItem() }}</td>
                                <td>
                                    <img src="{{ asset('storage/informasi/' . $ae_information->image) }}" height="100"
                                        alt="">
                                </td>
                                <td>{{ $ae_information->title }}</td>
                                <td>{{ $ae_information->kategori_informasi->name ?? 'Tidak ada kategori' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('ae-information.show', $ae_information->slug) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Lihat</a>
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
                <div class="d-flex justify-content-center py-3">
                    {{ $ae_informations->links('pagination::bootstrap-4') }}
                </div>
            @else
                <div class="alert alert-light" role="alert">
                    Tidak ada data!
                </div>
            @endif
        </div>
    </div>
@endsection
