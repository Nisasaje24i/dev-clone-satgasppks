<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Satuan Tugas Pencegahan dan Penanganan Kekerasan Seksual</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ ('assets/img/favicon.png') }}" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Medicio
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @include('topbar')
    @include('header')
    <!-- isi content -->
    <section>
        <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-color:blue; display: flex; justify-content: center; flex-direction: column; height: 13vh;">
                <h1></h1>
                <br>
                <br>
                <div style="margin-top: 5px; font-weight:700; color:white; text-align:center;">Artikel</div>
            </div>
        </div>
        <section id="doctors" class="doctors section-bg" style=" border-color:aqua; margin-left: 20px;">
            <div class="row">
                @foreach($artikels as $artikel)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!-- Member 1 -->
                                <div class="member" data-aos="fade-up" data-aos-delay="100">
                                    <div class="member-img">
                                        <img src="{{ asset('images/' . $artikel->image) }}" class="img-fluid" alt="">
                                        <div class="social">
                                            <a href=""><i class="bi bi-twitter"></i></a>
                                            <a href=""><i class="bi bi-facebook"></i></a>
                                            <a href=""><i class="bi bi-instagram"></i></a>
                                            <a href=""><i class="bi bi-linkedin"></i></a>
                                        </div>
                                    </div>
                                    <div style="color: red; text-align:start; margin-left:5px;">{{ $artikel->sumber }}
                                    </div>
                                    <div class="member-info" style="text-align:start;">
                                        <h6>{{ $artikel->judul_artikel }}</h6>
                                        <span>{{ substr($artikel->deskripsi_artikel, 0, 100) }}{{ strlen($artikel->deskripsi_artikel) > 100 ? "..." : "" }}</span>
                                    </div>
                                    <div style="text-align:center;">
                                        <a href="{{ $artikel->link_sumber }}" class="btn btn-sm mt-2" style="color: red; background-color: yellow;" target="_blank">Detail Artikel..</a>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <!-- Add more swiper-slide divs for additional members if needed -->
                    </div>
                    <!-- Add pagination if needed -->
                    <div class="swiper-pagination"></div>
                </div>
                @endforeach
            </div>
            </div>
        </section>
    </section>
    <!-- end isi content -->
    @include('footer')
    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>