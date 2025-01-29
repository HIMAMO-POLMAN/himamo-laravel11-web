<main>
    @yield('content')
    <footer class="footer">
        <div class="container px-5">
            <div class="row">
                <div class="col-md pt-5 text-md-start">
                    <img src="{{ asset('assets-guest/img/logo.png') }}" alt="Logo HIMAMO">
                    <p class="text-white pt-3">HIMAMO merupakan himpunan pertama yang didirikan di kampus Politeknik Manufaktur Negeri Bandung.</p>
                    <ul class="footer-social list-unstyled pt-1">
                        <li>
                            <a class="ig" target="_blank" href="https://www.instagram.com/himamo_polman/">
                                <i class='text-white bx bxl-instagram'></i>
                            </a>
                        </li>
                        <li>
                            <a class="yt" target="_blank" href="https://www.youtube.com/channel/UC0ZEfY5moa9gWIIksG3aflw">
                                <i class='text-white bx bxl-youtube'></i>
                            </a>
                        </li>
                        <li>
                            <a class="email" target="_blank" href="mailto:Officialhimamo@gmail.com">
                                <i class='text-white bx bxs-envelope'></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md pt-5 text-md-start">
                    <h4 class="text-white quote">Helpful Links</h4>
                    <ul class="list-unstyled pt-1 text-white">
                        <li>
                            <div class="row">
                                <div class="col-icon">
                                    <i class='pe-3 footericon bx bx-globe'></i>
                                </div>
                                <div class="col-tulisan">
                                    <a target="_blank" href="http://ae.polman-bandung.ac.id/" class="ps-2 text-white d-inline-block">
                                        Website Jurusan AE
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row pt-2">
                                <div class="col-icon">
                                    <i class='pe-3 footericon bx bx-globe'></i>
                                </div>
                                <div class="col-tulisan">
                                    <a target="_blank" href="https://polman-bandung.ac.id/" class="ps-2 text-white d-inline-block">
                                        Website POLMAN
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row pt-2">
                                <div class="col-icon">
                                    <i class='pe-3 footericon bx bx-sitemap'></i>
                                </div>
                                <div class="col-tulisan">
                                    <a target="_blank" href="https://himamo.org/assets/images/organigram/himamo-24.jpg" class="ps-2 text-white d-inline-block">
                                        Organigram Himamo
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md pt-5 text-md-start">
                    <h4 class="text-white quote">Have a Question?</h4>
                    <ul class="list-unstyled pt-1 text-white">
                        <li>
                            <div class="row">
                                <div class="col-icon">
                                    <i class='pe-3 footericon bx bxs-map-alt'></i>
                                </div>
                                <div class="col-tulisan">
                                    <p class="ps-2">
                                        Jl.Kanayakan No 21, Dago, Bandung
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-icon">
                                    <i class='pe-3 footericon bx bxs-envelope'></i>
                                </div>
                                <div class="col-tulisan">
                                    <p class="ps-2">
                                        Officialhimamo@gmail.com
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-icon">
                                    <i class='pe-3 footericon bx bx-globe'></i>
                                </div>
                                <div class="col-tulisan">
                                    <p class="ps-2">
                                        Himamo.org
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- <div class="credit py-2">
            <div class="container pt-3 px-5">
                <p>Copyright © 2017 - 2024 All rights reserved | Made with <span><i class='bx bxs-heart'></i></span> by <span class="text-white">KOMINFO & INFORMATION Division</span></p>
            </div>
        </div> --}}
    </footer>
</main>
