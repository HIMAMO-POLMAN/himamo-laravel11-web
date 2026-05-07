document.addEventListener("DOMContentLoaded", function (event) {

    const menuToggle = document.getElementById('menu-toggle');
    const navigationMenu = document.querySelector('.navigation');

    if (menuToggle && navigationMenu) {
        menuToggle.addEventListener('change', function() {
            if (this.checked) {
                navigationMenu.classList.add('is-open'); 
            } else {
                navigationMenu.classList.remove('is-open'); 
            }
        });
    }

    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId);

        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                nav.classList.toggle('show');
                toggle.classList.toggle('bx-x');
                bodypd.classList.toggle('body-pd');
                headerpd.classList.toggle('header-pd');
            });
        }
    };

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');

    const linkColor = document.querySelectorAll('.nav_link');

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink));

    gsap.registerPlugin(ScrollTrigger);

    var wideScreen = window.matchMedia("(min-width: 800px)");
    var narrowScreen = window.matchMedia("(max-width: 799px)");

    gsap.utils.toArray(".gs_reveal").forEach(function (elem) {
        if (wideScreen.matches) {
            hide(elem);
        } else {
            unhide(elem);
        }

        ScrollTrigger.matchMedia({
            "(min-width: 800px)": function () {
                ScrollTrigger.create({
                    trigger: elem,
                    onEnter: function () {
                        animateFrom(elem);
                    },
                    onEnterBack: function () {
                        animateFrom(elem, -1);
                    },
                    onLeave: function () {
                        hide(elem);
                    }
                });
            },
            "(max-width: 799px)": function () {
                ScrollTrigger.saveStyles(".gs_reveal_fromLeft, .gs_reveal_fromRight, .gs_reveal");
            },
            "all": function () {}
        });
    });
});

function getElementHeight(selector) {
    const element = document.querySelector(selector);
    return element ? element.clientHeight : 0;
}

var nav_home = document.querySelector('.nav_list a:nth-child(1)');
var nav_aeinformasi = document.querySelector('.nav_list a:nth-child(2)');
var nav_aepustaka = document.querySelector('.nav_list a:nth-child(3)');
var nav_about = document.querySelector('.nav_list a:nth-child(4)');
var nav_history = document.querySelector('.nav_list a:nth-child(5)');
var nav_divisi = document.querySelector('.nav_list a:nth-child(6)');
var nav_leader = document.querySelector('.nav_list a:nth-child(7)');

var home_value = (getElementHeight('section#home .carousel')) - 100;
var about_value = getElementHeight('section#about .container');
var history_value = getElementHeight('section#history .container');
var division_value = getElementHeight('section#division .container');
var leader_value = getElementHeight('section#leader .container');
var aepustaka_value = getElementHeight('section#ae-pustaka .container');
var aeinformasi_value = getElementHeight('section#ae-informasi .container');

var mybutton = document.getElementById("myBtn");

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

