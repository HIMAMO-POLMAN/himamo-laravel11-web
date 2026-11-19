
@extends('admin.layouts.master')

@section('title', 'AE Jadwal Kegiatan')
@section('card', 'AE Jadwal Kegiatan')
@section('keterangan', 'Tambah Kegiatan')

@section('content')

@include('admin.partials.alert')

<div class="card shadow p-3">

    <form action="{{ route('ae-kegiatan.store') }}" method="POST">
        @csrf

        <div class="row">

            {{-- Judul --}}
            <div class="col-12 mb-3">
                <label for="judul" class="form-label">Judul Kegiatan</label>
                <input
                    type="text"
                    name="judul"
                    id="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul') }}"
                    placeholder="Masukkan judul kegiatan"
                    required
                >
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Kategori Divisi --}}
            <div class="col-md-6 mb-3">
                <label for="kategori" class="form-label">Kategori Divisi</label>
                <select
                    name="kategori"
                    id="kategori"
                    class="form-select @error('kategori') is-invalid @enderror"
                    required
                >
                    <option value="">-- Pilih Divisi --</option>

                    @foreach (['MTH', 'Kaderisasi', 'PSDM', 'SARPRAS', 'HUBDAL', 'PENGMAS', 'RELOG', 'MEDINFO', 'EKRAF'] as $kategori)
                        <option value="{{ $kategori }}"
                            {{ old('kategori') == $kategori ? 'selected' : '' }}>
                            {{ $kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Lokasi --}}
            <div class="col-md-6 mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input
                    type="text"
                    name="lokasi"
                    id="lokasi"
                    class="form-control @error('lokasi') is-invalid @enderror"
                    value="{{ old('lokasi') }}"
                    placeholder="Masukkan lokasi kegiatan"
                >
                @error('lokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tanggal Mulai --}}
            <div class="col-md-6 mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input
                    type="date"
                    name="tanggal_mulai"
                    id="tanggal_mulai"
                    class="form-control @error('tanggal_mulai') is-invalid @enderror"
                    value="{{ old('tanggal_mulai') }}"
                    required
                >
                @error('tanggal_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tanggal Selesai --}}
            <div class="col-md-6 mb-3">
                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                <input
                    type="date"
                    name="tanggal_selesai"
                    id="tanggal_selesai"
                    class="form-control @error('tanggal_selesai') is-invalid @enderror"
                    value="{{ old('tanggal_selesai') }}"
                >
                @error('tanggal_selesai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="col-12 mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                <textarea
                    name="deskripsi"
                    id="deskripsi"
                    rows="5"
                    class="form-control @error('deskripsi') is-invalid @enderror"
                    placeholder="Masukkan deskripsi kegiatan"
                >{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('ae-kegiatan.index') }}" class="btn btn-secondary">
                Kembali
            </a>

            <button type="submit" class="btn btn-primary">
                Simpan Kegiatan
            </button>
        </div>

    </form>

</div>

@endsection
