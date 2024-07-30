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

    <style>
        /* Additional CSS to center the form */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 20px;
        }

        .form-box {
            background-color: white;
            width: 80%;
            /* Adjust width as needed */
            max-width: 800px;
            /* Adjust max-width as needed */
            border-radius: 10px;
            box-shadow: 0px 0px 20px 5px rgba(169, 169, 169, 0.5);
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- isi content -->
    <section style="height: 100vh;">
        <div class="form-container">
            <div class="form-box">
                <div class="container" style="background-color: blue; height: 7vh; margin-bottom: 20px;">
                    <div class="logo me-auto"><img src="assets/img/logoform.png" alt="" width="50px" style="margin-right: 10px;"><i style="color: white;">FORMULIR PENDAFTARAN MENGIKUTI PROGRAM</i></div>
                </div>
                <form id="formRegistProgram" method="post" action='{{ route("tambah.daftarprogram") }}'>
                    @csrf
                    <div class="col-lg-12 mb-3">
                        <p class="fst-italic">Nama Lengkap Audience *</p>
                        <input type="text" class="form-control" style="border-color: black;" id="nama_audience" name="nama_audience" value="{{$nama}}" readonly>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <p class="fst-italic">Jenis Identitas Audience*</p>
                        <select class="form-select" style="border-color: black;" id="jenis_identitas_audience" name="jenis_identitas_audience">
                            <option value="">Pilih jenis identitas</option>
                            <option value="mahasiswa">KTM</option>
                            <option value="dosen">Kartu Dosen</option>
                            <option value="staff karyawan">Kartu Pegawai</option>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <p class="fst-italic">Nomor Identitas Audience *</p>
                        <input type="text" class="form-control" style="border-color: black;" id="nomor_identitas_audience" name="nomor_identitas_audience" value="{{$id_login}}" readonly>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <p class="fst-italic">Email Audience *</p>
                        <input type="text" class="form-control" style="border-color: black;" id="email_audience" name="email_audience">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <p class="fst-italic">Program Yang Di Ikuti *</p>
                        <input type="text" class="form-control" style="border-color: black;" id="program_diikuti" name="program_diikuti" value="{{$judul}}" readonly>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button id="btnKembali" onclick="kembali()" type="button" style="border-radius:10px; background-color: grey; color: black; border: none; padding: 10px 10px; font-size: 12px; margin-right:5px;">Kembali</button>
                        <button id="btnSelanjutnya" onclick="daftar()" type="button" style="border-radius:10px; background-color: yellow; color: red; border: none; padding: 10px 10px; font-size: 12px;">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
        function kembali() {
            window.location.href = "/program";
        }

        function daftar() {
            var url;
            var method;

            url = '{{ route("tambah.daftarprogram") }}';
            method = 'POST';

            var formData = new FormData(document.getElementById('formRegistProgram'));

            $.ajax({
                type: method,
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Berhasil Mendaftar Di Program Ini!'
                    });
                    window.location.href = "/program";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal Mendaftar. Cobalagi!'
                    });
                    window.location.href = "/program";
                }
            });

        }
    </script>
</body>

</html>