$(document).ready(function () {
    $('.owl-one').owlCarousel({
        autoplay: false,
        margin: 30,
        loop: true,
        nav: true,
        touchDrag: true,
        navText: ["<i class='bx bxs-chevron-left-circle'></i>", "<i class='bx bxs-chevron-right-circle'></i>"],
        autoplaySpeed: 1000,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: { items: 1, center: true, stagePadding: 10, singleItem: true },
            600: { items: 1, center: true, stagePadding: 10 },
            1000: { items: 2, rtl: false, stagePadding: 0 }
        }
    });

    $('.featured-carousel').owlCarousel({
        loop: true,
        touchDrag: true,
        autoplay: false,
        autoplaySpeed: 5000,
        dots: false,
        responsiveClass: true,
        navText: ["<i class='bx bxs-chevron-left-circle'></i>", "<i class='bx bxs-chevron-right-circle'></i>"],
        nav: true,
        responsive: {
            0: { items: 1, center: true, stagePadding: 10, margin: 30, singleItem: true },
            600: { items: 1, center: true, stagePadding: 5 },
            1000: { items: 2, rtl: true, stagePadding: 0, margin: 30 }
        }
    });

    $('.carousel-testimony').owlCarousel({
        center: true,
        loop: true,
        autoplay: false,
        autoplaySpeed: 2000,
        items: 1,
        margin: 30,
        stagePadding: 0,
        nav: false,
        dots: true,
        responsive: {
            0: { items: 1 },
            600: { items: 1 },
            1000: { items: 3 }
        }
    });

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        const header = document.getElementById("header");

        if (scroll > 20) {
            if (mybutton) mybutton.style.display = "block";
            if (header) header.classList.add('bg-light');
        } else {
            if (mybutton) mybutton.style.display = "none";
            if (header) header.classList.remove('bg-light');
        }

        if (document.querySelector('section#home')) {
            if (scroll <= 20) {
                if (nav_home) nav_home.classList.add("active");
                if (nav_about) nav_about.classList.remove("active");
                if (nav_history) nav_history.classList.remove("active");
                if (nav_divisi) nav_divisi.classList.remove("active");
                if (nav_leader) nav_leader.classList.remove("active");
                if (nav_aepustaka) nav_aepustaka.classList.remove('active');
                if (nav_aeinformasi) nav_aeinformasi.classList.remove('active');
            } else if (scroll > home_value && scroll < (home_value + aeinformasi_value)) {
                if (nav_about) nav_about.classList.remove('active');
                if (nav_home) nav_home.classList.remove('active');
                if (nav_history) nav_history.classList.remove('active');
                if (nav_divisi) nav_divisi.classList.remove('active');
                if (nav_leader) nav_leader.classList.remove('active');
                if (nav_aepustaka) nav_aepustaka.classList.remove('active');
                if (nav_aeinformasi) nav_aeinformasi.classList.add('active');
            } else if (scroll > (home_value + aeinformasi_value) && scroll < (home_value + aeinformasi_value + aepustaka_value)) {
                if (nav_history) nav_history.classList.remove('active');
                if (nav_about) nav_about.classList.remove('active');
                if (nav_home) nav_home.classList.remove('active');
                if (nav_divisi) nav_divisi.classList.remove('active');
                if (nav_leader) nav_leader.classList.remove('active');
                if (nav_aepustaka) nav_aepustaka.classList.add('active');
                if (nav_aeinformasi) nav_aeinformasi.classList.remove('active');
            } else if (scroll > (home_value + aeinformasi_value + aepustaka_value) && scroll < (home_value + aeinformasi_value + aepustaka_value + about_value)) {
                if (nav_history) nav_history.classList.remove('active');
                if (nav_about) nav_about.classList.add('active');
                if (nav_home) nav_home.classList.remove('active');
                if (nav_divisi) nav_divisi.classList.remove('active');
                if (nav_leader) nav_leader.classList.remove('active');
                if (nav_aepustaka) nav_aepustaka.classList.remove('active');
                if (nav_aeinformasi) nav_aeinformasi.classList.remove('active');
            } else if (scroll > (home_value + aeinformasi_value + aepustaka_value + about_value) && scroll < (home_value + aeinformasi_value + aepustaka_value + about_value + history_value)) {
                if (nav_history) nav_history.classList.add('active');
                if (nav_about) nav_about.classList.remove('active');
                if (nav_home) nav_home.classList.remove('active');
                if (nav_divisi) nav_divisi.classList.remove('active');
                if (nav_leader) nav_leader.classList.remove('active');
                if (nav_aepustaka) nav_aepustaka.classList.remove('active');
                if (nav_aeinformasi) nav_aeinformasi.classList.remove('active');
            } else if (scroll > (home_value + aeinformasi_value + aepustaka_value + about_value + history_value) && scroll < (home_value + aeinformasi_value + aepustaka_value + about_value + history_value + division_value)) {
                if (nav_history) nav_history.classList.remove('active');
                if (nav_about) nav_about.classList.remove('active');
                if (nav_home) nav_home.classList.remove('active');
                if (nav_divisi) nav_divisi.classList.add('active');
                if (nav_leader) nav_leader.classList.remove('active');
                if (nav_aepustaka) nav_aepustaka.classList.remove('active');
                if (nav_aeinformasi) nav_aeinformasi.classList.remove('active');
            } else if (scroll > (home_value + aeinformasi_value + aepustaka_value + about_value + history_value + division_value) && scroll < (home_value + aeinformasi_value + aepustaka_value + about_value + history_value + division_value + leader_value)) {
                if (nav_history) nav_history.classList.remove('active');
                if (nav_about) nav_about.classList.remove('active');
                if (nav_home) nav_home.classList.remove('active');
                if (nav_divisi) nav_divisi.classList.remove('active');
                if (nav_leader) nav_leader.classList.add('active');
                if (nav_aepustaka) nav_aepustaka.classList.remove('active');
                if (nav_aeinformasi) nav_aeinformasi.classList.remove('active');
            } else if (scroll > (home_value + aeinformasi_value + aepustaka_value + about_value + history_value + division_value + leader_value)) {
                if (nav_history) nav_history.classList.remove('active');
                if (nav_about) nav_about.classList.remove('active');
                if (nav_home) nav_home.classList.remove('active');
                if (nav_divisi) nav_divisi.classList.remove('active');
                if (nav_leader) nav_leader.classList.remove('active');
                if (nav_aepustaka) nav_aepustaka.classList.remove('active');
                if (nav_aeinformasi) nav_aeinformasi.classList.remove('active');
            }
        }
    });
});

const counters = document.querySelectorAll('.value');
const speed = 1000;

counters.forEach(counter => {
    const animate = () => {
        const value = +counter.getAttribute('count');
        const data = +counter.innerText;
        const time = value / speed;
        if (data < value) {
            counter.innerText = Math.ceil(data + time);
            setTimeout(animate, 1);
        } else {
            counter.innerText = value;
        }
    };
    animate();
});

var preloader = document.getElementById("loading");

function load() {
    setTimeout(function () {
        var loadingElement = document.getElementById("loading");
        if (loadingElement) {
            loadingElement.style.display = 'none';
        }
        document.body.style.overflow = 'auto';
    }, 1500);
}

function animateFrom(elem, direction) {
    direction = direction | 1;
    var x = 0,
        y = direction * 100;
    if (elem.classList.contains("gs_reveal_fromLeft")) {
        x = -100;
        y = 0;
    } else if (elem.classList.contains("gs_reveal_fromRight")) {
        x = 100;
        y = 0;
    }
    gsap.fromTo(elem, { x: x, y: y, autoAlpha: 0 }, {
        duration: 1.5,
        x: 0,
        y: 0,
        autoAlpha: 1,
        ease: "expo",
        overwrite: "auto"
    });
}

function hide(elem) {
    gsap.set(elem, { autoAlpha: 0 });
}

function unhide(elem) {
    gsap.set(elem, { autoAlpha: 1 });
}