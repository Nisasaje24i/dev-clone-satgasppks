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
                    <h3>Dosen</h3>
                </div>
                <div class="col-md-2" style="margin-right: 15px;">
                    <button class="btn btn-primary" data-bs-toggle="modal" onclick="tambahDosen()">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Tambah
                    </button>
                </div>
            </div>
            <div class="col-lg-11">
                <table style="width: 100%; border-collapse: collapse; border: 1px solid #828282; text-align:center">
                    <tr style="padding: 8px; background-color:blue; color:white;">
                        <th style="border: 1px solid #828282;">NO</th>
                        <th style="border: 1px solid #828282;">NIDN</th>
                        <th style="border: 1px solid #828282;">Nama Lengkap</th>
                        <th style="border: 1px solid #828282;">Jabatan</th>
                        <th style="border: 1px solid #828282;">Email</th>
                        <th style="border: 1px solid #828282;">Password</th>
                        <th style="border: 1px solid #828282;">Aksi</th>
                    </tr>
                    @foreach($dosens as $dosen)
                    <tr>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $loop->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $dosen->nidn }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $dosen->nama_lengkap }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $dosen->jabatan }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $dosen->email }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $dosen->password }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">
                            <button class="btn btn-sm edit-btn" style="background-color:yellow;" data-bs-toggle="modal" onclick="editDosen('{{ $dosen->nidn }}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form class="d-inline" id="deleteForm-{{ $dosen->nidn }}" action="{{ url('dosen/'. $dosen->nidn) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm" style="background-color:red;" onclick="confirmDelete('{{ $dosen->nidn }}')">
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

    <div class="modal fade" id="tambahDosenModal" tabindex="-1" aria-labelledby="modalDosen" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDosen">Tambah Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formDosen" action="{{ route('tambah.datadosen') }}">
                        @csrf
                        <div class="mb-2 row">
                            <label for="ni_dn" class="col-sm-3 col-form-label">NIDN</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nidn" name="nidn">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="jab" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-5">
                                <select class="form-select" id="jabatan" name="jabatan">
                                    <option value="">Pilih</option>
                                    <option value="Ketua STMIK Bandung">Ketua STMIK Bandung</option>
                                    <option value="Wakil 1 Bidang Akademik">Wakil 1 Bidang Akademik</option>
                                    <option value="Wakil 2 Bidang Keuangan">Wakil 2 Bidang Keuangan</option>
                                    <option value="Wakil 3 Bidang Kemahasiswaan">Wakil 3 Bidang Kemahasiswaan</option>
                                    <option value="Kaprodi IF">Kaprodi IF</option>
                                    <option value="Kaprodi SI">Kaprodi SI </option>
                                    <option value="Dosen Pengajar">Dosen Pengajar</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-success btn-primary" onclick="simpanDosen()">Simpan</button>
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

        // function getLatestArticleNumber() {
        //     var lastArticleNumber = $('td:nth-child(2)').last().text();
        //     var newNo = lastArticleNumber.substr(10);
        //     newNo = parseInt(newNo) + 1;
        //     newNo = newNo.toString().padStart(2, '0');
        //     return newNo;
        // }

        function generatePassword() {
            var nidn = $('#nidn').val();
            var password = nidn;
            return password;
        }

        $('#nidn').on('input', function() {
            var nidnValue = $(this).val();
            if (nidnValue) {
                var password = generatePassword();
                $('#password').val(password);
            }
        });

        function tambahDosen() {
            isEdit;
            clear();
            // $('#nidn').val(getLatestArticleNumber());
            $('#tambahDosenModal').modal('show');
        }

        function simpanDosen() {
            var url;
            var method;

            if (isEdit) {
                url = '{{ route("update.datadosen", ":nidn") }}';
                url = url.replace(':nidn', $('#nidn').val());
                method = 'PUT';
            } else {
                url = '{{ route("tambah.datadosen") }}';
                method = 'POST';
            }

            $.ajax({
                type: method,
                url: url,
                data: $('#formDosen').serialize(),
                success: function(response) {
                    console.log(response);
                    $('#tambahDosenModal').modal('hide');
                    window.location.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Berhasil Menambahkan Dosen'
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal Menambahkan Dosen'
                    });
                }
            });
        }

        function editDosen(nidn) {
            isEdit = 1;
            $('#password').attr("readonly", true);
            $('#modalDosen').text('Edit Dosen');
            clear();
            var row = $('td').filter(function() {
                return $(this).text() == nidn;
            }).closest('tr');

            var nama_lengkap = row.find('td:eq(2)').text();
            var jabatan = row.find('td:eq(3)').text();
            var email = row.find('td:eq(4)').text();
            var password = row.find('td:eq(5)').text();

            $('#nidn').val(nidn);
            $('#nama_lengkap').val(nama_lengkap);
            $('#jabatan').val(jabatan);
            $('#email').val(email);
            $('#password').val(password);

            $('#tambahDosenModal').modal('show');
        }

        // function hapusDosen(nidn) {
        //     Swal.fire({
        //         title: 'Apakah Anda yakin ingin menghapus data dosen ini?',
        //         text: 'Data dosen akan dihapus permanen!',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#d33',
        //         cancelButtonColor: '#3085d6',
        //         confirmButtonText: 'Ya, hapus!',
        //         cancelButtonText: 'Batal'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             var url = "{{ route('hapus.dosen', ':nidn') }}";
        //             url = url.replace(':nidn', nidn);

        //             $.ajax({
        //                 type: 'DELETE',
        //                 url: url,
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 },
        //                 success: function(response) {
        //                     console.log(response);
        //                     window.location.reload();
        //                     Swal.fire({
        //                         icon: 'success',
        //                         title: 'Sukses!',
        //                         text: 'Hapus data berhasil'
        //                     });
        //                 },
        //                 error: function(xhr, status, error) {
        //                     console.error(xhr.responseText);
        //                     Swal.fire({
        //                         icon: 'error',
        //                         title: 'Gagal!',
        //                         text: 'Gagal hapus data'
        //                     });
        //                 }
        //             });
        //         }
        //     });
        // }

        function confirmDelete(nidn) {
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
                    var formId = 'deleteForm-' + nidn;
                    var deleteForm = document.getElementById(formId);
                    if (deleteForm) {
                        deleteForm.submit();
                    }
                }
            });
        }

        function clear() {
            $('#nidn').val('');
            $('#nama_lengkap').val('');
            $('#jabatan').prop('selectedIndex', 0);
            $('#email').val('');
            $('#password').val('');
        }
    </script>
</body>

</html>