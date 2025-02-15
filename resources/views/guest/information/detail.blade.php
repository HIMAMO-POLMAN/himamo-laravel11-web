@extends('guest.layouts.app')
@section('content')

<div class="wrap bg-light">
    <section>
        <div class="parallax3">
            <div class="container pt-4 pb-5">
                <div class="row">
                    <div class="col pt-4">
                        <div class="row slider-text text-center">
                            <h1 class="pt-5 quote"><span>AE</span> Informasi</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="mb-5 mt-5">
             
                <p>Kategori: {{ $informasi->kategori_informasi->name }}</p>
                <h1 class="text-dark quote text-md-start pt-8">{{ $informasi->title }}</h1>
                <p>Tanggal: {{ date('d/m/Y', strtotime($informasi->created_at)) }}</p>
                <p>Oleh: <img src="{{asset('img/person_icon.svg')}}" alt=""> ({{$informasi->user->name}})</p>
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
              @foreach ($kategori_informasi as $kategori)
              <ul>
                <li><a href="#">{{$kategori->name}} <span>({{count($kategori->informasi)}})</span></a></li>
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
