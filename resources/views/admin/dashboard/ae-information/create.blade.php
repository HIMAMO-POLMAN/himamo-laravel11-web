@extends('admin.layouts.master')
@section('title', 'Buat AE Informasi')
@section('card', 'AE Informasi')
@section('keterangan', 'Buat Informasi')
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
        <h5 class="card-header">Buat Informasi</h5>
        <form action="{{ route('ae-information.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Masukan Judul" name="title" value="{{ old('title') }}" />
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="category_id" class="form-label">Kategori Informasi <span
                                class="text-danger">*</span></label>
                        <select name="category_id"
                            class="form-select  @error('category_id') is-invalid @enderror"
                            id="category_id" aria-label="Default select example">
                            <option value="" selected="selected" hidden="hidden">Pilih Kategori</option>
                            @foreach ($kategori_informasi as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="image" class="form-label">Pilih Gambar <span class="text-danger">*</span></label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image" />
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="desc" class="form-label">Artikel Informasi <span
                                class="text-danger">*</span></label>
                        <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="summernote" id="desc"
                            rows="3">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('ae-information.index') }}" class="btn btn-outline-secondary">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    @endsection
