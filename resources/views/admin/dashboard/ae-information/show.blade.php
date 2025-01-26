@extends('admin.layouts.master')
@section('title', 'AE Informasi')
@section('card', 'AE Informasi')
@section('keterangan', 'Lihat Informasi')
@section('content')


<div class="d-flex card shadow p-3">
    <div class="mb-3">
        <p>Kategori: {{ $informasi->kategori_informasi->name }}</p>
        <h1>{{ $informasi->title }}</h1>
        <p>Tanggal: {{ date('d/m/Y', strtotime($informasi->created_at)) }}</p>
        <p>Oleh: {{ !$informasi->user->name ? 'Ristek Himamo' : $informasi->user->name }}</p>
        <img class="img-fluid mb-3 w-50 d-block mx-auto" src="{{ asset('storage/informasi/' . $informasi->image) }}" alt="{{ $informasi->title }}">
        <div>{!! $informasi->desc !!}</div>
        <div class="mt-3">
            <a href="{{ route('ae-information.index')}}" class="btn btn-warning">Back</a>
        </div>
    </div>
</div>


@endsection
