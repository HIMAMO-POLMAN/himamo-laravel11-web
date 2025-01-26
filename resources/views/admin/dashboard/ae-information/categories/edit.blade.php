@extends('admin.layouts.master')
@section('title', 'Ubah Kategori - AE Informasi')
@section('card', 'AE Informasi / Kategori')
@section('keterangan', 'Ubah Kategori')
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
        <h5 class="card-header">Ubah Kategori</h5>
        <div class="card-body">
            <form action="{{ route('information-categories.update', $information_category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col mb-3">
                    <label for="name" class="form-label @error('name') is-invalid @enderror">Nama Kategori</label>
                    <input type="text" id="name" class="form-control" placeholder="Masukan Nama Kategori"
                        name="name" value="{{ old('name', $information_category->name) }}" />
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <a href="{{ route('information-categories.index') }}" class="btn btn-outline-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </form>
        </div>
    </div>
@endsection
