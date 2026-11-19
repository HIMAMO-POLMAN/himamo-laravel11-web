
@extends('admin.layouts.master')

@section('title', 'AE Jadwal Kegiatan')
@section('card', 'AE Jadwal Kegiatan')
@section('keterangan', 'Kategori Kegiatan')

@section('content')

@include('admin.partials.alert')

<div class="row">

    {{-- Belum Dimulai --}}
    <div class="col-12 mb-4">
        <div class="card shadow p-3">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0 text-info">
                    <i class="bx bx-time-five me-1"></i>
                    Belum Dimulai
                </h5>

                <span class="badge bg-info">
                    {{ $belumDimulai->count() }} Kegiatan
                </span>
            </div>

            @forelse ($belumDimulai as $kegiatan)
                <div class="border rounded p-3 mb-2">
                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <div>
                            <h6 class="mb-1">{{ $kegiatan->judul }}</h6>
                            <small class="text-muted">
                                {{ $kegiatan->kategori ?? 'Belum Dikategorikan' }}
                                · {{ $kegiatan->lokasi ?? 'Lokasi belum ditentukan' }}
                            </small>
                            <p class="mb-0 mt-2">
                                {{ $kegiatan->tanggal_mulai->locale('id')->translatedFormat('d F Y') }}
                                -
                                {{ $kegiatan->tanggal_selesai
                                    ? $kegiatan->tanggal_selesai->locale('id')->translatedFormat('d F Y')
                                    : $kegiatan->tanggal_mulai->locale('id')->translatedFormat('d F Y') }}
                            </p>
                        </div>

                        <a href="{{ route('ae-kegiatan.edit', $kegiatan->id) }}"
                            class="btn btn-sm btn-outline-primary mt-2">
                            <i class="bx bx-edit-alt"></i> Ubah
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center mb-0">
                    Tidak ada kegiatan yang belum dimulai.
                </p>
            @endforelse

        </div>
    </div>

    {{-- Sedang Berlangsung --}}
    <div class="col-12 mb-4">
        <div class="card shadow p-3">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0 text-success">
                    <i class="bx bx-play-circle me-1"></i>
                    Sedang Berlangsung
                </h5>

                <span class="badge bg-success">
                    {{ $sedangBerlangsung->count() }} Kegiatan
                </span>
            </div>

            @forelse ($sedangBerlangsung as $kegiatan)
                <div class="border rounded p-3 mb-2">
                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <div>
                            <h6 class="mb-1">{{ $kegiatan->judul }}</h6>
                            <small class="text-muted">
                                {{ $kegiatan->kategori ?? 'Belum Dikategorikan' }}
                                · {{ $kegiatan->lokasi ?? 'Lokasi belum ditentukan' }}
                            </small>
                            <p class="mb-0 mt-2">
                                {{ $kegiatan->tanggal_mulai->locale('id')->translatedFormat('d F Y') }}
                                -
                                {{ $kegiatan->tanggal_selesai
                                    ? $kegiatan->tanggal_selesai->locale('id')->translatedFormat('d F Y')
                                    : $kegiatan->tanggal_mulai->locale('id')->translatedFormat('d F Y') }}
                            </p>
                        </div>

                        <a href="{{ route('ae-kegiatan.edit', $kegiatan->id) }}"
                            class="btn btn-sm btn-outline-primary mt-2">
                            <i class="bx bx-edit-alt"></i> Ubah
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center mb-0">
                    Tidak ada kegiatan yang sedang berlangsung.
                </p>
            @endforelse

        </div>
    </div>

    {{-- Sudah Selesai --}}
    <div class="col-12 mb-4">
        <div class="card shadow p-3">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0 text-secondary">
                    <i class="bx bx-check-circle me-1"></i>
                    Sudah Selesai
                </h5>

                <span class="badge bg-secondary">
                    {{ $sudahSelesai->count() }} Kegiatan
                </span>
            </div>

            @forelse ($sudahSelesai as $kegiatan)
                <div class="border rounded p-3 mb-2">
                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <div>
                            <h6 class="mb-1">{{ $kegiatan->judul }}</h6>
                            <small class="text-muted">
                                {{ $kegiatan->kategori ?? 'Belum Dikategorikan' }}
                                · {{ $kegiatan->lokasi ?? 'Lokasi belum ditentukan' }}
                            </small>
                            <p class="mb-0 mt-2">
                                {{ $kegiatan->tanggal_mulai->locale('id')->translatedFormat('d F Y') }}
                                -
                                {{ $kegiatan->tanggal_selesai
                                    ? $kegiatan->tanggal_selesai->locale('id')->translatedFormat('d F Y')
                                    : $kegiatan->tanggal_mulai->locale('id')->translatedFormat('d F Y') }}
                            </p>
                        </div>

                        <a href="{{ route('ae-kegiatan.edit', $kegiatan->id) }}"
                            class="btn btn-sm btn-outline-primary mt-2">
                            <i class="bx bx-edit-alt"></i> Ubah
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center mb-0">
                    Belum ada kegiatan yang selesai.
                </p>
            @endforelse

        </div>
    </div>

</div>

@endsection
