@extends('admin.layouts.master')
@section('title', 'Permission')
@section('card', 'Permission')
@section('keterangan', 'Lihat Permissions')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

<div class="card shadow p-3">
    <div class="row mb-3">
        <div class="col-md-auto mb-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPermissionModal">
                Tambah Permission
            </button>
        </div>
    </div>

    @if ($permissions->count())
        <div class="table-responsive">
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $index => $permission)
                        <tr>
                            <td>{{ $index + $permissions->firstItem() }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->created_at?->format('d M Y') }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">
                                        Aksi
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('permission.edit', $permission) }}">Ubah</a></li>
                                        <li>
                                            <form action="{{ route('permission.destroy', $permission) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item text-danger" onclick="return confirm('Yakin?')">Hapus</button>
                                            </form>
                                        </li>
                                    </ul>
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

<!-- Modal -->
<div class="modal fade" id="createPermissionModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('permission.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label class="form-label">Nama Permission <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
