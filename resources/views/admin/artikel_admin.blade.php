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
    <section style="height: 500vh; justify-content: center; align-items: center; margin-left:16vh">
        <div>
            <div class="row justify-content-between" style="margin-bottom: 10px;">
                <div class="col-md-3">
                    <h3>Artikel</h3>
                </div>
                <div class="col-md-2" style="margin-right: 15px;">
                    <button class="btn btn-primary" data-bs-toggle="modal" onclick="tambahArtikel()">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Tambah
                    </button>
                </div>
            </div>
            <div class="col-lg-11">
                <table style="width: 100%; border-collapse: collapse; border: 1px solid #828282; text-align:center; table-layout: fixed;">
                    <tr style="padding: 8px; background-color:blue; color:white;">
                        <th style="width: 5%; border: 1px solid #828282;">NO</th>
                        <th style="width: 5%; border: 1px solid #828282;">No Artikel</th>
                        <th style="width: 15%; border: 1px solid #828282;">Judul Artikel</th>
                        <th style="width: 35%; border: 1px solid #828282;">Deskripsi Artikel</th>
                        <th style="width: 15%; border: 1px solid #828282;">Sumber Artikel</th>
                        <th style="width: 10%; border: 1px solid #828282;">Link Artikel</th>
                        <th style="width: 10%; border: 1px solid #828282;">Image</th>
                        <th style="width: 5%; border: 1px solid #828282;">Aksi</th>
                    </tr>
                    @foreach($artikels as $artikel)
                    <tr>
                        <td style="width: 5%; border: 1px solid #828282; padding: 8px;">{{ $loop->iteration }}</td>
                        <td style="width: 10%; border: 1px solid #828282; padding: 8px;">{{ $artikel->no_artikel }}</td>
                        <td style="width: 15%; border: 1px solid #828282; padding: 8px; text-align: left;">{{ $artikel->judul_artikel }}</td>
                        <td style="width: 30%; border: 1px solid #828282; padding: 8px; text-align: left; word-wrap: break-word;">{{ $artikel->deskripsi_artikel }}</td>
                        <td style="width: 15%; border: 1px solid #828282; padding: 8px;">{{ $artikel->sumber}}</td>
                        <td style="width: 20%; border: 1px solid #828282; padding: 8px; text-align: left; word-wrap: break-word;">{{ $artikel->link_sumber }}</td>
                        <td style="width: 10%; border: 1px solid #828282; padding: 8px;">
                            <img src="{{ asset('images/' . $artikel->image) }}" alt="Gambar Artikel" style="max-width: 100px;">
                        </td>
                        <td style="width: 5%; border: 1px solid #828282; padding: 8px; ">
                            <button class="btn btn-sm edit-btn" style="background-color:yellow; margin-bottom:10px;" data-bs-toggle="modal" onclick="editArtikel('{{ $artikel->no_artikel }}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form class="d-inline" id="deleteForm-{{ $artikel->no_artikel }}" action="{{ url('artikel/'. $artikel->no_artikel) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm" style="background-color:red;" onclick="confirmDelete('{{ $artikel->no_artikel }}')">
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
    <div class="modal fade" id="tambahArtikelModal" tabindex="-1" aria-labelledby="modalArtikel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalArtikel">Tambah Artikel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formArtikel" action="{{ route('tambah.dataartikel') }}">
                        @csrf
                        <div class="mb-2 row">
                            <label for="no_ar" class="col-sm-3 col-form-label">No Artikel</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="no_artikel" name="no_artikel" readonly>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="judul" class="col-sm-3 col-form-label">Judul Artikel</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="judul_artikel" name="judul_artikel">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi Artikel</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="deskripsi_artikel" name="deskripsi_artikel" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="sumber_artikel" class="col-sm-3 col-form-label">Sumber Artikel</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="sumber" name="sumber">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="link" class="col-sm-3 col-form-label">Link Sumber</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="link_sumber" name="link_sumber">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="inputImage" class="col-sm-3 col-form-label">Upload Gambar Artikel</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                                <!-- Tambahan: elemen gambar untuk menampilkan pratinjau gambar -->
                                <img id="preview" style="max-width:100%; margin-top:10px;display:none" />

                                <!-- Tambahkan input hidden untuk menyimpan path gambar lama -->
                                <input type="hidden" id="old_image" name="old_image" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-success btn-primary" onclick="simpanArtikel()">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

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
        var isEdit = 0;

        function getLatestArticleNumber() {
            var lastArticleNumber = $('td:nth-child(2)').last().text();
            var newNo = lastArticleNumber.substr(2);
            newNo = parseInt(newNo) + 1;
            newNo = newNo.toString().padStart(2, '0');
            return newNo;
        }

        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('input[type=file]').files[0];
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

        function clearImagePreview() {
            var preview = document.querySelector('#preview');
            preview.src = '';
            preview.style.display = 'none';
        }

        function tambahArtikel() {
            isEdit;
            clear();
            clearImagePreview();
            $('#no_artikel').val(getLatestArticleNumber());
            $('#tambahArtikelModal').modal('show');
        }

        function simpanArtikel() {
            var url;
            var method;

            if (isEdit) {
                url = '{{ route("edit.dataartikel", ":no_artikel") }}';
                url = url.replace(':no_artikel', $('#no_artikel').val());
                method = 'POST';
            } else {
                url = '{{ route("tambah.dataartikel") }}';
                method = 'POST';
            }

            var formData = new FormData(document.getElementById('formArtikel'));

            $.ajax({
                type: method,
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $('#tambahArtikelModal').modal('hide');
                    window.location.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Berhasil Menambahkan Artikel Baru'
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal Menambahkan Artikel'
                    });
                }
            });
        }

        function editArtikel(no_artikel) {
            isEdit = 1;
            clear();
            clearImagePreview();

            // $('#no_artikel').attr("readonly", true);
            $('#modalArtikel').text('Edit Artikel');

            var row = $('td').filter(function() {
                return $(this).text() == no_artikel;
            }).closest('tr');

            var judul_artikel = row.find('td:eq(2)').text();
            var deskripsi_artikel = row.find('td:eq(3)').text();
            var sumber = row.find('td:eq(4)').text();
            var link_sumber = row.find('td:eq(5)').text();
            var imagePath = row.find('td:eq(6) img').attr('src'); // Ambil path gambar

            $('#no_artikel').val(no_artikel);
            $('#judul_artikel').val(judul_artikel);
            $('#deskripsi_artikel').val(deskripsi_artikel);
            $('#sumber').val(sumber);
            $('#link_sumber').val(link_sumber);
            $('#preview').attr('src', imagePath).show();
            $('#image').data('path', imagePath);

            $('#tambahArtikelModal').modal('show');
        }

        function confirmDelete(no_artikel) {
            var x = 5;
            var y = "5";
            console.log(x == y);
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                text: 'Data akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    var formId = 'deleteForm-' + no_artikel;
                    var deleteForm = document.getElementById(formId);
                    if (deleteForm) {
                        deleteForm.submit();
                    }
                }
            });
        }

        function clear() {
            $('#no_artikel').val('');
            $('#judul_artikel').val('');
            $('#deskripsi_artikel').val('');
            $('#sumber').val('');
            $('#link_sumber').val('');
            // $('#status_program').prop('selectedIndex', 0);
        }
    </script>
</body>

</html>