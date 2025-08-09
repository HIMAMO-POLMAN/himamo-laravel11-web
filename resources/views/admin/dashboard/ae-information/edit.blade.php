@extends('admin.layouts.master')
@section('title', 'Ubah AE Informasi')
@section('card', 'AE Informasi')
@section('keterangan', 'Ubah Informasi')
@section('content')

@include('admin.partials.alert')

    <div class="d-flex card shadow p-3">
        <h5 class="card-header">Ubah Informasi</h5>
        <div class="card-body">
            <form action="{{ route('ae-information.update', $informasi->slug) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Masukan Judul" name="title" value="{{ old('title', $informasi->title) }}" />
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="category_id" class="form-label">Kategori Informasi</label>
                        <select name="category_id"
                            class="form-select  @error('category_id') is-invalid @enderror" id="category_id"
                            aria-label="Default select example">
                            <option selected>Pilih Kategori</option>
                            @foreach ($kategori_informasi as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ $informasi->category_id == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
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
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="desc" class="form-label">Abstrak Pustaka</label>
                        <textarea name="desc" class="form-control" id="summernote" rows="3">{{ old('desc', $informasi->desc) }}</textarea>
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
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>

@endsection
