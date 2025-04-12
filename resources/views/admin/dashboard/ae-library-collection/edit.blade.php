@extends('admin.layouts.master')
@section('title', 'Edit Koleksi Pustaka')
@section('card', 'Koleksi Pustaka')
@section('keterangan', 'Edit Koleksi Pustaka')
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
        <h5 class="card-header">Edit Koleksi Pustaka</h5>
        <div class="card-body">
            <form action="{{ route('library-collection.update', $koleksi->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="memberNumber" class="form-label">Nama Koleksi <span class="text-danger">*</span></label>
                        <input type="text" id="memberNumber" name="name" value="{{ old('name', $koleksi->name) }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Koleksi" />
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Kembali
                </button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
