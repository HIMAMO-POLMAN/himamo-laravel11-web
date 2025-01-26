@extends('admin.layouts.master')
@section('title', 'Edit AE Pustaka')
@section('card', 'Edit AE Pustaka')
@section('keterangan', 'Edit Pustaka')

@section('content')
    {{-- @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif --}}

    <div class="d-flex card shadow p-3">
        <h5 class="card-header">Edit Pustaka</h5>
        <div class="card-body">
            <div class="row g-2">
                <div class="col mb-3">
                    <label for="memberNumber" class="form-label">Judul</label>
                    <input type="text" id="memberNumber" class="form-control" placeholder="Masukan Judul" />
                </div>
                <div class="col mb-3">
                    <label for="name" class="form-label">ISBN</label>
                    <input type="text" id="name" class="form-control" placeholder="123456" />
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-3">
                    <label for="memberNumber" class="form-label">Penulis</label>
                    <input type="text" id="memberNumber" class="form-control" placeholder="Masukan Nama Penulis" />
                </div>
                <div class="col mb-3">
                    <label for="name" class="form-label">Penerbit</label>
                    <input type="text" id="name" class="form-control" placeholder="Masukan Penerbit" />
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-3">
                    <label for="memberNumber" class="form-label">Tahun Terbit</label>
                    <input type="text" id="memberNumber" class="form-control" placeholder="Masukan Tahun Terbit" />
                </div>
                <div class="col mb-3">
                    <label for="name" class="form-label">Bahasa</label>
                    <input type="text" id="name" class="form-control" placeholder="Masukan Bahasa" />
                </div>

            </div>
            <div class="col mb-3">
                <label for="name" class="form-label">Jumlah Halaman</label>
                <input type="text" id="name" class="form-control" placeholder="Masukan Jumlah Halaman" />
            </div>
            <div class="col mb-3">
                <label for="name" class="form-label">Cover (URL)</label>
                <input type="text" id="name" class="form-control" placeholder="https://contoh.com/nama-url" />
            </div>
            <div class="col mb-3">
                <label for="name" class="form-label">URL Pustaka</label>
                <input type="text" id="name" class="form-control" placeholder="https://contoh.com/nama-pustaka" />
            </div>

            <div class="col mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Koleksi Pustaka</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                    <option selected>Pilih Koleksi Pustaka</option>
                    <option value="1">TRO</option>
                    <option value="2">TRMO</option>
                    <option value="2">TRIN</option>
                </select>
            </div>
            <div class="col mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Abstrak Pustaka</label>
                <textarea class="form-control" id="summernote" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Kembali
            </button>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
    </div>
    </div>
@endsection
