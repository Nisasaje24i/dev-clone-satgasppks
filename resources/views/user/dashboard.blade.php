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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

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
    <section id="stmik">

        <ol class="carousel-indicators" id="stmik-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(assets/img/background-stmik.png); display: flex; justify-content: center; align-items: center; flex-direction: column; height: 120vh;">
                <h4 style="color: white; text-align: center;">SATUAN TUGAS PENCEGAHAN DAN PENANGANAN KEKERASAN SEKSUAL</h4>
                <h4 style="color: white; text-align: center;">STMIK BANDUNG</h4>
                <a href="#" onclick="checkLogin()" class="btn-get-started scrollto" style="margin-top: 10px; color:red; background-color:yellow;">Laporkan!</a>
            </div>
        </div>
    </section>
    @include('main')
    @include('footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        function checkLogin() {
            <?php
            // cek pengguna apakah sudah login atau belum
            $loggedIn = session('id_login');
            ?>

            if ("{{ $loggedIn }}" !== "") {
                // Jika pengguna sudah login, langsung redirect ke halaman "laporkan"
                window.location.href = "/laporkan";
                console.log("User ID Login:", "{{ $loggedIn }}")
            } else {
                // Jika pengguna belum login, tampilkan alert
                showAlert();
            }
        }

        function showAlert() {
            var result = confirm("Anda harus login terlebih dahulu untuk melaporkan.");
            if (result) {
                // ke halaman login
                window.location.href = "/login";
            }
        }
    </script>
</body>

</html>