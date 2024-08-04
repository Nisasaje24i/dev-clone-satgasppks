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
    <section style="height: 100vh;margin-left:10vh">
        <div>
            <div class="row justify-content-between" style="margin-bottom: 10px;">
                <div class="col-md-3">
                    <h3>Laporan Masuk</h3>
                </div>
            </div>
            <div class="col-lg-11">
                <table style="width: 100%; border-collapse: collapse; border: 1px solid #828282; text-align:center">
                    <tr style="padding: 8px; background-color:blue; color:white;">
                        <th style="border: 1px solid #828282;">NO</th>
                        <th style="border: 1px solid #828282;">NIM</th>
                        <th style="border: 1px solid #828282;">Nama Korban</th>
                        <th style="border: 1px solid #828282;">Nama Inisial Pelaku</th>
                        <th style="border: 1px solid #828282;">Penanganan Yang Diberikan</th>
                        <th style="border: 1px solid #828282;">Hasil dari Penanganan</th>
                        <th style="border: 1px solid #828282;">Aksi</th>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #828282; padding: 8px;"></td>
                        <td style="border: 1px solid #828282; padding: 8px;"></td>
                        <td style="border: 1px solid #828282; padding: 8px;"></td>
                        <td style="border: 1px solid #828282; padding: 8px;"></td>
                        <td style="border: 1px solid #828282; padding: 8px;"></td>
                        <td style="border: 1px solid #828282; padding: 8px;"></td>
                        <td style="padding: 8px; border: 1px solid #828282; padding: 8px;">
                            <!-- Tambahkan ID pada tombol edit -->
                            <button class="btn btn-sm edit-btn" style="background-color:yellow;" data-bs-toggle="modal" onclick="edit()">
                                <i class="fas fa-edit"></i>
                            </button>
                            <br>
                            <br>
                            <button class="btn btn-sm kirim-btn" style="background-color:red;" data-bs-toggle="modal" onclick="kirim()">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="tambahMahasiswaModal" tabindex="-1" aria-labelledby="modalMahasiswa" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMahasiswa">Tambah Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formMahasiswa" action="{{ route('tambah.datamahasiswa') }}">
                        @csrf
                        <div class="mb-2 row">
                            <label for="id" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nim" name="nim">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="prodi" class="col-sm-3 col-form-label">Program Studi</label>
                            <div class="col-sm-5">
                                <select class="form-select" id="program_studi" name="program_studi">
                                    <option value="">Pilih</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="tahun" class="col-sm-3 col-form-label">Tahun Angkatan</label>
                            <div class="col-sm-5">
                                <select class="form-select" id="tahun_angkatan" name="tahun_angkatan">
                                    <option value="">Pilih</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
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
                            <button type="button" class="btn btn-success btn-primary" onclick="simpanMahasiswa()">Simpan</button>
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

        function generatePassword() {
            var nim = $('#nim').val();
            var password = nim;
            return password;
        }

        $('#nim').on('input', function() {
            var nimValue = $(this).val();
            if (nimValue) {
                var password = generatePassword();
                $('#password').val(password);
            }
        });

        function simpanMahasiswa() {
            var url;
            var method;

            if (isEdit) {
                url = '{{ route("update.datamahasiswa", ":nim") }}';
                url = url.replace(':nim', $('#nim').val());
                method = 'PUT';
            } else {
                url = '{{ route("tambah.datamahasiswa") }}';
                method = 'POST';
            }

            $.ajax({
                type: method,
                url: url,
                data: $('#formMahasiswa').serialize(),
                success: function(response) {
                    console.log(response);
                    $('#tambahMahasiswaModal').modal('hide');
                    window.location.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Berhasil Menambahkan Mahasiswa'
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal Menambahkan Mahasiswa'
                    });
                }
            });
        }

        function tambahMahasiswa() {
            isEdit;
            $('#nim').val(getLatestArticleNumber());
            $('#password').attr("readonly", true);
            clear();
            $('#tambahMahasiswaModal').modal('show');
        }

        function editMahasiswa(nim) {
            isEdit = 1;
            $('#modalMahasiswa').text('Edit Mahasiswa');
            $('#password').attr("readonly", true);
            clear();
            var row = $('td').filter(function() {
                return $(this).text() == nim;
            }).closest('tr');

            var nama_lengkap = row.find('td:eq(2)').text();
            var program_studi = row.find('td:eq(3)').text();
            var tahun_angkatan = row.find('td:eq(4)').text();
            var email = row.find('td:eq(5)').text();
            var password = row.find('td:eq(6)').text();

            $('#nim').val(nim);
            $('#nama_lengkap').val(nama_lengkap);
            $('#program_studi').val(program_studi);
            $('#tahun_angkatan').val(tahun_angkatan);
            $('#email').val(email);
            $('#password').val(password);

            $('#tambahMahasiswaModal').modal('show');
        }

        function clear() {
            $('#nim').val('');
            $('#nama_lengkap').val('');
            $('#program_studi').val('');
            $('#tahun_angkatan').val('');
            $('#email').val('');
            $('#password').val('');
            $('#program_studi').prop('selectedIndex', 0);
            $('#tahun_angkatan').prop('selectedIndex', 0);
        }

        // function hapusMahasiswa(nim) {
        //     Swal.fire({
        //         title: 'Apakah Anda yakin ingin menghapus mahasiswa ini?',
        //         text: 'Data mahasiswa akan dihapus permanen!',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#d33',
        //         cancelButtonColor: '#3085d6',
        //         confirmButtonText: 'Ya, hapus!',
        //         cancelButtonText: 'Batal'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             var url = "{{ route('hapus.mahasiswa', ':nim') }}";
        //             url = url.replace(':nim', nim);

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

        function confirmDelete(nim) {
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
                    var formId = 'deleteForm-' + nim;
                    var deleteForm = document.getElementById(formId);
                    if (deleteForm) {
                        deleteForm.submit();
                    }
                }
            });
        }

        function getLatestArticleNumber() {
            var lastArticleNumber = $('td:nth-child(2)').last().text();
            var newNo = lastArticleNumber.substr(2);
            newNo = parseInt(newNo) + 1;
            newNo = newNo.toString().padStart(2, '0');
            return newNo;
        }
    </script>

</body>

</html>