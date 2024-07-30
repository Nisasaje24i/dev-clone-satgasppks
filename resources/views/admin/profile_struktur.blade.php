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
    @include('admin/header')
    <!-- isi content -->
    <section></section>
    <section style="height: 100vh; justify-content: center; align-items: center; margin-left:18vh">
        <div>
            <div class="row justify-content-between" style="margin-bottom: 10px;">
                <div class="col-md-3">
                    <h3>Profile Struktur Organisasi</h3>
                </div>
                <div class="col-md-2" style="margin-right: 15px;">
                    <button class="btn btn-primary" data-bs-toggle="modal" onclick="tambahStruktur()">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Tambah
                    </button>
                </div>
            </div>
            <div class="col-lg-11">
                <table style="width: 100%; border-collapse: collapse; border: 1px solid #828282; text-align:center">
                    <tr style="padding: 8px; background-color:blue; color:white;">
                        <th style="border: 1px solid #828282;">ID</th>
                        <th style="border: 1px solid #828282;">Deskripsi</th>
                        <th style="border: 1px solid #828282;">Visi</th>
                        <th style="border: 1px solid #828282;">Misi</th>
                        <th style="border: 1px solid #828282;">Gambar Struktur</th>
                        <th style="border: 1px solid #828282;">Gambar Lembaga</th>
                        <th style="border: 1px solid #828282;">Aksi</th>
                    </tr>
                    @foreach($struktur_organisasi as $str)
                    <tr>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $str->id }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $str->deskripsi }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $str->visi }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $str->misi }}</td>
                        <td style="width: 10%; border: 1px solid #828282; padding: 8px;">
                            <img src="{{ asset('images/' . $str->gambar_struktur) }}" alt="Gambar Petugas" style="max-width: 100px;">
                        </td>
                        <td style="width: 10%; border: 1px solid #828282; padding: 8px;">
                            <img src="{{ asset('images/' . $str->gambar_profile) }}" alt="Gambar Petugas" style="max-width: 100px;">
                        </td>
                        <td style="border: 1px solid #828282; padding: 8px;">
                            <button class="btn btn-sm edit-btn" style="background-color:yellow;" data-bs-toggle="modal" onclick="editStruktur('{{ $str->id }}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form class="d-inline" id="deleteForm-{{ $str->gambar_struktur }}" action="{{ url('struktur_organisasi/'. $str->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm" style="background-color:red;" onclick="confirmDelete('{{ $str->id }}')">
                                    <i class="fa fa-trash" aria-hidden="true" style="color: white;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
    <div class="modal fade" id="tambahStruktur" tabindex="-1" aria-labelledby="modalStruktur" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalStruktur">Tambah Profile Struktur Organisasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formStruktur" action="{{ route('tambah.datastruktur') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2 row">
                            <label for="nama" class="col-sm-4 col-form-label">Deskripsi</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="deskripsi" name="deskripsi">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="visi" class="col-sm-4 col-form-label">Visi</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="visi" name="visi">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="misi" class="col-sm-4 col-form-label">Misi</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="misi" name="misi">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="gambar_struktur" class="col-sm-4 col-form-label">Upload Gambar Struktur</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" id="gambar_struktur" name="gambar_struktur" onchange="previewImage('struktur')">
                                <img id="preview_struktur" style="max-width:100%; margin-top:10px;display:none" />
                                <input type="hidden" id="old_image1" name="old_image1" value="">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="gambar_profile" class="col-sm-4 col-form-label">Upload Gambar Profile</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" id="gambar_profile" name="gambar_profile" onchange="previewImage('profile')">
                                <img id="preview_profile" style="max-width:100%; margin-top:10px;display:none" />
                                <input type="hidden" id="old_image2" name="old_image2" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-success btn-primary" onclick="simpanStruktur()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
        var isEdit = 0;

        function tambahStruktur() {
            isEdit;
            $('#tambahStruktur').modal('show');
        }

        function previewImage(type) {
            var preview = document.querySelector('#preview_' + type);
            var fileInput = document.querySelector('#gambar_' + type);
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }

        function simpanStruktur() {
            var url;
            var method;

            if (isEdit) {
                url = '{{ route("edit.datastruktur", ":idpeg") }}';
                url = url.replace(':id', $('#id').val());
                method = 'PUT';
            } else {
                url = '{{ route("tambah.datastruktur") }}';
                method = 'POST';
            }

            var formData = new FormData(document.getElementById('formStruktur'));

            $.ajax({
                type: method,
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $('#tambahStruktur').modal('hide');
                    window.location.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Berhasil Menambahkan Struktur Baru'
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal Menambahkan Struktur Baru'
                    });
                }
            });
        }
    </script>