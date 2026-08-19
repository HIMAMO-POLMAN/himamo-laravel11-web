@extends('admin.layouts.master')
@section('title', 'Data Ketua Himpunan')
@section('card', 'Ketua Himpunan')
@section('keterangan', 'Kelola data riwayat ketua himpunan')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="m-0 font-weight-bold text-primary">Daftar Ketua Himpunan</h5>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bx bx-plus"></i> Tambah Data
        </button>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Foto</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Jabatan</th>
                        <th>Periode</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($leaders as $leader)
                        <tr>
                            <td>{{ $loop->iteration + ($leaders->currentPage() - 1) * $leaders->perPage() }}</td>
                            <td>
                                <img src="{{ $leader->image_url }}" alt="{{ $leader->name }}"
                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                            </td>
                            <td>{{ $leader->name }}</td>
                            <td>{{ $leader->nim ?? '-' }}</td>
                            <td>{{ $leader->position }}</td>
                            <td>{{ $leader->period_start }} s/d {{ $leader->period_end }}</td>
                            <td>
                                @if ($leader->is_active)
                                    <span class="badge bg-success">Tampil</span>
                                @else
                                    <span class="badge bg-secondary">Disembunyikan</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning btn-edit-leader"
                                    data-bs-toggle="modal" data-bs-target="#modalEdit"
                                    data-id="{{ $leader->id }}"
                                    data-name="{{ $leader->name }}"
                                    data-nim="{{ $leader->nim }}"
                                    data-position="{{ $leader->position }}"
                                    data-period-start="{{ $leader->period_start }}"
                                    data-period-end="{{ $leader->period_end }}"
                                    data-linkedin="{{ $leader->linkedin }}"
                                    data-is-active="{{ $leader->is_active ? 1 : 0 }}"
                                    data-image-url="{{ $leader->image_url }}">
                                    Edit
                                </button>
                                <form action="{{ route('ae-leader.destroy', $leader->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="text-center text-muted">Belum ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $leaders->links() }}
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('ae-leader.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="form_type" value="tambah">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Ketua Himpunan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('form_type') === 'tambah' ? old('name') : '' }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control"
                                value="{{ old('form_type') === 'tambah' ? old('nim') : '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" name="position" class="form-control"
                                value="{{ old('form_type') === 'tambah' ? old('position', 'KETUA HIMPUNAN') : 'KETUA HIMPUNAN' }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Periode Mulai</label>
                            <input type="text" name="period_start" class="form-control" placeholder="2025"
                                value="{{ old('form_type') === 'tambah' ? old('period_start') : '' }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Periode Selesai</label>
                            <input type="text" name="period_end" class="form-control" placeholder="2026"
                                value="{{ old('form_type') === 'tambah' ? old('period_end') : '' }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Link LinkedIn (opsional)</label>
                            <input type="url" name="linkedin" class="form-control"
                                value="{{ old('form_type') === 'tambah' ? old('linkedin') : '' }}"
                                placeholder="https://www.linkedin.com/in/...">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Foto (opsional)</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted">Kosongkan jika ingin pakai foto default.</small>
                        </div>
                        <div class="col-md-12 form-check form-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="tambah_is_active"
                                {{ old('form_type') === 'tambah' ? (old('is_active') ? 'checked' : '') : 'checked' }}>
                            <label class="form-check-label" for="tambah_is_active">Tampilkan di halaman utama</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('ae-leader.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="form_type" value="edit">
                <input type="hidden" name="leader_id" id="edit_leader_id" value="{{ old('leader_id') }}">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Ketua Himpunan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" id="edit_name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" id="edit_nim" class="form-control" value="{{ old('nim') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" name="position" id="edit_position" class="form-control" value="{{ old('position') }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Periode Mulai</label>
                            <input type="text" name="period_start" id="edit_period_start" class="form-control" value="{{ old('period_start') }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Periode Selesai</label>
                            <input type="text" name="period_end" id="edit_period_end" class="form-control" value="{{ old('period_end') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Link LinkedIn (opsional)</label>
                            <input type="url" name="linkedin" id="edit_linkedin" class="form-control" value="{{ old('linkedin') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Foto (opsional)</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted d-block">Kosongkan jika tidak ingin mengganti foto.</small>
                            <img id="edit_current_image" src="" style="display:none; margin-top:8px; width:60px; border-radius:6px;">
                        </div>
                        <div class="col-md-12 form-check form-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="edit_is_active"
                                {{ old('is_active') ? 'checked' : '' }}>
                            <label class="form-check-label" for="edit_is_active">Tampilkan di halaman utama</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-edit-leader').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.getElementById('edit_leader_id').value = this.dataset.id;
            document.getElementById('edit_name').value = this.dataset.name;
            document.getElementById('edit_nim').value = this.dataset.nim;
            document.getElementById('edit_position').value = this.dataset.position;
            document.getElementById('edit_period_start').value = this.dataset.periodStart;
            document.getElementById('edit_period_end').value = this.dataset.periodEnd;
            document.getElementById('edit_linkedin').value = this.dataset.linkedin;
            document.getElementById('edit_is_active').checked = this.dataset.isActive === '1';

            const img = document.getElementById('edit_current_image');
            img.src = this.dataset.imageUrl;
            img.style.display = 'inline-block';
        });
    });

    @if ($errors->any() && old('form_type') === 'tambah')
        new bootstrap.Modal(document.getElementById('modalTambah')).show();
    @elseif ($errors->any() && old('form_type') === 'edit')
        new bootstrap.Modal(document.getElementById('modalEdit')).show();
    @endif
});
</script>

@endsection
