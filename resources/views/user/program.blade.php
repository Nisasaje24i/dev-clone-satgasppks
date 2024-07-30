<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Satuan Tugas Pencegahan dan Penanganan Kekerasan Seksual</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

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
    <!-- <section></section> -->
    <section>
        <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-color:blue; display: flex; justify-content: center; flex-direction: column; height: 13vh;">
                <h1></h1>
                <br>
                <br>
                <div style="margin-top: 5px; font-weight:700; color:white; text-align:center;">Program Kerja Satgas PPKS</div>
            </div>
        </div>
        <section id="doctors" class="doctors section-bg" style=" border-color:aqua">
            <div class="container" data-aos="fade-up">
                <!-- <div class="section-title">
                <br>
                <h4 style="color: white;">Program</h4>
            </div> -->
                <div class="row" style="display: flex; flex-wrap: wrap;">
                    @foreach($programs as $program)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" style="flex-grow: 1; max-width: 25%; height: 100%;">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <!-- Member 1 -->
                                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                                        <div class="member-img">
                                            <img src="{{ asset('images/' . $program->image) }}" class="img-fluid" alt="">
                                            <div class="social">
                                                <a href=""><i class="bi bi-twitter"></i></a>
                                                <a href=""><i class="bi bi-facebook"></i></a>
                                                <a href=""><i class="bi bi-instagram"></i></a>
                                                <a href=""><i class="bi bi-linkedin"></i></a>
                                            </div>
                                        </div>
                                        <div style="color: red; text-align:start; margin-left:5px;">{{ $program->sumber }}</div>
                                        <div class="member-info" style="text-align:start;">
                                            <h6 class="judul-program">{{ $program->judul_program }}</h6>
                                            <span>{{ substr($program->deskripsi_program, 0, 150) }}{{ strlen($program->deskripsi_program) > 100 ? "..." : "" }}</span>
                                            <span>Tanggal Pelaksanaan Program {{ $program->perencanaan_tanggal_program }}</span>
                                        </div>
                                        <div style="text-align:center;">
                                            @if($program->status_program !== 'Terlaksana')
                                            @auth
                                            @if($terdaftar)
                                            <span class="btn btn-sm mt-2" style="color: green; background-color: lightgray;" aria-disabled="true">Anda Sudah Mendaftar</span>
                                            @else
                                            <a href="{{ $program->link_sumber }}" class="btn btn-sm mt-2" style="color: red; background-color: yellow;" target="_blank" data-judul="{{ $program->judul_program }}">Daftar Sekarang!</a>
                                            @endif
                                            @else
                                            @if($terdaftar)
                                            <span class="btn btn-sm mt-2" style="color: green; background-color: lightgray;">Anda Sudah Mendaftar</span>
                                            @else
                                            <a href="#" class="btn btn-sm mt-2" style="color: red; background-color: yellow;" onclick="checkLogin(event)" data-judul="{{ $program->judul_program }}">Daftar Sekarang!</a>
                                            @endif
                                            @endauth
                                            @else
                                            <span class="btn btn-sm mt-2" style="color: white; background-color: green;">Program Selesai</span>
                                            @endif
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
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        function checkLogin(event) {
            event.preventDefault(); // Mencegah aksi default

            var loggedIn = "{{ session('id_login') }}";

            if (loggedIn) {
                // Jika pengguna sudah login, ambil tombol yang diklik dan judul program
                var button = event.currentTarget;
                var judulProgram = button.getAttribute('data-judul');

                console.log("Judul Program yang Dipilih:", judulProgram);

                // Redirect ke halaman "daftar_program" dengan judul program sebagai query string
                window.location.href = "/daftar_program?judul=" + encodeURIComponent(judulProgram);
            } else {
                // Jika pengguna belum login, tampilkan alert dan redirect ke halaman login
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