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
                        <th style="border: 1px solid #828282;">Nomor Laporan</th>
                        <th style="border: 1px solid #828282;">Nomor Identitas</th>
                        <th style="border: 1px solid #828282;">Nama Lengkap</th>
                        <th style="border: 1px solid #828282;">Program Studi</th>
                        <th style="border: 1px solid #828282;">Kronologi Kekerasan Seksual</th>
                        <th style="border: 1px solid #828282;">Cedera Fisik Yang Dialami Korban</th>
                        <th style="border: 1px solid #828282;">Dampak Psikis Yang Dialami Korban</th>
                        <th style="border: 1px solid #828282;">Bukti</th>
                        <th style="border: 1px solid #828282;">Saksi</th>
                        <th style="border: 1px solid #828282;">Nomor Handphone Saksi</th>
                        <th style="border: 1px solid #828282;">Keterangan Saksi</th>
                        <th style="border: 1px solid #828282;">Aksi</th>
                    </tr>
                    @foreach($laporan_kekerasan_seksual as $laporan_ks)
                    @php
                    $prodi = '';
                    $nomorIdentitas = '';
                    @endphp
                    @if($laporan_ks->profesi_pelapor == 'if')
                    @php
                    $prodi = 'Teknik Informatika';
                    @endphp
                    @elseif($laporan_ks->profesi_pelapor == 'si')
                    @php
                    $prodi = 'Sistem Informasi';
                    @endphp
                    @elseif($laporan_ks->profesi_pelapor == 'karyawan')
                    @php
                    $prodi = 'Karyawan';
                    @endphp
                    @endif

                    @if($laporan_ks->jenis_identitas_pelapor == 'ktm')
                    @php
                    $nomorIdentitas = 'NIM'.$laporan_ks->nomor_identitas_pelapor;
                    @endphp
                    @elseif($laporan_ks->profesi_pelapor == 'kartudosen')
                    @php
                    $nomorIdentitas = 'NIDN'.$laporan_ks->nomor_identitas_pelapor;
                    @endphp
                    @elseif($laporan_ks->profesi_pelapor == 'kartupegawai')
                    @php
                    $nomorIdentitas = 'NIP'.$laporan_ks->nomor_identitas_pelapor;
                    @endphp
                    @endif

                    <tr>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $loop->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->no_laporan }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $nomorIdentitas }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->nama_lengkap_pelapor }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $prodi }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->iteration }}</td>
                        <td style="padding: 8px; border: 1px solid #828282; padding: 8px;">
                            <!-- Tambahkan ID pada tombol edit -->
                            <button class="btn btn-sm edit-btn" style="background-color:yellow;" data-bs-toggle="modal" onclick="editDakwa('{{ $laporan_ks->no_laporan }}', '{{ $nomorIdentitas }}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <br>
                            <br>
                            <button class="btn btn-sm kirim-btn" style="background-color:red;" data-bs-toggle="modal" onclick="penjadwalanDakwa()">
                                <i class="fa fa-calendar"></i>
                            </button>
                            <br>
                            <br>
                            <button class="btn btn-sm kirim-btn" style="background-color:red;" data-bs-toggle="modal" onclick="kirimDakwa()">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
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

    <!-- BEGIN Modal Edit Dakwaan -->
    <div class="modal fade" id="editDakwaModal" tabindex="-1" aria-labelledby="modalDakwa" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDakwa">Edit Dakwaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formEditDakwa" action="{{ route('dakwa.edit') }}">
                        @csrf
                        <div class="mb-2 row">
                            <label for="id" class="col-sm-3 col-form-label">Nomor Laporan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nomor_laporan" name="nomor_laporan" readonly>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="id" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nim_pelapor" name="nim_pelapor" readonly>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nama_lengkap_pelapor" name="nama_lengkap_pelapor" readonly>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="prodi" class="col-sm-3 col-form-label">Kronologi Kekerasan Seksual</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="kronologi_kekerasan_seksual" name="kronologi_kekerasan_seksual" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="tahun" class="col-sm-3 col-form-label">Cedera Fisik Yang Dialami Korban</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="cedera_fisik_kekerasan_seksual" name="cedera_fisik_kekerasan_seksual" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Dampak Psikis Yang Dialami Korban</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="dampak_psikis_kekerasan_seksual" name="dampak_psikis_kekerasan_seksual" rows="4"></textarea>
                            </div>
                        </div>
                        @for($i=0; $i<3; $i++) <div class="mb-2 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Bukti {{$i+1}}</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" id="bukti" name="bukti[{{$i}}]">
                            </div>
                </div>
                @endfor
                @for($i=0; $i<3; $i++) <div class="mb-2 row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Saksi {{$i+1}}</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="saksi" name="saksi[{{$i}}]">
                    </div>
            </div>
            <div class="mb-2 row">
                <label for="inputEmail" class="col-sm-3 col-form-label">Nomor Handphone Saksi {{$i+1}}</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="no_hp_saksi" name="no_hp_saksi[{{$i}}]">
                </div>
            </div>
            <div class="mb-2 row">
                <label for="inputEmail" class="col-sm-3 col-form-label">Keterangan Saksi {{$i+1}}</label>
                <div class="col-sm-5">
                    <textarea class="form-control" id="keterangan_saksi" name="keterangan_saksi[{{$i}}]" rows="4"></textarea>
                </div>
            </div>
            @endfor
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success btn-primary" onclick="simpanEditDakwaan()">Simpan</button>
            </div>
            </form>
        </div>

    </div>
    </div>
    </div>
    <!-- END Modal Edit Dakwaan -->

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

        function editDakwa(no_laporan, nomor_identitas_pelapor) {
            var row = $('td').filter(function() {
                return $(this).text() == no_laporan;
            }).closest('tr');

            var nama_lengkap = row.find('td:eq(3)').text();

            $('#nomor_laporan').val(no_laporan);
            $('#nim_pelapor').val(nomor_identitas_pelapor);
            $('#nama_lengkap_pelapor').val(nama_lengkap);
            $('#editDakwaModal').modal('show');
        }

        function penjadwalanDakwa() {
            isEdit;
            $('#nim').val(getLatestArticleNumber());
            $('#password').attr("readonly", true);
            clear();
            $('#tambahMahasiswaModal').modal('show');
        }

        function kirimDakwa() {
            isEdit;
            $('#nim').val(getLatestArticleNumber());
            $('#password').attr("readonly", true);
            clear();
            $('#tambahMahasiswaModal').modal('show');
        }

        function simpanEditDakwaan() {
            var url;
            var method;

            url = '{{ route("dakwa.edit") }}';
            method = 'POST';

            var formData = new FormData(document.getElementById('formEditDakwa'));

            $.ajax({
                type: method,
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Berhasil Menambah Data Dakwaan.'
                    });
                    // window.location.href = "{{ route('laporkan.next') }}";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal Menambah Data Dakwaan!'
                    });
                }
            });
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