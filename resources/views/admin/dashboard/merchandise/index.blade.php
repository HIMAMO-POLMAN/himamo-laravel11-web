@extends('admin.layouts.master')
@section('title', 'Kelola Merchandise')
@section('card', 'Toko Merchandise')
@section('keterangan', 'Kelola Produk')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    <div class="card shadow p-3">
        <div class="row mb-3">
            <div class="col-12 col-md-auto mb-2">
                <a href="{{ route('ekraf.produk.create') }}" class="btn btn-primary w-100">Tambah Produk</a>
            </div>
            <div class="col-12 col-md">
                <form method="GET" action="{{ route('ekraf.produk.index') }}" class="row g-2">
                    <div class="col">
                        <input type="search" class="form-control" name="search" placeholder="Cari produk..."
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-auto">
                        <select name="status" class="form-select" aria-label="Filter status">
                            <option value="">Semua status</option>
                            <option value="active" @selected(request('status') === 'active')>Aktif</option>
                            <option value="inactive" @selected(request('status') === 'inactive')>Nonaktif</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-primary" type="submit">Filter</button>
                    </div>
                </form>
            </div>
        </div>

        @if ($products->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>SKU / Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ $product->image_url ?: asset('assets/katalog_assets/all.jpeg') }}"
                                            alt="" width="56" height="56" class="rounded object-fit-cover">
                                        <div>
                                            <strong>{{ $product->name }}</strong>
                                            <div class="small text-muted">{{ $product->slug }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $product->sku ?: '—' }}<br><span class="text-muted">{{ $product->category ?: '—' }}</span></td>
                                <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>
                                    @if ($product->variants->isNotEmpty())
                                        {{ $product->available_stock }} ({{ $product->variants->count() }} variasi)
                                    @else
                                        {{ $product->stock ?? 0 }}
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $product->is_active ? 'bg-label-success' : 'bg-label-secondary' }}">
                                        {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('ekraf.produk.edit', $product) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    @if ($product->is_active)
                                        <form action="{{ route('ekraf.produk.destroy', $product) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Nonaktifkan produk ini? Data produk tetap disimpan.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Nonaktifkan</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center py-3">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        @else
            <div class="alert alert-light text-center mb-0" role="status">Belum ada produk yang sesuai.</div>
        @endif
    </div>
@endsection
