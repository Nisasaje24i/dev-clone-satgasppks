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
            </div>
        </div>
        <div class="container" style="margin-top: 20px;">
            <div class="section-title">
                <p style="color: red;  text-align:center; font-size:large;"><i>Laporkan Segala Bentuk Kekerasan Seksual Disini!</i></p><br>
                <div class="container" style="background-color: grey; height:1px"></div>
            </div>
        </div>
        <div class="container" style="background-color: white; height: 120vh; border-radius: 10px; box-shadow: 0px 0px 20px 5px rgba(169, 169, 169, 0.5);">
            <br>
            <div class="container" style="background-color: blue; height: 7vh;">
                <div class="logo me-auto"><img src="assets/img/logoform.png" alt="" width="50px" style="margin-right: 10px;"><i style="color: white;">FORM LAPORAN KEKERASAN SEKSUAL DI STMIK BANDUNG</i></div>
            </div>
            <br>
            <div class="container" style="background-color: white; height: 80vh;">
                <form id="formLaporkan" method="post" action="{{ route('laporkan.next') }}">
                    @csrf
                    <div class="logo me-auto"><img src="assets/img/person.png" alt="" width="40px" style="margin-right: 10px;">
                        <b style="color: black;">IDENTITAS PELAPOR</b>
                    </div>
                    <div class="container" style="background-color: grey; height:1px; margin-top:5px;"></div>
                    <br>
                    <div class="row  justify-content-center">
                        <div class="col-lg-4" style="margin-right:70px;">
                            <div class="form">
                                <div class="col-lg-12">
                                    <p class="fst-italic">Nama Lengkap *</p>
                                    <input type="text" class="form-control" style="border-color: black;" id="nama_lengkap_pelapor" name="nama_lengkap_pelapor" value="{{$nama}}" readonly>
                                </div>
                                <br>
                                <div class="col-lg-12">
                                    <p class="fst-italic">Jenis Identitas *</p>
                                    <select class="form-select" style="border-color: black;" id="jenis_identitas_pelapor" name="jenis_identitas_pelapor">
                                        <option value="">Pilih jenis identitas</option>
                                        <option value="ktm">KTM</option>
                                        <option value="kartudosen">Kartu Dosen</option>
                                        <option value="kartupegawai">Kartu Pegawai</option>
                                        <option value="kartupetugas">Kartu Petugas</option>
                                    </select>
                                </div>
                                <br>
                                <div class="col-lg-12">
                                    <p class="fst-italic">Nomor Identitas *</p>
                                    @php
                                    $numeric_id = preg_replace('/\D/', '', $id_login);
                                    @endphp
                                    <input type="text" class="form-control" style="border-color: black;" id="nomor_identitas_pelapor" name="nomor_identitas_pelapor" value="{{$numeric_id}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form">
                                <div class="col-lg-12">
                                    <p class="fst-italic">No. Handphone *</p>
                                    <input type="text" class="form-control" style="border-color: black;" id="no_hp_pelapor" name="no_hp_pelapor">
                                </div>
                                <br>
                                <div class="col-lg-12">
                                    <p class="fst-italic">NIK *</p>
                                    <input type="text" class="form-control" style="border-color: black;" id="nik" name="nik">
                                </div>
                                <br>
                                <div class="col-lg-12">
                                    <p class="fst-italic">Nama Unit Kerja/Jurusan *</p>
                                    <select class="form-select" style="border-color: black;" id="profesi_pelapor" name="profesi_pelapor">
                                        <option value="">Pilih</option>
                                        <option value="if">Teknik Informatika</option>
                                        <option value="si">Sistem Informasi</option>
                                        <option value="karyawan">Karyawan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container" style="background-color: grey; height:1px; margin-top:5px;"></div>
                    <div class="logo me-auto"><img src="assets/img/person.png" alt="" width="40px" style="margin-right: 10px;">
                        <b style="color: black;">IDENTITAS TERLAPOR</b>
                    </div>
                    <div class="container" style="background-color: grey; height:1px; margin-top:5px;"></div>
                    <br>
                    <div class="row  justify-content-center">
                        <div class="col-lg-4" style="margin-right:70px;">
                            <div class="form">
                                <div class="col-lg-12">
                                    <p class="fst-italic">Nama Lengkap *</p>
                                    <input type="text" class="form-control" style="border-color: black;" id="nama_lengkap_terlapor" name="nama_lengkap_terlapor">
                                </div>
                                <br>
                                <div class="col-lg-12">
                                    <p class="fst-italic">Status Terlapor *</p>
                                    <select class="form-select" style="border-color: black;" id="status_terlapor" name="status_terlapor">
                                        <option value="">Pilih jenis identitas</option>
                                        <option value="Mahasiswa">Mahasiswa</option>
                                        <option value="Staff/Karyawan">Staff/Karyawan</option>
                                        <option value="Dosen">Dosen</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form">
                                <div class="col-lg-12">
                                    <p class="fst-italic">Nomor Identitas *</p>
                                    <input type="text" class="form-control" style="border-color: black;" id="nomor_identitas_terlapor" name="nomor_identitas_terlapor">
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="d-flex justify-content-center">
                        <button id="btnSelanjutnya" onclick="lanjutPage()" type="button" style="border-radius:10px; background-color: yellow; color: red; border: none; padding: 10px 20px; font-size: 16px;">Selanjutnya..</button>
                    </div>
                </form>
            </div>
    </section>

    <!-- End Counts Section -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // document.getElementById("btnSelanjutnya").addEventListener("click", function() {

        //     window.location.href = "{{ route('laporkan.next') }}";
        // });


        // function lanjutPage() {
        //     var url;
        //     var method;

        //     url = '{{ route("laporkan.next") }}';
        //     method = 'POST';

        //     var formData = new FormData(document.getElementById('formLaporkan'));

        //     $.ajax({
        //         type: method,
        //         url: url,
        //         data: formData,
        //         contentType: false,
        //         processData: false,
        //         success: function(response) {
        //             console.log(response);
        //             Swal.fire({
        //                 icon: 'success',
        //                 title: 'Sukses!',
        //                 text: 'Berhasil Menambahkan Identitas'
        //             });
        //             window.location.href = "{{ route('laporkan.next') }}";
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(xhr.responseText);
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Gagal',
        //                 text: 'Gagal Menambahkan Identitas'
        //             });
        //         }
        //     });
        // }

        function lanjutPage() {
            var formData = new FormData(document.getElementById('formLaporkan'));
            console.log('bbbbb');
            console.log(formData);
            var url = "{{ route('laporkan.next') }}";

            // Tambahkan data ke URL
            var params = new URLSearchParams(formData).toString();
            window.location.href = url + '?' + params;
        }
    </script>
</body>

</html>