@extends('guest.layouts.app')

@section('content')
    {{-- Preloader animasi terminal booting --}}
    @include('guest.layouts.partials.sections.preloader')

    {{-- Hero Section Utama --}}
    @include('guest.layouts.partials.sections.hero')

    {{-- Hub Informasi & Pustaka (Bento Grid UI) --}}
    @include('guest.layouts.partials.sections.hub-digital')

    {{-- Eksplorasi Program Studi Terintegrasi --}}
    @include('guest.layouts.partials.sections.prodi-gateway')

    {{-- Narasi Sejarah Jurusan & HIMAMO --}}
    @include('guest.layouts.partials.sections.history')

    {{-- Struktur Bidang & Majelis Tinggi Himpunan --}}
    @include('guest.layouts.partials.sections.divisions')

    {{-- Galeri Pemimpin & Testimoni (Native CSS Snap Carousel) --}}
    @include('guest.layouts.partials.sections.leadership')

    {{-- Dokumentasi Video & Moments --}}
    @include('guest.layouts.partials.sections.media')
@endsection
