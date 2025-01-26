@extends('admin.layouts.master')
@section('title', 'Edit AE Pustaka')
@section('card', 'Edit AE Pustaka')
@section('keterangan', 'Edit Pustaka')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="d-flex card shadow p-3">
        <h5 class="card-header">Buat Pustaka</h5>
        <div class="card-body">
            <form action="{{route('ae-pustaka.update', ['libraries' => $pustaka->slug])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="memberNumber" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" id="memberNumber" name="title" value="{{old('title',$pustaka->title)}}" class="form-control @error('title') is-invalid @enderror" placeholder="Masukan Judul" />
                        @error('title')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="name" class="form-label">ISBN</label>
                        <input type="number" id="name" name="isbn" value="{{old('isbn',$pustaka->isbn)}}" class="form-control  @error('isbn') is-invalid @enderror" placeholder="123456" />
                        @error('isbn')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="memberNumber" class="form-label">Penulis</label>
                        <input type="text" id="memberNumber" name="penulis" value="{{old('penulis',$pustaka->penulis)}}" class="form-control @error('penulis') is-invalid @enderror" placeholder="Masukan Nama Penulis" />
                        @error('penulis')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="name" class="form-label">Penerbit</label>
                        <input type="text" id="name" name="penerbit" value="{{old('penerbit',$pustaka->penerbit)}}" class="form-control @error('penerbit') is-invalid @enderror" placeholder="Masukan Penerbit" />
                        @error('penerbit')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="memberNumber" class="form-label">Tahun Terbit</label>
                        <input type="number" id="memberNumber" value="{{old('tahun_terbit',$pustaka->tahun_terbit)}}" name="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" placeholder="Masukan Tahun Terbit" />
                        @error('tahun_terbit')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="name" class="form-label">Bahasa <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="bahasa" value="{{old('bahasa',$pustaka->bahasa)}}" class="form-control @error('bahasa') is-invalid @enderror" placeholder="Masukan Bahasa" />
                        @error('bahasa')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col mb-3">
                    <label for="name" class="form-label">Jumlah Halaman <span class="text-danger">*</span></label>
                    <input type="number" id="name" name="jumlah_halaman" value="{{old('jumlah_halaman',$pustaka->jumlah_halaman)}}" class="form-control @error('jumlah_halaman') is-invalid @enderror" placeholder="Masukan Jumlah Halaman" />
                    @error('jumlah_halaman')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="col mb-3">
                    <label for="name" class="form-label">Cover (URL)</label>
                    <input type="text" id="name" name="cover" value="{{old('cover',$pustaka->cover)}}" class="form-control @error('cover') is-invalid @enderror" placeholder="example : https://contoh.com/nama-url.png" />
                    @error('cover')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="col mb-3">
                    <label for="name" class="form-label">URL Pustaka <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="url" value="{{old('url',$pustaka->url)}}" class="form-control  @error('url') is-invalid @enderror" placeholder="example: https://drive.google.com/file/d/.../view" />
                    @error('url')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
    
                <div class="col mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Koleksi Pustaka <span class="text-danger">*</span></label>
                    <select class="form-select @error('collection') is-invalid @enderror" name="collection" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected>Pilih Koleksi Pustaka</option>
                        <option value="TRO" @if(old('collection',$pustaka->collection) == 'TRO') selected @endif>TRO</option>
                        <option value="TRMO" @if(old('collection',$pustaka->collection) == 'TRMO') selected @endif>TRMO</option>
                        <option value="TRIN" @if(old('collection',$pustaka->collection) == 'TRIN') selected @endif>TRIN</option>
                        <option value="Teori" @if(old('collection',$pustaka->collection) == 'Teori') selected @endif>Teori</option>
                    </select>
                    @error('collection')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
    
                <div class="col mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Abstrak Pustaka <span class="text-danger">*</span></label>
                    <textarea name="abstrak" class="form-control @error('abstrak') is-invalid @enderror" id="summernote" id="exampleFormControlTextarea1" rows="3">{{old('abstrak',$pustaka->abstrak)}}</textarea>
                    @error('abstrak')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Kembali
                </button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
@endsection
