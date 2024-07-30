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
    <section></section>
    <!-- Misalkan ini adalah isi dari view user/riwayat_laporan.blade.php -->

    @if($laporan_kekerasan_seksual->isNotEmpty())
    <section style="height: 300vh; margin-left:10vh">
        <div>
            <div class="row justify-content-between" style="margin-bottom: 10px;">
                <div class="col-md-3">
                    <h3>Riwayat Laporan</h3>
                </div>
            </div>
            <div class="col-lg-11">
                <table style="width: 100%; border-collapse: collapse; border: 1px solid #828282; text-align:center">
                    <tr style="padding: 8px; background-color:blue; color:white;">
                        <th style="border: 1px solid #828282;">NO</th>
                        <th style="border: 1px solid #828282;">No Laporan</th>
                        <th style="border: 1px solid #828282;">Nama Lengkap Pelapor</th>
                        <th style="border: 1px solid #828282;">Jenis Identitas Pelapor</th>
                        <th style="border: 1px solid #828282;">Nomor Identitas Pelapor</th>
                        <th style="border: 1px solid #828282;">Nama Lengkap Terlapor</th>
                        <th style="border: 1px solid #828282;">Status Terlapor</th>
                        <!-- <th style="border: 1px solid #828282;">Kategori Laporan Kekerasan</th> -->
                        <th style="border: 1px solid #828282;">Status Laporan</th>
                        <th style="border: 1px solid #828282;">Penanganan</th>
                    </tr>
                    @foreach($laporan_kekerasan_seksual as $laporan_ks)
                    <tr>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $loop->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->no_laporan }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->nama_lengkap_pelapor }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->jenis_identitas_pelapor }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->nomor_identitas_pelapor }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->nama_lengkap_terlapor }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->status_terlapor }}</td>
                        <!-- <td style="border: 1px solid #828282; padding: 8px;">
                            @if($laporan_ks->total_bobot >= 0 && $laporan_ks->total_bobot <= 0.65) Golongan Berat @elseif($laporan_ks->total_bobot >= 0.66 && $laporan_ks->total_bobot <= 1) Golongan Ringan @else Undefined @endif </td> -->
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->status_laporan }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->penanganan }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
    @else
    <section style="height: 60vh; display: flex; justify-content: center; align-items: center;">
        <div>
            <h3>Tidak Ada Riwayat Laporan</h3>
        </div>
    </section>
    @endif

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