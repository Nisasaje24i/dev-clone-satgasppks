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
                    <h3>Karyawan</h3>
                </div>
                <div class="col-md-2" style="margin-right: 15px;">
                    <button class="btn btn-primary" data-bs-toggle="modal" onclick="tambahKaryawan()">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Tambah
                    </button>
                </div>
            </div>
            <div class="col-lg-11">
                <table style="width: 100%; border-collapse: collapse; border: 1px solid #828282; text-align:center">
                    <tr style="padding: 8px; background-color:blue; color:white;">
                        <th style="border: 1px solid #828282;">NO</th>
                        <th style="border: 1px solid #828282;">NIP</th>
                        <th style="border: 1px solid #828282;">Nama Lengkap</th>
                        <th style="border: 1px solid #828282;">Jabatan</th>
                        <th style="border: 1px solid #828282;">Email</th>
                        <th style="border: 1px solid #828282;">Password</th>
                        <th style="border: 1px solid #828282;">Aksi</th>
                    </tr>
                    @foreach($karyawans as $karyawan)
                    <tr>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $loop->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $karyawan->nip }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $karyawan->nama_lengkap }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $karyawan->jabatan }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $karyawan->email }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $karyawan->password }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">
                            <button class="btn btn-sm edit-btn" style="background-color:yellow;" data-bs-toggle="modal" onclick="editKaryawan('{{ $karyawan->nip }}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form class="d-inline" id="deleteForm-{{ $karyawan->nip }}" action="{{ url('karyawan/'. $karyawan->nip) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm" style="background-color:red;" onclick="confirmDelete('{{ $karyawan->nip }}')">
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
    <div class="modal fade" id="tambahKaryawanModal" tabindex="-1" aria-labelledby="modalKaryawan" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKaryawan">Tambah Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formKaryawan" action="{{ route('tambah.datakaryawan') }}">
                        @csrf
                        <div class="mb-2 row">
                            <label for="ni_p" class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nip" name="nip">
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
                                    <option value="Front Office">Front Office</option>
                                    <option value="Marketing">Marketing </option>
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
                            <button type="button" class="btn btn-success btn-primary" onclick="simpanKaryawan()">Simpan</button>
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
            var nip = $('#nip').val();
            var password = nip;
            return password;
        }

        $('#nip').on('input', function() {
            var nipValue = $(this).val();
            if (nipValue) {
                var password = generatePassword();
                $('#password').val(password);
            }
        });

        function tambahKaryawan() {
            isEdit;
            clear();
            $('#tambahKaryawanModal').modal('show');
        }

        function simpanKaryawan() {
            var url;
            var method;

            if (isEdit) {
                url = '{{ route("update.datakaryawan", ":nip") }}';
                url = url.replace(':nip', $('#nip').val());
                method = 'PUT';
            } else {
                url = '{{ route("tambah.datakaryawan") }}';
                method = 'POST';
            }

            $.ajax({
                type: method,
                url: url,
                data: $('#formKaryawan').serialize(),
                success: function(response) {
                    console.log(response);
                    $('#tambahKaryawanModal').modal('hide');
                    window.location.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Berhasil Menambahkan Karyawan'
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal Menambahkan Data Karyawan'
                    });
                }
            });
        }

        function editKaryawan(nip) {
            isEdit = 1;
            $('#modalKaryawan').text('Edit Karyawan');
            $('#password').attr("readonly", true);
            clear();
            var row = $('td').filter(function() {
                return $(this).text() == nip;
            }).closest('tr');

            var nama_lengkap = row.find('td:eq(2)').text();
            var jabatan = row.find('td:eq(3)').text();
            var email = row.find('td:eq(4)').text();
            var password = row.find('td:eq(5)').text();

            $('#nip').val(nip);
            $('#nama_lengkap').val(nama_lengkap);
            $('#jabatan').val(jabatan);
            $('#email').val(email);
            $('#password').val(password);

            $('#tambahKaryawanModal').modal('show');
        }

        function confirmDelete(nip) {
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
                    var formId = 'deleteForm-' + nip;
                    var deleteForm = document.getElementById(formId);
                    if (deleteForm) {
                        deleteForm.submit();
                    }
                }
            });
        }

        function clear() {
            $('#nip').val('');
            $('#nama_lengkap').val('');
            $('#jabatan').prop('selectedIndex', 0);
            $('#email').val('');
            $('#password').val('');
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