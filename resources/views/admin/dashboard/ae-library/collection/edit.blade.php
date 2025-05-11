@extends('admin.layouts.master')
@section('title', 'Ubah Koleksi Pustaka')
@section('card', 'Koleksi Pustaka')
@section('keterangan', 'Ubah Koleksi Pustaka')
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
        <h5 class="card-header">Ubah Koleksi Pustaka</h5>
        <div class="card-body">
            <form action="{{ route('library-collection.update', $koleksi->slug) }}" method="POST">

                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="name" class="form-label @error('name') is-invalid @enderror">Nama Koleksi</label>
                        <input type="text" id="name" class="form-control" placeholder="Masukan Nama Koleksi"
                            name="name" value="{{ old('name', $koleksi->name) }}" />
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('library-collection.index') }}" class="btn btn-outline-secondary">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>

@endsection
