@extends('guest.layouts.app')
@section('content')
    <div class="wrap bg-light">
        <div class="parallax3">
            <div class="container pt-4 pb-5">
                <div class="row">
                    <div class="col pt-4">
                        <div class="row slider-text text-center">
                            <h1 class="pt-5 quote"><span>Contact</span> Us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="contact-form">
            <div class="container px-5 py-5">
                <div class="row pb-3">
                    <div class="col-md-3 pt-3">
                        <div class="w-100 text-center">
                            <div class="contact-icon d-flex align-items-center justify-content-center">
                                <i class='text-white bx bxs-map'></i>
                            </div>
                            <div class="pt-4 text">
                                <p><span>Address : </span> Jl.Kanayakan No 21,Dago,Bandung</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 pt-3">
                        <div class="w-100 text-center">
                            <div class="contact-icon d-flex align-items-center justify-content-center">
                                <i class='text-white bx bxs-envelope'></i>
                            </div>
                            <div class="pt-4 text">
                                <p><span>Email : </span> <a target="_blank"
                                        href="mailto:informasihimamo@gmail.com">informasihimamo@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 pt-3">
                        <div class="w-100 text-center">
                            <div class="contact-icon d-flex align-items-center justify-content-center">
                                <i class='text-white bx bxl-instagram-alt'></i>
                            </div>
                            <div class="pt-4 text">
                                <p><span>Instagram : </span> <a target="_blank"
                                        href="https://www.instagram.com/himamo_polman/">@himamo_polman</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 pt-3">
                        <div class="w-100 text-center">
                            <div class="contact-icon d-flex align-items-center justify-content-center">
                                <i class='text-white bx bx-globe'></i>
                            </div>
                            <div class="pt-4 text">
                                <p><span>Website : </span> <a target="_blank"
                                        href="https://himamopolman.org">himamopolman.org</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-5 g-0 contact-wrap">
                    <div class="col-md-5">
                        <div id="map"></div>
                    </div>
                    <div class="col-md-6 formisi">
                        <div class="w-100 p-md-5">
                            <h2 class="quote text-dark mb-4">Contact <span class="judul"> Us </span></h2>
                            <form name="submit-to-google-sheet" class="contactForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label" for="name">Full Name</label>
                                            <input id="input-nama" type="text" class="form-control" name="Name"
                                                id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label" for="email">Email Address</label>
                                            <input id="input-mail" type="email" class="form-control" name="Email"
                                                id="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group pt-3">
                                            <label class="label" for="subject">Subject</label>
                                            <input type="text" class="form-control" name="Subject" id="subject"
                                                placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group pt-3">
                                            <label class="label" for="#">Message</label>
                                            <textarea id="input-pesan" name="Message" class="form-control" id="Message" cols="30" rows="6"
                                                placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group pt-4">
                                            <input onClick="return empty()" type="submit" value="Send Message"
                                                class="btn-kirim btn btn-primary">
                                            <div class="submitting"></div>
                                        </div>
                                        <button class="btn-load btn btn-primary d-none" type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets-guest/js/gmaps.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script type='text/javascript'>
        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        nav.classList.toggle('show')
                        toggle.classList.toggle('bx-x')
                        bodypd.classList.toggle('body-pd')
                        headerpd.classList.toggle('header-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))
        });
    </script>
    <script>
        mybutton = document.getElementById("myBtn");

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        $(window).scroll(function() {
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
    <script type="text/javascript">
        var map;
        $(document).ready(function() {
            map = new GMaps({
                el: '#map',
                lat: -6.877208158946447,
                lng: 107.62017115624813,
            });
            map.addMarker({
                lat: -6.877208158946447,
                lng: 107.62017115624813,
                title: 'Lima',
                infoWindow: {
                    content: '<p class="mapinfo" >HIMAMO HEADQUARTERS @ POLITEKNIK MANUFAKTUR BANDUNG</p>'
                }
            });
        });
    </script>
    <script>
        function empty() {
            var nama;
            var mail;
            var pesan;
            nama = document.getElementById("input-nama").value;
            mail = document.getElementById("input-mail").value;
            pesan = document.getElementById("input-pesan").value;
            if (nama == "") {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please Fill The Form!',
                    icon: 'error',
                    confirmButtonText: 'Back',
                    confirmButtonColor: '#028784'
                })
                return false;
            };
            if (mail == "") {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please Fill The Form!',
                    icon: 'error',
                    confirmButtonText: 'Back',
                    confirmButtonColor: '#028784'
                })
                return false;
            };
            if (pesan == "") {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please Fill The Form!',
                    icon: 'error',
                    confirmButtonText: 'Back',
                    confirmButtonColor: '#028784'
                })
                return false;
            };
        }
    </script>
    <script>
        const scriptURL =
            'https://script.google.com/macros/s/AKfycbwFXMLKZPnDbaLvm-siRDLfSwaBodlmty_F9XvVKv9BKQ-wH836iB6qaEl3MrN1v7nT/exec'
        const form = document.forms['submit-to-google-sheet']
        const kirim = document.querySelector('.btn-kirim');
        const loading = document.querySelector('.btn-load');
        form.addEventListener('submit', e => {
            let formData = new FormData(form);

            e.preventDefault();
            loading.classList.toggle('d-none');
            kirim.classList.toggle('d-none');
            fetch(scriptURL, 
            {
                    method: 'POST',
                    body: formData,
                    cache: "no-store"
                })
                .then(response => response.json()) // Parse JSON response
                .then(data => {
                    console.log("Form data sent successfully:", data); // Log received data
                    Swal.fire({
                        title: 'Success!',
                        text: 'Your Message Has Been Sent',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#028784'
                    });
                    form.reset();
                    loading.classList.toggle('d-none');
                    kirim.classList.toggle('d-none');
                })
                .catch(error => {
                    console.log(error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Do you want to continue',
                        icon: 'error',
                        confirmButtonText: 'Back',
                        confirmButtonColor: '#028784'
                    })
                    form.reset();
                }
            )
        }
    )
    </script>
    <script>
        var moon = document.querySelector('.btn-moon');
        var sun = document.querySelector('.btn-sun');

        document.getElementById("darkSwitch").addEventListener("click", function() {
            moon.classList.toggle('d-none');
            sun.classList.toggle('d-none');
        });
    </script>
    <script>
        var user_button = document.querySelector('.bxs-user-circle');
        var settings_account = document.querySelector('.settings_account');

        user_button.addEventListener("click", function() {
            settings_account.classList.toggle('d-none');
        })
    </script>
@endpush
