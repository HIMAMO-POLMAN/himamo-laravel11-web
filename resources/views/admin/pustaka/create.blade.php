@extends('admin.layout.index')
@section('title', 'AE Pustaka')
@if (!empty($pustaka->slug))
@section('keterangan', 'Edit Pustaka')
@else
@section('keterangan', 'Tambah Pustaka')
@endif
@section('content')

<div class="d-flex mb-3">
    <h1 class="text-dark fs-3">{{ !empty($pustaka->slug) ? 'Edit Pustaka' : 'Tambah Pustaka' }}</h1>
</div>

<div class="card shadow p-3">
    <div class="table-responsive col-lg-12">
        {{-- Cek Form Create/Edit --}}
        @if (!empty($pustaka->slug))
        <form action="{{ route('pustaka.update', $pustaka->slug) }}" method="POST">
            @method('PUT')
        @else
        <form action="{{ route('pustaka.store') }}" method="POST">
        @endif
        {{-- Cek Form Create/Edit --}}
            @csrf

            <div class="form-group mb-4">
                <label for="title">Masukan Title Pustaka <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ !empty($pustaka->title) ? $pustaka->title : old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="isbn">ISBN</label>
                <input type="number" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" value="{{ !empty($pustaka->isbn) ? $pustaka->isbn : old('isbn') }}">
                @error('isbn')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="penulis">Penulis</label>
                <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" value="{{ !empty($pustaka->penulis) ? $pustaka->penulis : old('penulis') }}">
                @error('penulis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit" value="{{ !empty($pustaka->penerbit) ? $pustaka->penerbit : old('penerbit') }}">
                @error('penerbit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" name="tahun_terbit" value="{{ !empty($pustaka->tahun_terbit) ? $pustaka->tahun_terbit : old('tahun_terbit') }}">
                @error('tahun_terbit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="bahasa">Bahasa <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('bahasa') is-invalid @enderror" id="bahasa" name="bahasa" value="{{ !empty($pustaka->bahasa) ? $pustaka->bahasa : old('bahasa') }}">
                @error('bahasa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="jumlah_halaman">Jumlah Halaman <span class="text-danger">*</span></label>
                <input type="number" class="form-control @error('jumlah_halaman') is-invalid @enderror" id="jumlah_halaman" name="jumlah_halaman" value="{{ !empty($pustaka->jumlah_halaman) ? $pustaka->jumlah_halaman : old('jumlah_halaman') }}">
                @error('jumlah_halaman')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="cover">Cover (URL)</label>
                <input type="url" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover" value="{{ !empty($pustaka->cover) ? $pustaka->cover : old('cover') }}">
                @error('cover')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="url">URL Pustaka <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ !empty($pustaka->url) ? $pustaka->url : old('url') }}">
                @error('url')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="collection">Koleksi Pustaka <span class="text-danger">*</span></label>
                <select class="form-control @error('collection') is-invalid @enderror" id="collection" name="collection">
                    <option value="" selected="selected" hidden="hidden">-- Pilih --</option>
                    <option value="TRO" @if (old('collection') == 'TRO' || (!empty($pustaka->collection) && $pustaka->collection == 'TRO')) selected @endif>TRO</option>
                    <option value="TRMO" @if (old('collection') == 'TRMO' || (!empty($pustaka->collection) && $pustaka->collection == 'TRMO')) selected @endif>TRMO</option>
                    <option value="TRIN" @if (old('collection') == 'TRIN' || (!empty($pustaka->collection) && $pustaka->collection == 'TRIN')) selected @endif>TRIN</option>
                    <option value="Teori" @if (old('collection') == 'Teori' || (!empty($pustaka->collection) && $pustaka->collection == 'Teori')) selected @endif>Teori</option>
                </select>
                @error('collection')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="abstrak">Abstrak Pustaka <span class="text-danger">*</span></label>
                <textarea name="abstrak" id="summernote" class="form-control @error('abstrak') is-invalid @enderror">{{ $pustaka->abstrak ?? old('abstrak') }}</textarea>
                @error('abstrak')
                    <div class="text-danger">
                        {{ $message }}
                    @enderror
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
