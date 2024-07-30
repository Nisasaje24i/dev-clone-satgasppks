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
    <section style="height: 1000vh; justify-content: center; align-items: center; margin-left:16vh">
        <div>
            <div class="row justify-content-between" style="margin-bottom: 10px;">
                <div class="col-md-3">
                    <h3>Program</h3>
                </div>
                <div class="col-md-2" style="margin-right: 15px;">
                    <button class="btn btn-primary" data-bs-toggle="modal" onclick="tambahProgram()">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Tambah
                    </button>
                </div>
            </div>
            <div class="col-lg-11">
                <table style="width: 100%; border-collapse: collapse; border: 1px solid #828282; text-align:center">
                    <tr style="padding: 8px; background-color:blue; color:white;">
                        <th style="border: 1px solid #828282;">NO</th>
                        <th style="border: 1px solid #828282;">No Program</th>
                        <th style="border: 1px solid #828282;">Judul Program</th>
                        <th style="border: 1px solid #828282;">Deskripsi Program</th>
                        <th style="border: 1px solid #828282;">Pelaksanaan</th>
                        <th style="border: 1px solid #828282;">Narahubung</th>
                        <th style="border: 1px solid #828282;">Image</th>
                        <th style="border: 1px solid #828282;">Status Program</th>
                        <th style="border: 1px solid #828282;">Aksi</th>
                    </tr>
                    @foreach($programs as $program)
                    <tr>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $loop->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $program->no_program }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $program->judul_program }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $program->deskripsi_program }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $program->perencanaan_tanggal_program}}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $program->narahubung }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">
                            <img src="{{ asset('images/' . $program->image) }}" alt="Gambar Artikel" style="max-width: 100px;">
                        </td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $program->status_program }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">
                            <button class="btn btn-sm edit-btn" style="background-color:yellow;" data-bs-toggle="modal" onclick="editProgram('{{ $program->no_program }}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form class="d-inline" id="deleteForm-{{ $program->no_program }}" action="{{ url('program/'. $program->no_program) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm" style="background-color:red;" onclick="confirmDelete('{{ $program->no_program }}')">
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
    <div class="modal fade" id="tambahProgramModal" tabindex="-1" aria-labelledby="modalProgram" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProgram">Tambah Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formProgram" action="{{ route('tambah.dataprogram') }}">
                        @csrf
                        <div class="mb-2 row">
                            <label for="no_pro" class="col-sm-4 col-form-label">No Program</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="no_program" name="no_program" readonly>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="judul" class="col-sm-4 col-form-label">Judul Program</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="judul_program" name="judul_program">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi Program</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="deskripsi_program" name="deskripsi_program" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="cp" class="col-sm-4 col-form-label">Narahubung</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="narahubung" name="narahubung">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="pelaksanaan" class="col-sm-4 col-form-label">Pelaksanaan Program</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" id="perencanaan_tanggal_program" name="perencanaan_tanggal_program">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="program" class="col-sm-4 col-form-label">Status Program</label>
                            <div class="col-sm-5">
                                <select class="form-select" id="status_program" name="status_program">
                                    <option value="">Pilih</option>
                                    <option value="Rencana">Rencana</option>
                                    <option value="Terlaksana">Terlaksana </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="inputImage" class="col-sm-4 col-form-label">Gambar Rencana Program</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                                <!-- Tambahan: elemen gambar untuk menampilkan pratinjau gambar -->
                                <img id="preview" style="max-width:100%; margin-top:10px;display:none" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-success btn-primary" onclick="simpanProgram()">Simpan</button>
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

        function getLastProgramNumber() {
            var lastProgramNumber = $('td:nth-child(2)').last().text();
            var newNo = lastProgramNumber.substr(2);
            newNo = parseInt(newNo) + 1;
            newNo = newNo.toString().padStart(2, '0');
            return newNo;
        }

        function tambahProgram() {
            isEdit;
            clear();
            clearImagePreview();
            $('#no_program').val(getLastProgramNumber());
            $('#tambahProgramModal').modal('show');
        }

        function simpanProgram() {
            var url;
            var method;

            if (isEdit) {
                url = '{{ route("edit.dataprogram", ":no_program") }}';
                url = url.replace(':no_program', $('#no_program').val());
                method = 'POST';
            } else {
                url = '{{ route("tambah.dataprogram") }}';
                method = 'POST';
            }

            var formData = new FormData(document.getElementById('formProgram'));

            $.ajax({
                type: method,
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $('#tambahProgramModal').modal('hide');
                    window.location.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Berhasil Menambahkan Program Baru'
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal Menambahkan Program'
                    });
                }
            });
        }

        function confirmDelete(no_program) {
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
                    var formId = 'deleteForm-' + no_program;
                    var deleteForm = document.getElementById(formId);
                    if (deleteForm) {
                        deleteForm.submit();
                    }
                }
            });
        }

        function editProgram(no_program) {
            isEdit = 1;
            clear();
            clearImagePreview();

            // $('#no_program').attr("readonly", true);

            $('#modalProgram').text('Edit Program');

            var row = $('td').filter(function() {
                return $(this).text() == no_program;
            }).closest('tr');

            var judul_program = row.find('td:eq(2)').text();
            var deskripsi_program = row.find('td:eq(3)').text();
            var perencanaan_tanggal_program = row.find('td:eq(4)').text();
            var narahubung = row.find('td:eq(5)').text();
            var imagePath = row.find('td:eq(6) img').attr('src');
            var status_program = row.find('td:eq(7)').text();

            $('#no_program').val(no_program);
            $('#judul_program').val(judul_program);
            $('#deskripsi_program').val(deskripsi_program);
            $('#perencanaan_tanggal_program').val(perencanaan_tanggal_program);
            $('#narahubung').val(narahubung);
            $('#preview').attr('src', imagePath).show();
            $('#image').data('path', imagePath);
            $('#status_program').val(status_program);

            $('#tambahProgramModal').modal('show');
        }

        function clear() {
            $('#no_program').val('');
            $('#judul_program').val('');
            $('#deskripsi_program').val('');
            $('#perencanaan_tanggal_program').val('');
            $('#narahubung').val('');
            $('#status_program').prop('selectedIndex', 0);
        }
    </script>
</body>

</html>