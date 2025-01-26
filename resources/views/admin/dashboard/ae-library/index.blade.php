@extends('admin.layouts.master')
@section('title', 'AE Pustaka')
@section('card', 'AE Pustaka')
@section('keterangan', 'Lihat Pustaka')

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
        <div class="table-responsive col-lg-12">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{route('ae-pustaka.create')}}" class="btn btn-primary">
                    Buat Pustaka
                </a>

                <form method="GET" class="form-inline navbar-search justify-content-end">
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

            @if ($pustakas->count() > 0)
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
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pustakas as $pustaka)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td class="p-2"><img src="{{$pustaka->cover ?? asset('assets/img/avatars/book.svg')}}" style="max-width:160px; max-height:98px;" alt="Cover"></td>
                            <td>{{ $pustaka->title }}</td>
                            <td>{{ $pustaka->collection }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ $pustaka->url }}" target="_blank"><i class="bx bx-edit-alt me-1"></i> Lihat Pustaka</a>
                                        <a class="dropdown-item" href="{{ route('ae-pustaka.edit',['libraries' => $pustaka->slug]) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form action="{{ route('ae-pustaka.destroy', ['libraries' => $pustaka->slug]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center py-3">
                {{ $pustakas->links('pagination::bootstrap-4') }}
            </div>
            @else
                <div class="alert alert-light text-center" role="alert">
                    Tidak ada data!
                </div>
            @endif

        </div>
    </div>
@endsection
