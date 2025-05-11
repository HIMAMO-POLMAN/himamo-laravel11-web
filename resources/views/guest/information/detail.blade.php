@extends('guest.layouts.app')
@section('content')
    <div class="wrap bg-light">
        <section id="ae-pustaka" class="about bg-light">
            <div class="container book-info text-black">
                <div class="row mt-4">
                    <div class="col-12 px-3">
                        <div class="p-3 mb-4 text-dark rounded">
                            <div class="card-body text-start description-card">
                                <h3 class="card-title fw-bold mb-2">{{ $informasi->title }}</h3>
                                <div class="d-flex align-items-center gap-4 flex-wrap mb-3">
                                    <span class="d-flex align-items-center"><i class="bx bx-bookmark me-2"></i>
                                        {{ $informasi->category->name }}</span>
                                    <span class="d-flex align-items-center">
                                        <i class="bx bx-calendar me-2"></i>

                                        {{ \Carbon\Carbon::parse($informasi->created_at)->locale('id')->translatedFormat('d F Y') }}
                                    </span>
                                    <span class="d-flex align-items-center"><i class="bx bx-user me-2"></i> Oleh:
                                        {{ $informasi->user->name ?? 'Ristek Himamo' }}</span>
                                </div>
                                <div class="d-flex flex-column">
                                    <img src="{{ asset('storage/' . $informasi->image) }}" alt="Building"
                                        class="img-cover img-fluid d-block mb-4">
                                    <p>{!! $informasi->desc !!}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
