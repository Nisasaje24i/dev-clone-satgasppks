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
    <section style="height: 1000vh; justify-content: center; align-items: center; margin-left:13vh">
        <div>
            <div class="row justify-content-between" style="margin-bottom: 10px;">
                <div class="col-md-3">
                    <h3>Petugas</h3>
                </div>
                <div class="col-md-2" style="margin-right: 15px;">
                    <button class="btn btn-primary" data-bs-toggle="modal" onclick="tambahPetugas()">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Tambah
                    </button>
                </div>
            </div>
            <div class="col-lg-11">
                <table style="width: 100%; border-collapse: collapse; border: 1px solid #828282; text-align:center">
                    <tr style="padding: 8px; background-color:blue; color:white;">
                        <th style="border: 1px solid #828282;">NO</th>
                        <th style="border: 1px solid #828282;">ID PEGAWAI</th>
                        <th style="border: 1px solid #828282;">Nama Lengkap</th>
                        <th style="border: 1px solid #828282;">Profesi</th>
                        <th style="border: 1px solid #828282;">Jabatan</th>
                        <th style="border: 1px solid #828282;">No Handphone</th>
                        <th style="border: 1px solid #828282;">Email</th>
                        <th style="border: 1px solid #828282;">Password</th>
                        <th style="border: 1px solid #828282;">Gambar</th>
                        <th style="border: 1px solid #828282;">Aksi</th>
                    </tr>
                    @foreach($petugas as $petugas)
                    <tr>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $loop->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $petugas->idpeg }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $petugas->nama_lengkap }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $petugas->profesi }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $petugas->jabatan_satgas }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $petugas->nohp }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $petugas->email }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $petugas->password }}</td>
                        <td style="width: 10%; border: 1px solid #828282; padding: 8px;">
                            <img src="{{ asset('images/' . $petugas->image) }}" alt="Gambar Petugas" style="max-width: 100px;">
                        </td>
                        <td style="border: 1px solid #828282; padding: 8px;">
                            <button class="btn btn-sm edit-btn" style="background-color:yellow;" data-bs-toggle="modal" onclick="editPetugas('{{ $petugas->idpeg }}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form class="d-inline" id="deleteForm-{{ $petugas->idpeg }}" action="{{ url('petugas/'. $petugas->idpeg) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm" style="background-color:red;" onclick="confirmDelete('{{ $petugas->idpeg }}')">
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
    <div class="modal fade" id="tambahPetugasModal" tabindex="-1" aria-labelledby="modalPetugas" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPetugas">Tambah Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formPetugas" action="{{ route('tambah.datapetugas') }}">
                        @csrf
                        <div class="mb-2 row">
                            <label for="id_peg" class="col-sm-3 col-form-label">ID PETUGAS</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="idpeg" name="idpeg" readonly>
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <label for="prof" class="col-sm-3 col-form-label">Profesi</label>
                            <div class="col-sm-5">
                                <select class="form-select" id="profesi" name="profesi">
                                    <option value="">Pilih</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Dosen">Dosen </option>
                                    <option value="Karyawan">Karyawan </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-5">
                                <select class="form-select" id="nama_lengkap" name="nama_lengkap">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-5">
                                <select class="form-select" id="jabatan_satgas" name="jabatan_satgas">
                                    <option value="">Pilih</option>
                                    <option value="Pelindung">Pelindung</option>
                                    <option value="Ketua SATGAS PPKS">Ketua SATGAS PPKS </option>
                                    <option value="Sekretaris">Sekretaris </option>
                                    <option value="Divisi Pencegahan dan Deteksi">Divisi Pencegahan dan Deteksi </option>
                                    <option value="Divisi Pelaporan">Divisi Pelaporan </option>
                                    <option value="Divisi Pemulihan">Divisi Pemulihan </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="inputnohp" class="col-sm-3 col-form-label">No Handphone</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nohp" name="nohp">
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
                        <div class="mb-2 row">
                            <label for="inputImage" class="col-sm-3 col-form-label">Upload Gambar Petugas</label>
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
                            <button type="button" class="btn btn-success btn-primary" onclick="simpanPetugas()">Simpan</button>
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

        document.getElementById("profesi").addEventListener("change", function() {
            updateNamaLengkap();
        });

        function updateNamaLengkap() {
            var profesi = document.getElementById("profesi").value;
            var selectNama = document.getElementById("nama_lengkap");

            // Kosongkan daftar nama
            selectNama.innerHTML = "<option value=''>Pilih</option>";

            if (profesi !== "") {
                $.get(`/getData/${profesi}`, function(response) {
                    if (response && response.data && response.data.length > 0) {
                        var data = response.data;

                        // Loop melalui data dan tambahkan ke pilihan nama lengkap
                        data.forEach(function(item) {
                            var option = document.createElement("option");
                            option.text = item.nama_lengkap; // Pastikan ini sesuai dengan properti yang ada di data Anda
                            option.value = item.nama_lengkap; // Pastikan ini sesuai dengan properti yang ada di data Anda
                            selectNama.add(option);
                        });
                    } else {
                        console.error(`Data ${profesi} kosong atau tidak sesuai`);
                    }
                });
            }
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

        function getLastPetugasNumber() {
            var lastPetugasNumber = $('td:nth-child(2)').last().text();
            var newNo = lastPetugasNumber.substr(5);
            newNo = parseInt(newNo) + 1;
            newNo = newNo.toString().padStart(2, '1');
            return newNo;
        }


        function generatePassword() {
            var idpeg = $('#idpeg').val();
            var password = idpeg;
            return password;
        }

        $('#idpeg').on('input', function() {
            var idpegValue = $(this).val();
            if (idpegValue) {
                var password = generatePassword();
                $('#password').val(password);
            }
        });

        function tambahPetugas() {
            isEdit;
            clear();
            clearImagePreview();
            $('#idpeg').val(getLastPetugasNumber());
            $('#password').val(generatePassword());
            $('#password').attr("readonly", true);
            $('#tambahPetugasModal').modal('show');
        }

        function simpanPetugas() {
            var url;
            var method;

            if (isEdit) {
                url = '{{ route("update.datapetugas", ":idpeg") }}';
                url = url.replace(':idpeg', $('#idpeg').val());
                method = 'POST';
            } else {
                url = '{{ route("tambah.datapetugas") }}';
                method = 'POST';
            }

            var formData = new FormData(document.getElementById('formPetugas'));

            $.ajax({
                type: method,
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $('#tambahPetugasModal').modal('hide');
                    window.location.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Berhasil Menambahkan Petugas Baru'
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal Menambahkan Petugas Baru'
                    });
                }
            });
        }


        function editPetugas(idpeg) {
            isEdit = 1;

            $('#modalPetugas').text('Edit Petugas');
            $('#password').attr("readonly", true);
            $('#nama_lengkap').attr("disabled", true);
            clear();

            var row = $('td').filter(function() {
                return $(this).text() == idpeg;
            }).closest('tr');

            var nama_lengkap = row.find('td:eq(2)').text();
            var profesi = row.find('td:eq(3)').text();
            var jabatan_satgas = row.find('td:eq(4)').text();
            var nohp = row.find('td:eq(5)').text();
            var email = row.find('td:eq(6)').text();
            var password = row.find('td:eq(7)').text();
            var imagePath = row.find('td:eq(8) img').attr('src'); // Ambil path gambar

            $('#idpeg').val(idpeg);
            $('#profesi').val(profesi);
            $('#nama_lengkap').val(nama_lengkap);
            $('#nohp').val(nohp);
            $('#email').val(email);
            $('#password').val(password);
            $('#jabatan_satgas').val(jabatan_satgas);
            $('#preview').attr('src', imagePath).show();
            $('#image').data('path', imagePath);

            // Panggil fungsi untuk membangun ulang opsi pilihan nama lengkap
            rebuildNamaLengkapOptions(nama_lengkap);

            $('#tambahPetugasModal').modal('show');
        }

        // Fungsi untuk membangun ulang opsi pilihan nama lengkap
        function rebuildNamaLengkapOptions(selectedNama) {
            var selectNama = $('#nama_lengkap');
            selectNama.empty(); // Kosongkan opsi pilihan

            // Buat opsi pilihan baru dengan nama lengkap dari tabel
            var option = $('<option>', {
                value: selectedNama,
                text: selectedNama,
                selected: true,
                disabled: true // Tandai opsi sebagai nonaktif
            });

            selectNama.append(option); // Tambahkan opsi ke dalam select
        }


        function confirmDelete(idpeg) {
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
                    var formId = 'deleteForm-' + idpeg;
                    var deleteForm = document.getElementById(formId);
                    if (deleteForm) {
                        deleteForm.submit();
                    }
                }
            });
        }

        function clear() {
            $('#idpeg').val('');
            $('#nama_lengkap').val('');
            $('#profesi').prop('selectedIndex', 0);
            $('#jabatan_satgas').prop('selectedIndex', 0);
            $('#nohp').val('');
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