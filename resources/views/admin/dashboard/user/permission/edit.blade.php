@extends('admin.layouts.master')
@section('title', 'Ubah PePermission')
@section('card', 'Permission')
@section('keterangan', 'Ubah Permission')
@section('content')

@include('admin.partials.alert')

    <div class="d-flex card shadow p-3">
        <h5 class="card-header">Ubah Permission</h5>
        <div class="card-body">
    <form action="{{ route('permission.update', $permission) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Permission</label>
            <input type="text" name="name" value="{{ old('name', $permission->name) }}"
                class="form-control @error('name') is-invalid @enderror">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('permission.index') }}" class="btn btn-outline-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
    </div>
@endsection
