@extends('admin.layouts.master')
@section('title', 'Role')
@section('card', 'Role')
@section('keterangan', 'Lihat Role')
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
            <div class="col-12 col-md-auto mb-2">
                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                    data-bs-target="#createRoleModal">
                    Tambah Role
                </button>
            </div>
        </div>

        @if ($roles->count())
            <div class="table-responsive">
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Role</th>
                            <th>Permission</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $index => $role)
                            <tr>
                                <td>{{ $index + $roles->firstItem() }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge bg-label-info">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $role->created_at?->format('d M Y') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">
                                            Aksi
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('role.edit', $role) }}">Ubah</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('role.destroy', $role) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <button class="dropdown-item text-danger"
                                                        onclick="return confirm('Yakin?')">Hapus</button>
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
                {{ $roles->links('pagination::bootstrap-4') }}
            </div>
        @else
            <div class="alert alert-light text-center">Tidak ada data!</div>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createRoleModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('role.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Nama Role <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <hr>
                    <label class="form-label">Permissions</label>
                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="col-md-4 mb-1">
                                <label class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                        class="form-check-input">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
