@extends('admin.layouts.master')
@section('title', 'Edit AE Informasi')
@section('card', 'Edit AE Informasi')
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
        <h5 class="card-header">Edit Informasi</h5>
        <div class="card-body">
            <form action="{{ route('ae-information.update', $informasi->slug) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                        placeholder="Masukan Judul" name="title" value="{{ old('title', $informasi->title) }}" />
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="categories" class="form-label">Kategori Informasi</label>
                        <select name="kategori_informasi_id"
                            class="form-select  @error('kategori_informasi_id') is-invalid @enderror" id="categories"
                            aria-label="Default select example">
                            <option selected>Pilih Kategori</option>
                            @foreach ($kategori_informasi as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ $informasi->kategori_informasi_id == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_informasi_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="image" class="form-label">Pilih Gambar</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image" />
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        @if ($informasi->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/informasi/' . $informasi->image) }}" alt="Current Image"
                                    style="width: 150px;">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col mb-3">
                    <label for="desc" class="form-label">Abstrak Pustaka</label>
                    <textarea name="desc" class="form-control" id="summernote" rows="3">{{ old('desc', $informasi->desc) }}</textarea>
                    @error('desc')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <a href="{{ route('ae-information.index') }}" class="btn btn-outline-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </form> <!-- Tambahkan penutup form di sini -->
        </div>
    </div>
@endsection
