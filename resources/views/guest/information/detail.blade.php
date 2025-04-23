
@extends('guest.layouts.app')
@section('content')
<div class="wrap bg-light detail-informasi-body">
    <section>
        <div class="container">
            <div class="mb-5 mt-5">
                <h1 class="text-dark quote text-md-start pt-8">{{ $informasi->title }}</h1>
                <div class="d-flex align-items-center gap-4 flex-wrap mb-3">
                    {{-- <p>Kategori: {{ $informasi->kategori_informasi->name }}</p>
                    <p>Tanggal: {{ date('d/m/Y', strtotime($informasi->created_at)) }}</p>
                    <p>Oleh: <img src="{{asset('img/person_icon.svg')}}" alt=""> ({{$informasi->user->name}})</p> --}}
                    <span class="d-flex align-items-center"><i class="bx bx-category me-2"></i>
                       {{ $informasi->category->name }}</span>
                    <span class="d-flex align-items-center">
                        <i class="bx bx-calendar me-2"></i>
                        {{ \Carbon\Carbon::parse($informasi->created_at)->translatedFormat('d F Y') }}
                    </span>
                    <span class="d-flex align-items-center"><i class="bx bx-user me-2"></i> Oleh:
                        {{ $informasi->user->name ?? 'Ristek Himamo' }}</span>
                </div>
                <div class="d-flex flex-column">
                    <div class="col text-center">
                        <img src="{{ asset('storage/informasi/' . $informasi->image) }}" alt="{{ $informasi->title }}" class="rounded-3 img-fluid" style="height: 300px;">
                    </div>
                    <div class="col detail-information-text mt-5">
                        {!!$informasi->desc!!}
                    </div>
                </div>
            </div>
            <p>Kategori</p>
            <div class="">
              @foreach ($categories as $category)
              <ul>
                <li><a href="#">{{$category->name}} <span>({{$category->information_count}})</span></a></li>
              </ul>
              @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
@push('scripts')
<script>
    mybutton = document.getElementById("myBtn");
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > 20) {
            mybutton.style.display = "block";
            document.getElementById("header").classList.add('bg-light');
        } else {
            mybutton.style.display = "none";
            document.getElementById("header").classList.remove('bg-light');
        }
    })
</script>
<script>
    var moon = document.querySelector('.btn-moon');
    var sun = document.querySelector('.btn-sun');

    document.getElementById("darkSwitch").addEventListener("click", function () {
        moon.classList.toggle('d-none');
        sun.classList.toggle('d-none');
    });
</script>
<script>
    var user_button = document.querySelector('.bxs-user-circle');
    var settings_account = document.querySelector('.settings_account');

    user_button.addEventListener("click", function () {
        settings_account.classList.toggle('d-none');
    })
</script>
@endpush
