@extends('guest.layouts.app')
@section('content')
    <div class="wrap bg-light">
        <section id="ae-pustaka" class="about bg-light">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('assets-guest/img/img-prodi-d2.webp') }}" width="600px" alt="Building"
                            class="img-cover img-fluid rounded-5 mx-auto d-block" width="500px">
                    </div>
                </div>
            </div>
            <div class="container book-info text-black">
                <div class="row mt-4">
                    <div class="col-12 px-3">
                        <div class="p-3 mb-4 text-dark rounded">
                            <div class="card-body text-start description-card">
                                <h3 class="card-title fw-bold mb-4">D2 Jalur Cepat Teknik Mekatronika</h3>
                                <p class="card-text">Program studi Teknik Mekatronika merupakan program pendidikan Diploma
                                    Dua (D-II) yang menghasilkan lulusan Ahli Muda dengan profil sebagai Senior Operator dan
                                    Junior Technician. (A.Ma.). Program ini bekerja sama dengan SMK dan DUDIKA yang
                                    dilaksanakan selama 3 semester, 1 semester di kampus dan 2 semester magang industri.
                                    Dengan mempelajari teknik rekayasa mesin, elektro, dan komputer sehingga lulusannya
                                    mampu melakukan pengetesan dan kalibrasi mesin agar dapat meningkatkan produksi barang.
                                    Selain itu, lulusannya pun diharapkan mampu mencermati proses produksi, membuat laporan
                                    operasi, dan menyajikan laporan teknik, serta dapat bertanggung jawab pada perawatan
                                    mesin dan elektrik dalam lingkup pengoperasian, perawatan, pengoordinasian, dan
                                    pemantauan untuk memastikan setiap elemen mesin dapat digunakan dengan tepat.</p>
                                <p>Program ini merupakan hasil kerjasama dengan SMK yang telah menjadi mitra Polman Bandung
                                    sebagai akselerasi peningkatan kompetensi lulusan SMK di Indonesia dan hanya dibuka bagi
                                    SMK yang telah bekerjasama dengan Polman Bandung.</p>
                                <p>Adapun SMK Mitra Prodi D2JC Teknik Mekatronika POLMAN:</p>
                                <p>1. SMK Samudra Nusantara Cirebon</p>
                                <p>2. SMKN 1 Cikampek</p>
                                <p>3. SMKN Karangjaya Tasikmalaya</p>
                                <p>4. SMKN 1 Purwakarta</p>
                                <p>5. SMKN 2 Cimahi</p>
                                <p>6. SMK Cendikia Batujajar Kab.Bandung</p>
                                <p>7. SMKN 1 Cileungsi</p>
                                <p>8. SMKN 2 Bandung</p>
                                <p>9. SMK Adi Sanggoro Kab. Bogor</p>
                                <p>10. SMKN 1 Cibinong</p>
                                <a href="https://drive.google.com/drive/folders/1I2hqDn9o81xM8cNGPYZFuT1-_AaDqsts?usp=drive_link"
                                    class="btn btn-primary form-control mt-3" target="_blank">Bahan Ajar D2 Teknik
                                    Mekatronika</a>
                            </div>
                        </div>
                        <div class="container cont-2 px-5 pb-2">
                            <div class="row">
                                <div class="col-md-12 text-center ">
                                    <h3 class="text-dark fw-bold">Lihat lainnya</h3>
                                </div>
                            </div>
                            <div class="row pt-1 pb-4 subject-list ">
                                <div class="col-12 col-md-6 mt-4 col-lg text-center">
                                    <a href="prodi-d4-trmo">
                                        <div class="subject-box bg-light shadow-sm">
                                            <img src="{{ asset('assets-guest/img/trmo_subject.svg') }}" alt="Robotika"
                                                class="subject-image">
                                            <p class="subject-name text-dark fw-bold">D4 Prodi<br>Teknik Rekayasa
                                                Mekatronika</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-md-6 mt-4 col-lg text-center">
                                    <a href="prodi-d4-tro">
                                        <div class="subject-box bg-light shadow-sm">
                                            <img src="{{ asset('assets-guest/img/tro_subject.svg') }}" alt="Robotika"
                                                class="subject-image">
                                            <p class="subject-name text-dark fw-bold">D4 Prodi<br>Teknologi Rekayasa Otomasi
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-md-6 mt-4 col-lg text-center">
                                    <a href="prodi-d4-trin">
                                        <div class="subject-box bg-light shadow-sm">
                                            <img src="{{ asset('assets-guest/img/trin_subject.svg') }}" alt="Robotika"
                                                class="subject-image">
                                            <p class="subject-name text-dark fw-bold">D4 Prodi<br>Teknologi Rekayasa
                                                Informatika Industri</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
