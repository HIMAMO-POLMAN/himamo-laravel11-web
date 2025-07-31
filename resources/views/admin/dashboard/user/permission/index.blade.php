@extends('admin.layouts.master')
@section('title', 'Permission')
@section('card', 'Permission')
@section('keterangan', 'Lihat Permissions')
@section('content')

@include('admin.partials.alert')

<div class="card shadow p-3">
    <div class="row mb-3">
        <div class="col-12 col-md-auto mb-2">
            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#createPermissionModal">
                Tambah Permission
            </button>
        </div>
        <div class="col-12 col-md mb-2">
            <form action="{{ route('permission.index') }}" method="GET" class="d-flex">
                <input type="text" class="form-control bg-light border-1 small me-2" placeholder="Cari Permission..."
                    name="search" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-search fa-sm"></i>
                </button>
            </form>
        </div>
    </div>

    @if ($permissions->count())
        <div class="table-responsive">
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Permission</th>
                        <th>Dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $index => $permission)
                        <tr>
                            <td>{{ $index + $permissions->firstItem() }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->created_at?->locale('id')->translatedFormat('d F Y') }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('permission.edit', $permission) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Ubah
                                        </a>
                                        <form action="{{ route('permission.destroy', $permission) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="bx bx-trash me-1 text-danger"></i> Hapus
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

        <div class="d-flex justify-content-center py-3">
            {{ $permissions->links('pagination::bootstrap-4') }}
        </div>
    @else
        <div class="alert alert-light text-center">Tidak ada permission!</div>
    @endif
</div>

<!-- Modal Tambah Permission -->
<div class="modal fade" id="createPermissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form action="{{ route('permission.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label">Nama Permission <span class="text-danger">*</span></label>
                <input type="text" name="name" required
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" placeholder="contoh: edit artikel">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
