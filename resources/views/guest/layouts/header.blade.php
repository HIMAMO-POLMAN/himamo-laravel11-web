<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title Page --}}
    <title>@yield('title', 'HIMAMO | Himpunan Teknik Mahasiswa Otomasi Manufaktur & Mekatronika')</title>
    <meta name="description" content="@yield('meta_description', 'Website resmi Himpunan Mahasiswa Teknik Otomasi Manufaktur dan Mekatronika POLMAN Bandung')">


    {{-- Meta Open Graph --}}
    {{-- Meta Open Graph --}}
    @if (Request::segment(2) == 'detail' && isset($informasi))
        @php
            $desc = strip_tags($informasi->excerpt ?? Str::limit($informasi->desc, 150));
            $imagePath = $informasi->image
                ? asset('storage/informasi/' . $informasi->image)
                : asset('assets-guest/img/img-himamo.webp');
            $url = url()->current();
        @endphp

        <meta property="og:title" content="{{ $informasi->title }}" />
        <meta property="og:description" content="{{ $desc }}" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="{{ $url }}" />
        <meta property="og:image" content="{{ $imagePath }}" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <meta property="og:site_name" content="HIMAMO" />
    @else
        <meta property="og:title" content="HIMAMO" />
        <meta property="og:description"
            content="Website resmi Himpunan Mahasiswa Teknik Otomasi Manufaktur dan Mekatronika POLMAN Bandung" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url('/') }}" />
        <meta property="og:image" content="{{ asset('assets-guest/img/img-himamo.webp') }}" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <meta property="og:site_name" content="HIMAMO" />
    @endif



    {{-- Custom CSS --}}
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/dark-mode.css') }}">

    {{-- Favicon and Icons --}}
    <link rel="icon" href="{{ asset('favicons/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicons/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicons/android-chrome-512x512.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicons/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <style>
        a {
            text-decoration: none !important;
        }
    </style>

    {{-- Boxicons --}}
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

    {{-- Font Spectral --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    {{-- Font Karla --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap"
        rel="stylesheet">

    {{-- OwlCarousel --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Scripts --}}
    @once
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @endonce
</head>
