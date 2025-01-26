@extends('admin.layouts.master')
@section('title', 'AE Pustaka')
@section('card', 'AE Pustaka')
@section('keterangan', 'Lihat Pustaka')

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
        <div class="table-responsive col-lg-12">
            <div class="d-flex justify-content-between mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                    Buat Pustaka
                </button>

                <form action="/create user" method="GET" class="form-inline navbar-search justify-content-end">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-1 small" placeholder="Cari..."
                            name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Koleksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>1</td>
                        <td>asdfadfs</td>
                        <td>asdfaf</td>
                        <td>adsfasdf</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/edit"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <form action="/edit" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger"><i
                                                class="bx bx-trash me-1 text-danger"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="alert alert-light" role="alert">
                Tidak ada data!
            </div>

        </div>
    </div>
@endsection
