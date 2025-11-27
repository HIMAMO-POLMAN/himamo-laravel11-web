@extends('admin.layouts.master')
@section('title', 'AE Informasi')
@section('card', 'AE Informasi')
@section('keterangan', 'Lihat Detail Informasi')
@section('content')

    <div class="d-flex card shadow p-3">
        <div class="mb-3">
            <h1 class="mb-3">{{ $informasi->title }}</h1>
            <div class="d-flex align-items-center gap-4 flex-wrap mb-3">
                <span class="d-flex align-items-center"><i class="bx bx-bookmark me-2"></i>
                    {{ $informasi->category->name }}</span>
                <span class="d-flex align-items-center">
                    <i class="bx bx-calendar me-2"></i>
                    {{ \Carbon\Carbon::parse($informasi->created_at)->translatedFormat('d F Y') }}
                </span>
                <span class="d-flex align-items-center"><i class="bx bx-user me-2"></i> Oleh:
                    {{ $informasi->user->name ?? 'Ristek Himamo' }}</span>
            </div>
            <img class="img-fluid mb-3 w-100 w-md-50 d-block mx-auto" src="{{ asset('storage/' . $informasi->image) }}"
                alt="{{ $informasi->title }}">
            <div class="mb-4">{!! $informasi->desc !!}</div>
            <div class="mt-4">
                <a href="{{ route('ae-information.index') }}" class="btn btn-warning w-100">Back</a>
            </div>
        </div>
    </div>

@endsection
