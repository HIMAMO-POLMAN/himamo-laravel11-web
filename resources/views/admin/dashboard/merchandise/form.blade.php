@extends('admin.layouts.master')
@section('title', $isEditing ? 'Edit Produk' : 'Tambah Produk')
@section('card', 'Toko Merchandise')
@section('keterangan', $isEditing ? 'Edit Produk' : 'Tambah Produk')
@section('content')
    <div class="card shadow p-3">
        <div class="card-body">
            <form
                action="{{ $isEditing ? route('ekraf.produk.update', $product) : route('ekraf.produk.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if ($isEditing)
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-12 col-md-8 mb-3">
                        <label for="name" class="form-label">Nama produk <span class="text-danger">*</span></label>
                        <input id="name" name="name" value="{{ old('name', $product?->name) }}"
                            class="form-control @error('name') is-invalid @enderror" required maxlength="255">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="sku" class="form-label">SKU (opsional)</label>
                        <input id="sku" name="sku" value="{{ old('sku', $product?->sku) }}"
                            class="form-control @error('sku') is-invalid @enderror" maxlength="100">
                        @error('sku')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="category" class="form-label">Kategori / asal produk</label>
                        <input id="category" name="category" value="{{ old('category', $product?->category) }}"
                            class="form-control @error('category') is-invalid @enderror" maxlength="100">
                        @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="price" class="form-label">Harga (rupiah) <span class="text-danger">*</span></label>
                        <input id="price" name="price" type="number" min="0" step="1"
                            value="{{ old('price', $product?->price) }}"
                            class="form-control @error('price') is-invalid @enderror" required>
                        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea id="description" name="description" rows="4" maxlength="5000"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $product?->description) }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar (JPG, PNG, atau WebP; maks. 4 MB)</label>
                    <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp"
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    @if ($product?->image_path)
                        <img src="{{ $product->image_url }}"
                            alt="Gambar {{ $product->name }}" class="mt-2 rounded" style="max-width: 180px">
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <div id="single-stock-field">
                        <input id="stock" name="stock" type="number" min="0" step="1"
                            value="{{ old('stock', $product?->stock ?? 0) }}"
                            class="form-control @error('stock') is-invalid @enderror">
                        @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="form-text">Gunakan stok tunggal jika produk tidak memiliki variasi.</div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <label class="form-label mb-0">Variasi (opsional)</label>
                        <button class="btn btn-sm btn-outline-primary" type="button" id="add-variant">Tambah variasi</button>
                    </div>
                    <div id="variant-rows">
                        @foreach (old('variants', $variantRows) as $index => $variant)
                            <div class="row g-2 align-items-start mb-2" data-variant-row>
                                <div class="col">
                                    <input name="variants[{{ $index }}][name]" value="{{ $variant['name'] ?? '' }}"
                                        class="form-control" placeholder="Contoh: Ukuran M / Warna Hitam"
                                        maxlength="120" data-variant-name>
                                </div>
                                <div class="col-4 col-md-3">
                                    <input name="variants[{{ $index }}][stock]" value="{{ $variant['stock'] ?? '' }}"
                                        type="number" min="0" class="form-control" placeholder="Stok"
                                        data-variant-stock>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-outline-danger" type="button" data-remove-variant>Hapus</button>
                                </div>
                                @error("variants.$index.name")<div class="text-danger small">{{ $message }}</div>@enderror
                                @error("variants.$index.stock")<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                        @endforeach
                    </div>
                    @error('variants')<div class="text-danger small">{{ $message }}</div>@enderror
                    <div class="form-text">Stok dicatat per variasi; setiap variasi mengikuti harga produk utama.</div>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active"
                        value="1" @checked(old('is_active', $product?->is_active ?? true))>
                    <label class="form-check-label" for="is_active">Tampilkan di katalog publik</label>
                </div>

                @error('is_active')<div class="text-danger small mb-3">{{ $message }}</div>@enderror

                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('ekraf.produk.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">{{ $isEditing ? 'Simpan perubahan' : 'Simpan produk' }}</button>
                </div>
            </form>
        </div>
    </div>

    <template id="variant-template">
        <div class="row g-2 align-items-start mb-2" data-variant-row>
            <div class="col">
                <input name="variants[__INDEX__][name]" class="form-control"
                    placeholder="Contoh: Ukuran M / Warna Hitam" maxlength="120" data-variant-name>
            </div>
            <div class="col-4 col-md-3">
                <input name="variants[__INDEX__][stock]" type="number" min="0" class="form-control"
                    placeholder="Stok" data-variant-stock>
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-danger" type="button" data-remove-variant>Hapus</button>
            </div>
        </div>
    </template>

    @push('scripts')
        <script>
            const variantRows = document.getElementById('variant-rows');
            const singleStockField = document.getElementById('single-stock-field');
            const singleStockInput = document.getElementById('stock');

            function syncVariantInputs() {
                const rows = [...variantRows.querySelectorAll('[data-variant-row]')];
                singleStockField.hidden = rows.length > 0;
                singleStockInput.required = rows.length === 0;

                rows.forEach((row, index) => {
                    row.querySelector('[data-variant-name]').name = `variants[${index}][name]`;
                    row.querySelector('[data-variant-stock]').name = `variants[${index}][stock]`;
                    row.querySelector('[data-variant-name]').required = true;
                    row.querySelector('[data-variant-stock]').required = true;
                });
            }

            document.getElementById('add-variant').addEventListener('click', () => {
                const index = variantRows.querySelectorAll('[data-variant-row]').length;
                const html = document.getElementById('variant-template').innerHTML.replaceAll('__INDEX__', index);
                variantRows.insertAdjacentHTML('beforeend', html);
                syncVariantInputs();
            });

            variantRows.addEventListener('click', (event) => {
                if (event.target.matches('[data-remove-variant]')) {
                    event.target.closest('[data-variant-row]').remove();
                    syncVariantInputs();
                }
            });

            syncVariantInputs();
        </script>
    @endpush
@endsection
