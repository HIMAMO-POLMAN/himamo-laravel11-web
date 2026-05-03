@extends('admin.layouts.master')
@section('title', 'Role')
@section('card', 'Role')
@section('keterangan', 'Lihat Role')
@section('content')

@include('admin.partials.alert')

<div class="card shadow p-3">
    <div class="row mb-3">
        <div class="col-12 col-md-auto mb-2">
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#createRoleModal">
                Tambah Role
            </button>
        </div>
        <div class="col-12 col-md mb-2">
            <form action="{{ route('role.index') }}" method="GET" class="d-flex">
                <input type="text" class="form-control bg-light border-1 small me-2" placeholder="Cari Role..."
                    name="search" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-search fa-sm"></i>
                </button>
            </form>
        </div>
    </div>

    @if ($roles->count())
        <div class="table-responsive">
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Role</th>
                        <th>Hak Akses</th>
                        <th>Dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $index => $role)
                        <tr>
                            <td>{{ $index + $roles->firstItem() }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @forelse ($role->permissions as $permission)
                                    <span class="badge bg-label-info">{{ $permission->name }}</span>
                                @empty
                                    <span class="text-muted">-</span>
                                @endforelse
                            </td>
                            <td>{{ $role->created_at?->locale('id')->translatedFormat('d F Y') }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('role.edit', $role) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Ubah
                                        </a>
                                        <form action="{{ route('role.destroy', $role) }}" method="POST">
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
            {{ $roles->links('pagination::bootstrap-4') }}
        </div>
    @else
        <div class="alert alert-light text-center" role="alert">
            Tidak ada data!
        </div>
    @endif
</div>

<!-- Modal Tambah Role -->
<div class="modal fade" id="createRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('role.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label">Nama Role <span class="text-danger">*</span></label>
                <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" placeholder="Nama role">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <hr>
                <label class="form-label">Hak Akses</label>
                <div class="row">
                    @foreach ($permissions as $permission)
                        <div class="col-md-4 mb-2">
                            <label class="form-check">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                    class="form-check-input">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('permissions')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
