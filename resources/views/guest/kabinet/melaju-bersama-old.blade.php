@extends('guest.layouts.app')

@section('content')

{{-- Page-specific Fonts and Styles --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
<style>
    .kabinet-melaju-bersama-page {
        font-family: 'Open Sans', sans-serif;
    }
    .kabinet-melaju-bersama-page h1,
    .kabinet-melaju-bersama-page h2,
    .kabinet-melaju-bersama-page h3,
    .kabinet-melaju-bersama-page h4,
    .kabinet-melaju-bersama-page h5,
    .kabinet-melaju-bersama-page h6,
    .kabinet-melaju-bersama-page .card-title {
        font-family: 'Poppins', sans-serif;
    }
    .kabinet-melaju-bersama-page .lead,
    .kabinet-melaju-bersama-page .card-text,
    .kabinet-melaju-bersama-page .list-unstyled {
        font-family: 'Open Sans', sans-serif;
    }
</style>

<div class="kabinet-melaju-bersama-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center py-5" style="background-image: url('https://via.placeholder.com/1920x400'); background-size: cover; background-position: center;">
                <h1 class="text-white display-4">Kabinet Melaju Bersama 2025/2026</h1>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h2>Penjelasan Umum Kabinet</h2>
                <p class="lead">"Melaju Bersama" bukan sekadar nama, tetapi representasi visi besar sebuah perjalanan kolektif dalam himpunan ini. Filosofi ini lahir dari keyakinan bahwa perubahan yang berarti tidak dibangun oleh satu langkah individu, tetapi oleh banyak langkah kecil yang bergerak seirama dalam satu tujuan besar dengan satu faham dan satu pemikiran. Kabinet ini hadir untuk merangkul keberagaman, menyatukan potensi, dan mengajak seluruh anggota himpunan untuk tidak hanya menjadi penonton perubahan, tetapi menjadi bagian dari mereka yang menciptakan sejarah dan membawanya melaju menuju masa depan yang lebih baik.</p>
            </div>
        </div>
    </div>

    <div class="container py-5" style="background-color: #f0f8f0;">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title text-center">Visi</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title text-center">Misi</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex. Proin vitae magna sit amet enim tincidunt finibus.</p>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <h3>Makna Logo/Slogan</h3>
            </div>
        </div>
        <div class="row mt-4 d-flex align-items-center">
            <div class="col-md-7">
                <ul class="list-unstyled">
                    <li><strong>5 Petir:</strong><br>Merepresentasikan 5 bidang pada Himamo. Ditempatkan di belakang kepala mammoth sebagai simbol bahwa lima bidang ini, atau kabinet ini, akan melaju Bersama.</li>
                    <li class="mt-3"><strong>Sudut 95°:</strong><br>Sudut 95° berasal dari tahun berdirinya HIMAMO, yaitu 1995.</li>
                    <li class="mt-3"><strong>Arah:</strong><br>Arah ke atas kanan merepresentasikan bahwa kabinet ini akan membawa peningkatan dan kemajuan bagi Himamo.</li>
                </ul>
            </div>
            <div class="col-md-5">
                <img src="{{ asset('assets-guest/img/kabinet/logo-kabinet-melaju-bersama.png') }}" alt="Makna Logo" class="img-fluid mx-auto d-block" style="max-width: 300px;">
            </div>
        </div>
    </div>

    <div class="container py-5" style="background-color: #f0f8f0;">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs justify-content-center" id="kabinetTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="organigram-tab" data-bs-toggle="tab" data-bs-target="#organigram" type="button" role="tab" aria-controls="organigram" aria-selected="true">Struktur Organigram</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="bidang-tab" data-bs-toggle="tab" data-bs-target="#bidang" type="button" role="tab" aria-controls="bidang" aria-selected="false">Penjelasan Bidang</button>
                    </li>
                </ul>
                <div class="tab-content mt-4" id="kabinetTabContent">
                    <div class="tab-pane fade show active" id="organigram" role="tabpanel" aria-labelledby="organigram-tab">
                        <div class="text-center">
                            <img src="{{ asset('assets-guest/img/kabinet/struktur-organigram-melaju-bersama.png') }}" alt="Struktur Organigram" class="img-fluid">
                        </div>
                        <div class="row text-center mt-4">
                            <div class="col-md-4">
                                <h4>Fungsional</h4>
                                <p class="lead">25 orang</p>
                            </div>
                            <div class="col-md-4">
                                <h4>Staff Ahli</h4>
                                <p class="lead">214 orang</p>
                            </div>
                            <div class="col-md-4">
                                <h4>Staff Muda</h4>
                                <p class="lead">289 orang</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="bidang" role="tabpanel" aria-labelledby="bidang-tab">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <div class="mb-4">
                                    <h4>Bidang 1: Kaderisasi dan Pengembangan Sumber Daya Mahasiswa</h4>
                                    <p>Bidang KPSDM bertanggung jawab dalam membina, membentuk, dan mengembangkan sumber daya mahasiswa yang ada di himpunan. Kaderisasi bertugas dalam proses pembentukan kader dan regenerasi anggota himpunan, sehingga setiap anggota memiliki pemahaman yang mendalam tentang himpunan. PSDM berperan dalam mengoptimalkan potensi anggota himpunan melalui berbagai program peningkatan kompetensi serta sistem apresiasi yang berbasis capaian dan kontribusi.</p>
                                </div>
                                <div class="mb-4">
                                    <h4>Bidang 2: Tata Kelola Internal</h4>
                                    <p>Bertanggung Jawab dalam mengatur, mengelola, dan memastikan bahwa setiap anggota himpunan berperan aktif dalam setiap kegiatan internal himpunan dan hubungan antar anggota himpunan terjalin erat dan harmonis. Serta memiliki peran penting dalam menjaga stabilitas, efektivitas, dan profesionalisme setiap anggota himpunan. Dimana bidang 2 ini menaungi divisi Hubungan Dalam dan Sarana Prasarana.</p>
                                    <ul class="ms-4">
                                        <li><strong>Hubungan Dalam:</strong> Divisi Hubungan Dalam merupakan fondasi dari keberhasilan dan keberlanjutan suatu organisasi, tujuan utama yaitu memfasilitasi untuk kegiatan internal dan menjadikan HIMAMO sebagai tempat yang nyaman dan aman dengan nuansa kekeluargaan di dalamnya.</li>
                                        <li><strong>Sarana Prasarana:</strong> Divisi yang memiliki tugas untuk memfasilitasi segala sesuatu terkait alat-alat serta barang-barang yang dimiliki oleh himpunan.</li>
                                    </ul>
                                </div>
                                <div class="mb-4">
                                    <h4>Bidang 3: Tata Kelola Eksternal</h4>
                                    <p>Bertugas mengoptimalkan hubungan eksternal organisasi dengan pemangku kepentingan serta meningkatkan kontribusi sosial melalui dua divisi:</p>
                                    <ul class="ms-4">
                                        <li><strong>Divisi Relasi Organisasi:</strong> yang fokus pada membangun jaringan, kemitraan, dan komunikasi dengan instansi</li>
                                        <li><strong>Divisi Pengabdian Masyarakat:</strong> yang merancang dan melaksanakan program sosial berbasis kebutuhan masyarakat, seperti edukasi, kesehatan, dan lingkungan, sekaligus mengevaluasi dampaknya.</li>
                                    </ul>
                                    <p>Kedua divisi bersinergi dengan memanfaatkan relasi eksternal untuk mendukung pengabdian masyarakat, memastikan organisasi memiliki reputasi positif dan dampak nyata di tingkat lokal maupun nasional.</p>
                                </div>
                                <div class="mb-4">
                                    <h4>Bidang 4: Media Informasi Kreatif</h4>
                                    <p>Bertugas mengelola arus informasi organisasi serta mendorong inovasi ekonomi kreatif melalui dua divisi:</p>
                                    <ul class="ms-4">
                                        <li><strong>Divisi Media dan Informasi:</strong> berfokus pada penyebaran informasi, pengelolaan media sosial, publikasi, serta menjaga citra dan komunikasi pada organisasi.</li>
                                        <li><strong>Divisi Ekonomi Kreatif:</strong> merancang dan mengembangkan usaha kreatif berbasis inovasi, kewirausahaan, dan digitalisasi.</li>
                                    </ul>
                                    <p>Kedua divisi bersinergi dengan memanfaatkan platform media untuk mendukung pengembangan ekonomi kreatif, memastikan organisasi memiliki visibilitas yang kuat serta kontribusi nyata dalam ekosistem digital dan kewirausahaan</p>
                                </div>
                                <div class="mb-4">
                                    <h4>Bidang 5: Pengelola Program Kerja</h4>
                                    <p>Bidang 5 bertanggung jawab atas perencanaan, pengelolaan, dan evaluasi program kerja HIMAMO. Di dalamnya, terdapat:</p>
                                    <ul class="ms-4">
                                        <li><strong>Kajian Strategis,</strong> merupakan divisi yang bertugas menganalisis, mengevaluasi dan memfilter program kerja yang ada di himamo</li>
                                        <li><strong>Time Liner,</strong> yang berfungsi sebagai panduan jadwal pelaksanaan program agar berjalan sesuai rencana dan target yang ditetapkan.</li>
                                    </ul>
                                    <p>Dengan adanya kedua aspek ini, Bidang 5 memastikan bahwa setiap program kerja disusun dengan dasar analisis yang matang serta memiliki tahapan pelaksanaan yang jelas dan terstruktur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
