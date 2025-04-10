@extends('admin.layouts.master')
@section('title', 'Buat Koleksi Pustaka')
@section('card', 'Koleksi Pustaka')
@section('keterangan', 'Buat Koleksi Pustaka')
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
        <h5 class="card-header">Buat Koleksi Pustaka</h5>
        <div class="card-body">
            <form action="{{ route('library-collection.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="memberNumber" class="form-label">Nama Koleksi <span class="text-danger">*</span></label>
                        <input type="text" id="memberNumber" name="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Koleksi" />
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Kembali
                    </button>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>

@endsection
