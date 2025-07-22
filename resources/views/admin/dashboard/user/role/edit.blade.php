@extends('admin.layouts.master')
@section('title', 'Edit Role')
@section('card', 'Role')
@section('keterangan', 'Ubah Role dan Permission')
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


<div class="card p-4">
    <form action="{{ route('role.update', $role) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Role</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $role->name) }}" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
@endsection
