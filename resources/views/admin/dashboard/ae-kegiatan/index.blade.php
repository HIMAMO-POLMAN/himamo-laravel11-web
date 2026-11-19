
@extends('admin.layouts.master')

@section('title', 'AE Jadwal Kegiatan')
@section('card', 'AE Jadwal Kegiatan')
@section('keterangan', 'Lihat Kegiatan')

@section('content')

@include('admin.partials.alert')

<div class="d-flex card shadow p-3">

    {{-- Tombol dan Filter --}}
    <div class="row mb-3">

        <div class="col-12 col-md-auto mb-2">
            <a href="{{ route('ae-kegiatan.create') }}" class="btn btn-primary w-100">
                Tambah Kegiatan
            </a>
        </div>

        {{-- Pencarian --}}
        <div class="col-12 col-md mb-2">
            <form action="{{ route('ae-kegiatan.index') }}" method="GET" class="d-flex">
                <input
                    type="text"
                    class="form-control bg-light border-1 small me-2"
                    placeholder="Cari judul atau lokasi..."
                    name="search"
                    value="{{ request('search') }}"
                >

                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-search fa-sm"></i>
                </button>
            </form>
        </div>

        {{-- Filter Kategori Divisi --}}
        <div class="col-12 col-md-auto mb-2">
            <div class="btn-group w-100">
                <button type="button" class="btn btn-primary dropdown-toggle w-100"
                    data-bs-toggle="dropdown">
                    Filter Kategori
                </button>

                <ul class="dropdown-menu w-100">
                    <li>
                        <h6 class="dropdown-header text-uppercase">Pilih Divisi</h6>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('ae-kegiatan.index') }}">
                            Semua
                        </a>
                    </li>

                    @foreach (['MTH', 'Kaderisasi', 'PSDM', 'SARPRAS', 'HUBDAL', 'PENGMAS', 'RELOG', 'MEDINFO', 'EKRAF'] as $kategori)
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('ae-kegiatan.index', ['kategori' => $kategori]) }}">
                                {{ $kategori }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Pengurutan --}}
        <div class="col-12 col-md-auto mb-2">
            <div class="btn-group w-100">
                <button type="button" class="btn btn-primary dropdown-toggle w-100"
                    data-bs-toggle="dropdown">
                    Urutkan
                </button>

                <ul class="dropdown-menu w-100">
                    <li>
                        <h6 class="dropdown-header text-uppercase">Pilih Urutan</h6>
                    </li>

                    <li>
                        <a class="dropdown-item"
                            href="{{ route('ae-kegiatan.index', ['sort' => 'terbaru']) }}">
                            Terbaru
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item"
                            href="{{ route('ae-kegiatan.index', ['sort' => 'terlama']) }}">
                            Terlama
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    {{-- Informasi Pencarian --}}
    @if (request('search'))
        <p class="lead mb-0">
            Ditemukan {{ $kegiatans->total() }} kegiatan untuk kata kunci:
            "{{ request('search') }}"
        </p>
    @endif

    {{-- Tabel Kegiatan --}}
    @if ($kegiatans->count() > 0)

        <div class="table-responsive">
            <table class="table table-hover mt-3">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Kegiatan</th>
                        <th>Kategori</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">

                    @foreach ($kegiatans as $index => $kegiatan)

                        @php
                            $hariIni = now()->startOfDay();
                            $mulai = $kegiatan->tanggal_mulai->copy()->startOfDay();
                            $selesai = $kegiatan->tanggal_selesai
                                ? $kegiatan->tanggal_selesai->copy()->startOfDay()
                                : $mulai;

                            if ($hariIni->lt($mulai)) {
                                $status = 'Belum Dimulai';
                                $warna = 'bg-info';
                            } elseif ($hariIni->lte($selesai)) {
                                $status = 'Sedang Berlangsung';
                                $warna = 'bg-success';
                            } else {
                                $status = 'Sudah Selesai';
                                $warna = 'bg-secondary';
                            }
                        @endphp

                        <tr>
                            <td>{{ $index + $kegiatans->firstItem() }}</td>

                            <td>
                                {{ $kegiatan->judul }}
                            </td>

                            <td>
                                {{ $kegiatan->kategori ?? 'Belum Dikategorikan' }}
                            </td>

                            <td>
                                {{ $kegiatan->tanggal_mulai
                                    ? $kegiatan->tanggal_mulai->locale('id')->translatedFormat('d F Y')
                                    : '-' }}
                            </td>

                            <td>
                                {{ $kegiatan->tanggal_selesai
                                    ? $kegiatan->tanggal_selesai->locale('id')->translatedFormat('d F Y')
                                    : '-' }}
                            </td>

                            <td>
                                {{ $kegiatan->lokasi ?? '-' }}
                            </td>

                            <td>
                                <span class="badge {{ $warna }}">
                                    {{ $status }}
                                </span>
                            </td>

                            <td class="text-center">
                                <div class="dropdown">

                                    <button type="button"
                                        class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>

                                    <div class="dropdown-menu">

                                        <a class="dropdown-item"
                                            href="{{ route('ae-kegiatan.edit', $kegiatan->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i>
                                            Ubah
                                        </a>

                                        <form
                                            action="{{ route('ae-kegiatan.destroy', $kegiatan->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="dropdown-item text-danger"
                                                onclick="return confirm('Yakin ingin menghapus kegiatan ini?')">

                                                <i class="bx bx-trash me-1 text-danger"></i>
                                                Hapus

                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center py-3">
            {{ $kegiatans->links('pagination::bootstrap-4') }}
        </div>

    @else

        <div class="alert alert-light text-center" role="alert">
            Tidak ada data kegiatan!
        </div>

    @endif

</div>

@endsection
