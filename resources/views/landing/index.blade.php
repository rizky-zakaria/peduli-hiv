<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Consult-app</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('pages/assets/img/doctor.png') }}" rel="icon">
    <link href=" {{ asset('pages/assets/img/apple-touch-icon.png') }} " rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href=" {{ asset('pages/assets/vendor/aos/aos.css') }} " rel="stylesheet">
    <link href=" {{ asset('pages/assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href=" {{ asset('pages/assets/vendor/bootstrap-icons/bootstrap-icons.css') }} " rel="stylesheet">
    <link href=" {{ asset('pages/assets/vendor/boxicons/css/boxicons.min.css') }} " rel="stylesheet">
    <link href=" {{ asset('pages/assets/vendor/glightbox/css/glightbox.min.css') }} " rel="stylesheet">
    <link href=" {{ asset('pages/assets/vendor/swiper/swiper-bundle.min.css') }} " rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href=" {{ asset('pages/assets/css/style.css') }} " rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <style>
        #map {
            height: 380px;
        }
    </style>
    <!-- =======================================================
  * Template Name: Scaffold - v4.7.0
  * Template URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h1><a href="index.html">Peduli-HIV</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li>
                        <a class="nav-link scrollto active" href="#hero">Home</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="#statistik">Statistik</a>
                    </li>
                    <li class="nav-link scrollto">
                        <a href="#about">Tentang Kami</a>
                    </li>
                    <li class="nav-link scrollto">
                        <a href="#alur">Alur</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href=" {{ url('login') }} ">Login</a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                    data-aos="fade-up">
                    <div>
                        <h1>Peduli-HIV</h1>
                        <h2>Aplikasi Konsultasi Untuk Pengidap HIV</h2>
                        <a href=" {{ asset('apps/app-debug.apk') }} " class="btn-get-started scrollto">Get
                            Application</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src=" {{ asset('pages/assets/img/apps.png') }} " class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <section id="statistik" class="services section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Statistik</h2>
                    <p>Kami Melayani Dengan Sepenuh Hati & Akan Memberikan Solusi Terbaik Untuk Anda</p>
                </div>
                {{-- <div id="map"></div> --}}
            </div>
        </section>
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center" data-aos="zoom-in">
                        <span>
                            <b>JUMLAH AKUMULASI KASUS HIV-AIDS</b><br>
                            <b>TAHUN 2001 - 2022</b><br>
                            <b>SUMBER: SEKSI P2PM DINKES PROVINSI GORONTALO</b>
                        </span>
                        <span style="size: 2em">
                            Distribusi HIV-AIDS berdasarkan Tahun Diagnosa <br>
                            di Provinsi Gorontalo Tahun 2001 s/d {{ date('Y') }}
                        </span>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tahun as $item)
                                    <tr>
                                        <td>{{ $item->tahun_lapor }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <span style="size: 2em">
                            Distribusi HIV-AIDS berdasarkan Pekerjaan <br>
                            di Provinsi Gorontalo Tahun 2001 s/d {{ date('Y') }}
                        </span>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Pekerjaan</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pekerjaan as $item)
                                    <tr>
                                        <td>{{ $item->pekerjaan }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-contents-center text-center" data-aos="fade-left">
                        <span>
                            Distribusi HIV-AIDS berdasarkan jenis kelamin <br>
                            di Provinsi Gorontalo Tahun 2001 s/d {{ date('Y') }}
                        </span>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jk as $item)
                                    <tr>
                                        <td>{{ $item->jk }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <span>
                            Distribusi HIV-AIDS berdasarkan Domisili <br>
                            di Provinsi Gorontalo Tahun 2001 s/d 2011
                        </span>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Domisili</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($domisili as $item)
                                    <tr>
                                        <td>{{ $item->domisili }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <span>
                            Distribusi HIV-AIDS berdasarkan Status Pengobatan <br>
                            di Provinsi Gorontalo Tahun 2001 s/d 2011
                        </span>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Status Pengobatan</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fungsional as $item)
                                    <tr>
                                        <td>{{ $item->fungsional }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <span>
                            Distribusi HIV-AIDS berdasarkan Jenis <br>
                            di Provinsi Gorontalo Tahun 2001 s/d 2011
                        </span>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis as $item)
                                    <tr>
                                        <td>{{ $item->jenis }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Features Section ======= -->
        <section id="alur" class="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mt-2 mb-tg-0 order-2 order-lg-1">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item" data-aos="fade-up">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                                    <h4>Buat Akun Anda</h4>
                                    <p>Buat Akun Dengan Mudah Pada Laman Website Kami Tanpa Ribet!</p>
                                </a>
                            </li>
                            <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="100">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                                    <h4>Unduh dan Masuk Pada Aplikasi</h4>
                                    <p>Unduh Aplikasinya Dan Masuk Dengan Akun Yang Telah Anda Daftarkan</p>
                                </a>
                            </li>
                            <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="200">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                                    <h4>Mulai Konsultasi</h4>
                                    <p>Mulai Konsultasikan Keluhan Dan Segala Sesuatu Tentang Gejala HIV</p>
                                </a>
                            </li>
                            <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="300">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                                    <h4>Dapatkan Solusi Terbaik</h4>
                                    <p>Dokter Akan Memberikan Solusi Terbaik Untuk Berdasarkan Konsultasi Anda</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <figure>
                                    <img src="{{ asset('pages/assets/img/daftar.png') }}" alt=""
                                        class="img-fluid">
                                </figure>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <figure>
                                    <img src="{{ asset('pages/assets/img/login.png') }}" alt=""
                                        class="img-fluid">
                                </figure>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <figure>
                                    <img src="{{ asset('pages/assets/img/konsultasi.png') }}" alt=""
                                        class="img-fluid">
                                </figure>
                            </div>
                            <div class="tab-pane" id="tab-4">
                                <figure>
                                    <img src=" {{ asset('pages/assets/img/solusi.png') }} " alt=""
                                        class="img-fluid">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->
        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Consult-app</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/ -->
                    Designed by <a href="https://bisadong.id/">bisadong.id</a>
                </div>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src=" {{ asset('pages/assets/vendor/aos/aos.js') }} "></script>
        <script src=" {{ asset('pages/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
        <script src=" {{ asset('pages/assets/vendor/glightbox/js/glightbox.min.js') }} "></script>
        <script src=" {{ asset('pages/assets/vendor/isotope-layout/isotope.pkgd.min.js') }} "></script>
        <script src=" {{ asset('pages/assets/vendor/swiper/swiper-bundle.min.js') }} "></script>
        <script src=" {{ asset('pages/assets/vendor/php-email-form/validate.js') }} "></script>

        <!-- Template Main JS File -->
        <script src=" {{ asset('pages/assets/js/main.js') }} "></script>

</body>
<script>
    var map = L.map('map').setView([0.71862, 122.45559], 9.46);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '?? OpenStreetMap'
    }).addTo(map);
    var kota = L.marker([0.53333, 123.1]).addTo(map);
    kota.bindPopup("<b>Kota Gorontalo</b><br>270 jiwa").openPopup();
    var bonbol = L.marker([0.50296, 123.27501]).addTo(map);
    bonbol.bindPopup("<b>Kab. Bone Bolango</b><br>300 jiwa").openPopup();
    var pohuwato = L.marker([0.7098, 121.59582]).addTo(map);
    pohuwato.bindPopup("<b>Kab. Pohuwato</b><br>270 jiwa").openPopup();
    var kabgor = L.marker([0.5692733, 122.8084496]).addTo(map);
    kabgor.bindPopup("<b>Kab. Gorontalo</b><br>270 jiwa").openPopup();
    var boalemo = L.marker([0.5728, 122.2337]).addTo(map);
    boalemo.bindPopup("<b>Kab. Boalemo</b><br>270 jiwa").openPopup();
    var gorut = L.marker([0.77, 122.31667]).addTo(map);
    gorut.bindPopup("<b>Kab. Gorontalo Utara</b><br>270 jiwa").openPopup();
</script>

</html>
