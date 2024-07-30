<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <section style="height: 200;justify-content: center; align-items: center; margin-left:1vh">
        <div>
            <div class="row justify-content-between" style="margin-bottom: 10px;">
                <div class="col-md-3">
                    <h3>Data Identitas</h3>
                </div>

            </div>
            <div class="col-lg-12">
                <table id="identitas" style="width: 100%; border-collapse: collapse; border: 1px solid #828282; text-align:center">
                    <tr style="padding: 8px; background-color:blue; color:white;">
                        <th style="border: 1px solid #828282;">NO</th>
                        <th style="border: 1px solid #828282;">No Laporan</th>
                        <th style="border: 1px solid #828282;">Nama Lengkap Pelapor</th>
                        <th style="border: 1px solid #828282;">Jenis Identitas Pelapor</th>
                        <th style="border: 1px solid #828282;">Nomor Identitas Pelapor</th>
                        <th style="border: 1px solid #828282;">No. Handphone Pelapor</th>
                        <th style="border: 1px solid #828282;">NIK</th>
                        <th style="border: 1px solid #828282;">Jurusan/Jabatan Pelapor</th>
                        <th style="border: 1px solid #828282;">Nama Lengkap Terlapor</th>
                        <th style="border: 1px solid #828282;">Status Terlapor</th>
                        <th style="border: 1px solid #828282;">Nompor Identitas Terlapor</th>
                    </tr>
                    @foreach($laporan_kekerasan_seksual as $laporan_ks)
                    <tr>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $loop->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->no_laporan }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->nama_lengkap_pelapor }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->jenis_identitas_pelapor }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->nomor_identitas_pelapor }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->no_hp_pelapor }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->nik }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->profesi_pelapor }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->nama_lengkap_terlapor }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->status_terlapor }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->nomor_identitas_terlapor }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
    <section style="height: 200;justify-content: center; align-items: center; margin-left:1vh">
        <div>
            <div class="row justify-content-between" style="margin-bottom: 10px;">
                <div class="col-md-3">
                    <h3>Data Kekerasan Seksual</h3>
                </div>
            </div>
            <div class="col-lg-12">
                <table id="laporan" style="width: 100%; border-collapse: collapse; border: 1px solid #828282; text-align:center">
                    <tr style="padding: 8px; background-color:blue; color:white;">
                        <th style="border: 1px solid #828282;">NO</th>
                        <th style="border: 1px solid #828282;">No Laporan</th>
                        <th style="border: 1px solid #828282;">Jenis Kekerasan Seksual</th>
                        <th style="border: 1px solid #828282;">Cedera Fisik</th>
                        <th style="border: 1px solid #828282;">Gangguan Psikis</th>
                        <th style="border: 1px solid #828282;">Frekuensi</th>
                        <th style="border: 1px solid #828282;">Bukti</th>
                        <th style="border: 1px solid #828282;">Saksi</th>
                        <th style="border: 1px solid #828282;">Bobot Kasus</th>
                        <th style="border: 1px solid #828282;">Kategori Laporan Kekerasan</th>
                        <th style="border: 1px solid #828282;">Status</th>
                        <th style="border: 1px solid #828282;">Penanganan</th>
                        <th style="border: 1px solid #828282;">Sanksi Yang Diberikan</th>
                        <th style="border: 1px solid #828282;">Export</th>
                    </tr>
                    @foreach($laporan_kekerasan_seksual as $laporan_ks)
                    <tr>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $loop->iteration }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->no_laporan }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->kekerasan_seksual }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->cedera_fisik }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->gangguan_psikis }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">{{ $laporan_ks->frekuensi }}</td>
                        <td style="border: 1px solid #828282; padding: 8px;">
                            @foreach($laporan_ks->data_bukti as $bukti)
                            @php
                            // Dapatkan nama file tanpa path absolut
                            $namaFile = basename($bukti->dokumen_bukti);
                            @endphp
                            <a href="{{ asset('file/' . $namaFile) }}" target="_blank">
                                {{ $namaFile }}
                            </a><br>
                            @endforeach
                        </td>

                        <td style="border: 1px solid #828282; padding: 8px;">
                            @foreach($laporan_ks->kriteria_saksi as $saksi)
                            @php
                            $namaSaksi = $saksi->nama_lengkap_saksi;
                            $noHp = $saksi->no_hp_saksi;
                            @endphp
                            <p>{{$namaSaksi}}</p>
                            <p>{{$noHp}}</p>
                            @endforeach
                        </td>
                        <td style="border: 1px solid #828282; padding: 8px;">
                            {{ $laporan_ks->total_bobot }}
                        </td>
                        <td style="border: 1px solid #828282; padding: 8px;">
                            @if($laporan_ks->total_bobot >= 0 && $laporan_ks->total_bobot <= 0.65) Golongan Berat @elseif($laporan_ks->total_bobot >= 0.66 && $laporan_ks->total_bobot <= 1) Golongan Ringan @else Undefined @endif </td>
                        <td style="border: 1px solid #828282; padding: 8px;">
                            {{ $laporan_ks->status_laporan }}
                            @if($laporan_ks->status_laporan != 'Selesai')
                            <button class="btn btn-primary {{ $laporan_ks->status_laporan == 'Diproses' ? 'd-none' : '' }}" style="margin-bottom: 10px; margin-top:10px;" onclick="updateStatus('{{ $laporan_ks->no_laporan }}', 'Diproses')">Diproses</button><br>
                            <button class="btn btn-success {{ $laporan_ks->status_laporan == 'Diproses' ? '' : 'd-none' }}" style="margin-bottom: 10px; margin-top:10px;" onclick="updateStatus('{{ $laporan_ks->no_laporan }}', 'Selesai')">Selesai</button>
                            @endif
                        </td>
                        <td style="border: 1px solid #828282; padding: 8px;">
                            @if($laporan_ks->penanganan != 'Belum Ditangani')
                            {{ $laporan_ks->penanganan }}<br>
                            @endif
                            @if($laporan_ks->status_laporan != 'Selesai')
                            <button style="margin-top: 10px;" class="btn btn-warning" onclick="modalCatatan('{{ $laporan_ks->no_laporan }}')">Catatan</button>
                            @endif
                        </td>
                        <td style="border: 1px solid #828282; padding: 8px;" id="sanksiColumn">
                            <p>{{$laporan_ks->sanksi}}</p>
                            @if(empty($laporan_ks->sanksi))
                            @if($laporan_ks->status_laporan == 'Selesai')
                            <button style="margin-top: 10px;" class="btn btn-danger" onclick="modalSanksi('{{ $laporan_ks->no_laporan }}')">Sanksi</button>
                            @else
                            <button style="margin-top: 10px;" class="btn btn-secondary" disabled>Sanksi</button>
                            @endif
                            @endif
                        </td>

                        </td>

                        <td style="border: 1px solid #828282; padding: 8px;">
                            <img src="{{ asset('assets/img/pdf.png') }}" style="cursor: pointer;" onclick="toPdf('{{ $laporan_ks->no_laporan }}')">
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>

    <div class="modal fade" id="tambahCatatanModal" tabindex="-1" aria-labelledby="modalCatatan" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCatatan">Tambah Catatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formCatatan">
                        @csrf
                        <div class="mb-2 row">
                            <label for="no_laporan" class="col-sm-3 col-form-label">No Laporan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="no_laporan" name="no_laporan" readonly>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="penanganan" name="penanganan"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-success btn-primary" onclick="updateKirim()">Kirim</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahSanksiModal" tabindex="-1" aria-labelledby="modalSanksi" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSanksi">Sanksi Yang Diberikan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formSanksi" method="post" action="{{ route('laporkan.kirim') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2 row">
                            <label for="no_laporan" class="col-sm-3 col-form-label">No Laporan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="no_laporan_id" name="no_laporan" readonly>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="sanksi" class="col-sm-3 col-form-label">Penjatuhan Sanksi</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="sanksi" name="sanksi"></textarea>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="bukti_sanksi" class="col-sm-3 col-form-label">Bukti Sanksi</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="bukti_sanksi" name="bukti_sanksi"></textarea>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="file_sanksi" class="col-sm-3 col-form-label">Upload File Sanksi</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" id="file_sanksi" name="file_sanksi"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-success btn-primary" onclick="updateSanksi()">Kirim</button>
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
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function toPdf(no_laporan) {
            window.location.href = '/generate_pdf_laporan/' + no_laporan;
        }

        function modalCatatan(no_laporan) {
            // isEdit;
            clear();
            // $('#nidn').val(getLatestArticleNumber());
            $('#tambahCatatanModal').modal('show');
            var row = $('#laporan tr').filter(function() {
                return $(this).find('td:eq(1)').text() == no_laporan;
            });
            $('#no_laporan').val(no_laporan.trim());
        }

        function modalSanksi(no_laporan) {
            console.log(no_laporan)
            // $('#nidn').val(getLatestArticleNumber());
            $('#tambahSanksiModal').modal('show');
            var row = $('#laporan tr').filter(function() {
                return $(this).find('td:eq(1)').text() == no_laporan;
            });
            $('#no_laporan_id').val(no_laporan.trim());
        }

        function updateKirim(no_laporan) {
            var no_laporan = $('#no_laporan').val();
            var penanganan = $('#penanganan').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/updatePenanganan/' + no_laporan,
                method: 'PUT',
                data: {
                    _token: csrfToken,
                    penanganan: penanganan
                },
                success: function(response) {
                    $('#tambahCatatanModal').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function updateStatus(no_laporan, status) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/updateStatus/' + no_laporan,
                method: 'PUT',
                data: {
                    _token: csrfToken,
                    status_laporan: status
                },
                success: function(response) {
                    alert(response.message);
                    var row = $('#laporan tr').filter(function() {
                        return $(this).find('td:eq(1)').text() == no_laporan;
                    });
                    row.find('td:eq(9)').text(status);
                    if (status === 'Diproses') {
                        row.find('button.btn-primary').hide();
                        row.find('button.btn-success').show();
                    } else if (status === 'Selesai') {
                        row.find('button.btn-success').hide();
                    }

                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function updateSanksi() {
            var formData = new FormData(document.getElementById('formSanksi'));

            $.ajax({
                url: '/updateSanksi/' + formData.get('no_laporan'),
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $('#tambahSanksiModal').modal('hide'); // Sembunyikan modal jika berhasil
                    alert('Sanksi berhasil diperbarui!');
                    location.reload(); // Lakukan reload halaman jika berhasil
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan: ' + xhr.responseText); // Tampilkan alert jika terjadi kesalahan
                }
            });
        }




        function clear() {
            $('#catatan').val('');
            $('#nama_lengkap').val('');
            $('#jabatan').prop('selectedIndex', 0);
            $('#email').val('');
            $('#password').val('');
        }
    </script>
</body>

</html>