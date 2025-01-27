@extends('admin.layout.index')
@section('title', 'AE Pustaka')
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

    <div class="d-flex mb-3">
        <h1 class="text-dark fs-3">Pustaka</h1>
    </div>
    <div class="d-flex card shadow p-3">
        <div class="table-responsive col-lg-12 mb-5">
            <div class="d-flex justify-content-between mb-5">
                <a href="{{ route('pustaka.create') }}" class="btn btn-primary mb-1">Buat Pustaka</a>
                <form action="{{ route('pustaka.index') }}" method="GET" class="form-inline mr-auto w-25 navbar-search justify-content-end">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..." name="cari" value="{{ request('cari') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @if ($pustakas->count() > 0)
                <table class="table table-hover">
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
                                <td class="p-2"><img src="{{$pustaka->cover ?? asset('assets/img/book.svg')}}" style="max-width:160px; max-height:98px;" alt="Cover"></td>
                                <td>{{ $pustaka->title }}</td>
                                <td>{{ $pustaka->collection }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ $pustaka->url }}" target="_blank"><i class="bx bx-edit-alt me-1"></i> Lihat Pustaka</a>
                                            <a class="dropdown-item" href="{{ route('pustaka.edit', $pustaka->slug) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('pustaka.destroy', $pustaka->slug) }}" method="POST">
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
