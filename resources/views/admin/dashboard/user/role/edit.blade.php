@extends('admin.layouts.master')
@section('title', 'Ubah Role')
@section('card', 'Role')
@section('keterangan', 'Ubah Role dan Permission')
@section('content')

    @include('admin.partials.alert')

    <div class="d-flex card shadow p-3">
        <h5 class="card-header">Ubah Role</h5>
        <div class="card-body">
            <form action="{{ route('role.update', $role) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Role</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $role->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Permissions</label>
                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="col-md-4 mb-1">
                                <label class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                        class="form-check-input"
                                        {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('role.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
