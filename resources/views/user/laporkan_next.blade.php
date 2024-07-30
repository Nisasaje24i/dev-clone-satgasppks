<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Satuan Tugas Pencegahan dan Penanganan Kekerasan Seksual</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">


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
    @include('header')
    <!-- isi content -->
    <section>
        @if(isset($data))
        <pre id="jsonData" style="display: none;">{{ var_dump($data) }}</pre>
        @else
        <p>Data tidak tersedia</p>
        @endif
        <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-color:blue; display: flex; justify-content: center; flex-direction: column; height: 13vh;">
            </div>
        </div>
        <div class="container" style="margin-top: 20px;">
            <div class="section-title">
                <p style="color: red;  text-align:center; font-size:large;"><i>Laporkan Segala Bentuk Kekerasan Seksual Disini!</i></p><br>
                <div class="container" style="background-color: grey; height:1px"></div>
            </div>
        </div>
        <div class="container" style="background-color: white; height: 120vh; border-radius: 10px; box-shadow: 0px 0px 20px 5px rgba(169, 169, 169, 0.5);">
            <br>
            <div class="container" style="background-color: blue; height: 7vh;">
                <div class="logo me-auto"><img src="assets/img/logoform.png" alt="" width="50px" style="margin-right: 10px;"><i style="color: white;">FORM LAPORAN KEKERASAN SEKSUAL DI STMIK BANDUNG</i></div>
            </div>
            <br>
            <div class="container" style="background-color: white; height: 30vh;">
                <form id="formLaporkanNext" method="post" action="{{ route('laporkan.kirim') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6" style="margin-right:10px;">
                            <div class="form">
                                <!-- <input type="hidden" id="id" name="id"> -->
                                <div class=" col-lg-12">
                                    <p class="fst-italic">Kekerasan seksual seperti apa yang kamu alami ? *</p>
                                    <select class="form-select" style="border-color: black;" id="kekerasan_seksual" name="kekerasan_seksual" required>
                                        <option value="">Pilih...</option>
                                        @foreach($tb_nama_kss as $kekerasan_seksual)
                                        <option value="{{ $kekerasan_seksual->no_ks }}">{{ $kekerasan_seksual->nama_kekerasan_seksual }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <input type="hidden" id="teks_kekerasan_seksual" name="teks_kekerasan_seksual">
                                <div class="col-lg-12">
                                    @foreach($kriteria as $kr)
                                    @if($kr->jenis_kriteria == 1)
                                    <p class="fst-italic">{{ $kr->pertanyaan }}</p>
                                    <select class="form-select" style="border-color: black;" id="cedera_fisik" name="cedera_fisik">
                                        <option value="">Pilih...</option>
                                        @foreach($tb_kriteria_pilihan as $kp)
                                        @if($kp->jenis_kriteria == $kr->jenis_kriteria)
                                        <option value="{{ $kp->nama_pilihan }}" data-range="{{ $kp->bobot }}" data-bobot="{{$kr->bobot;}}">{{ $kp->nama_pilihan }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @endif
                                    @endforeach
                                </div>
                                <br>
                                <div class="col-lg-12">
                                    @foreach($kriteria as $kr)
                                    @if($kr->jenis_kriteria == 2)
                                    <p class="fst-italic">{{ $kr->pertanyaan }}</p>
                                    <select class="form-select" style="border-color: black;" id="ganggguan_psikis" name="ganggguan_psikis">
                                        <option value="">Pilih...</option>
                                        @foreach($tb_kriteria_pilihan as $kp)
                                        @if($kp->jenis_kriteria == $kr->jenis_kriteria)
                                        <option value="{{ $kp->nama_pilihan }}" data-range="{{ $kp->bobot }}" data-bobot="{{$kr->bobot;}}">{{ $kp->nama_pilihan }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @endif
                                    @endforeach
                                </div>
                                <br>
                                <div class="col-lg-12">
                                    @foreach($kriteria as $kr)
                                    @if($kr->jenis_kriteria == 4)
                                    <p class="fst-italic">{{ $kr->pertanyaan }}</p>
                                    <select id="bukti-select" class="form-select" style="border-color: black;" name="bukti-select">
                                        <option value="">Pilih...</option>
                                        @foreach($tb_kriteria_pilihan as $kp)
                                        @if($kp->jenis_kriteria == $kr->jenis_kriteria)
                                        <option value="{{ $kp->nama_pilihan }}" data-range="{{ $kp->bobot }}" data-bobot="{{$kr->bobot;}}">{{ $kp->nama_pilihan }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @endif
                                    @endforeach
                                </div>
                                <br>
                                <div class="col-lg-12" id="dokumen_bukti1" style="display: none;">
                                    <div class="row">
                                        <p>Silahkan upload bukti berbentuk pdf/zip/rar</p>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control" style="border-color: black;" id="dokumen_buktiFile1" name="dokumen[0]" accept=".pdf,.zip,.rar">
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="fst-italic">Dokumen Bukti</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="dokumen_bukti2" style="display: none;">
                                    <div class="row">
                                        <p>Silahkan upload bukti berbentuk pdf/zip/rar</p>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control" style="border-color: black;" id="dokumen_buktiFile2" name="dokumen[1]" accept=".pdf,.zip,.rar">
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="fst-italic">Dokumen Bukti</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="dokumen_bukti3" style="display: none;">
                                    <div class="row">
                                        <p>Silahkan upload bukti berbentuk pdf/zip/rar</p>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control" style="border-color: black;" id="dokumen_buktiFile3" name="dokumen[2]" accept=".pdf,.zip,.rar">
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="fst-italic">Dokumen Bukti</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form">
                                <div class="col-lg-12">
                                    @foreach($kriteria as $kr)
                                    @if($kr->jenis_kriteria == 3)
                                    <p class="fst-italic">{{ $kr->pertanyaan }}</p>
                                    <select class="form-select" style="border-color: black;" id="frekuensi" name="frekuensi">
                                        <option value="">Pilih...</option>
                                        @foreach($tb_kriteria_pilihan as $kp)
                                        @if($kp->jenis_kriteria == $kr->jenis_kriteria)
                                        <option value="{{ $kp->nama_pilihan }}" data-range="{{ $kp->bobot }}" data-bobot="{{$kr->bobot;}}">{{ $kp->nama_pilihan }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @endif
                                    @endforeach
                                </div>
                                <br>
                                <div class="col-lg-12">
                                    @foreach($kriteria as $kr)
                                    @if($kr->jenis_kriteria == 5)
                                    <p class="fst-italic">{{$kr->pertanyaan}}</p>
                                    <select id="saksi" class="form-select" style="border-color: black;" name="saksi">
                                        <option value="">Pilih...</option>
                                        @foreach($tb_kriteria_pilihan as $kp)
                                        @if($kp->jenis_kriteria == $kr->jenis_kriteria)
                                        <option value="{{ $kp->nama_pilihan }}" data-range="{{ $kp->bobot }}" data-bobot="{{$kr->bobot;}}">{{ $kp->nama_pilihan }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @endif
                                    @endforeach
                                </div>
                                <br>
                                <div id="kolom-saksi1" class="row" style="display: none;">
                                    <div id="saksi1" class="col-lg-12 d-flex flex-row">
                                        <div class="col-lg-5" style="margin-right: 30px;">
                                            <p class="fst-italic">Nama Saksi 1*</p>
                                            <input type="text" class="form-control" style="border-color: black;" id="identitas_saksi_nama1" name="identitas[0][namaSaksi]">
                                        </div>
                                        <div class="col-lg-5">
                                            <p class="fst-italic">Nomor Telepon Saksi 1*</p>
                                            <input type="text" class="form-control" style="border-color: black;" id="identitas_saksi_nomorTelepon1" name="identitas[0][nomorTeleponSaksi]">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div id="kolom-saksi2" class="row" style="display: none;">
                                    <div id="saksi2" class="col-lg-12 d-flex flex-row">
                                        <div class="col-lg-5" style="margin-right: 30px;">
                                            <p class="fst-italic">Nama Saksi 2*</p>
                                            <input type="text" class="form-control" style="border-color: black;" id="identitas_saksi_nama2" name="identitas[1][namaSaksi]">
                                        </div>
                                        <div class="col-lg-5">
                                            <p class="fst-italic">Nomor Telepon Saksi 2*</p>
                                            <input type="text" class="form-control" style="border-color: black;" id="identitas_saksi_nomorTelepon2" name="identitas[1][nomorTeleponSaksi]">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div id="kolom-saksi3" class="row" style="display: none;">
                                    <div id="saksi3" class="col-lg-12 d-flex flex-row">
                                        <div class="col-lg-5" style="margin-right: 30px;">
                                            <p class="fst-italic">Nama Saksi 3*</p>
                                            <input type="text" class="form-control" style="border-color: black;" id="identitas_saksi_nama3" name="identitas[2][namaSaksi]">
                                        </div>
                                        <div class="col-lg-5">
                                            <p class="fst-italic">Nomor Telepon Saksi 3*</p>
                                            <input type="text" class="form-control" style="border-color: black;" id="identitas_saksi_nomorTelepon3" name="identitas[2][nomorTeleponSaksi]">
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="d-flex justify-content-center">
                        <button id="btnSubmit" type="submit" style="border-radius:10px; background-color: yellow; color: red; border: none; padding: 10px 20px; font-size: 16px;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- End Counts Section -->
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
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("saksi").addEventListener("change", function() {
                var selectValue = this.value;
                var kolomSaksi1 = document.getElementById("kolom-saksi1");
                var kolomSaksi2 = document.getElementById("kolom-saksi2");
                var kolomSaksi3 = document.getElementById("kolom-saksi3");

                // Menyembunyikan semua kolom saksi terlebih dahulu
                document.querySelectorAll('.saksi-input').forEach(function(el) {
                    el.style.display = 'none';
                });

                // Menampilkan kolom saksi sesuai dengan pilihan
                if (selectValue === 'Ya, 1 Saksi') {
                    kolomSaksi1.style.display = "block";
                    kolomSaksi2.style.display = "none";
                    kolomSaksi3.style.display = "none";
                    document.getElementById("identitas_saksi_nama2").setAttribute("disabled", "disabled");
                    document.getElementById("identitas_saksi_nomorTelepon2").setAttribute("disabled", "disabled");
                    document.getElementById("identitas_saksi_nama3").setAttribute("disabled", "disabled");
                    document.getElementById("identitas_saksi_nomorTelepon3").setAttribute("disabled", "disabled");
                    // dokumenBukti2.style.value = "";
                    // dokumenBukti3.style.value = "";
                } else if (selectValue === 'Ya, 2 Saksi') {
                    kolomSaksi1.style.display = "block";
                    kolomSaksi2.style.display = "block";
                    kolomSaksi3.style.display = "none";
                    document.getElementById("identitas_saksi_nama2").removeAttribute("disabled");
                    document.getElementById("identitas_saksi_nomorTelepon2").removeAttribute("disabled");
                    document.getElementById("identitas_saksi_nama3").setAttribute("disabled", "disabled");
                    document.getElementById("identitas_saksi_nomorTelepon3").setAttribute("disabled", "disabled");
                    // dokumenBukti3.style.value = "";
                } else if (selectValue === 'Ya, 3 Saksi') {
                    kolomSaksi1.style.display = "block";
                    kolomSaksi2.style.display = "block";
                    kolomSaksi3.style.display = "block";
                    document.getElementById("identitas_saksi_nama2").removeAttribute("disabled");
                    document.getElementById("identitas_saksi_nomorTelepon2").removeAttribute("disabled");
                    document.getElementById("identitas_saksi_nama3").removeAttribute("disabled");
                    document.getElementById("identitas_saksi_nomorTelepon3").removeAttribute("disabled");
                }

                var selectedOption = this.options[this.selectedIndex];
                var selectValue = selectedOption.value;
                var saksi = selectedOption.text;
                var range_saksi = selectedOption.getAttribute('data-range');

                console.log('Selected Value:', selectValue);
                console.log('Teks :', saksi);
                console.log('Range Field:', range_saksi);
            });

            document.getElementById("bukti-select").addEventListener("change", function() {
                var selectValue = this.value;
                var dokumenBukti1 = document.getElementById("dokumen_bukti1");
                var dokumenBukti2 = document.getElementById("dokumen_bukti2");
                var dokumenBukti3 = document.getElementById("dokumen_bukti3");

                // Menyembunyikan semua kolom saksi terlebih dahulu
                document.querySelectorAll('.bukti-select-input').forEach(function(el) {
                    el.style.display = 'none';
                });

                if (selectValue === "1 Bukti") {
                    dokumenBukti1.style.display = "block";
                    dokumenBukti2.style.display = "none";
                    dokumenBukti3.style.display = "none";
                    document.getElementById("dokumen_buktiFile2").setAttribute("disabled", "disabled");
                    document.getElementById("dokumen_buktiFile3").setAttribute("disabled", "disabled");
                } else if (selectValue === "2 Bukti") {
                    dokumenBukti1.style.display = "block";
                    dokumenBukti2.style.display = "block";
                    dokumenBukti3.style.display = "none";
                    document.getElementById("dokumen_buktiFile2").removeAttribute("disabled");
                    document.getElementById("dokumen_buktiFile3").setAttribute("disabled", "disabled");

                } else if (selectValue === "3 Bukti") {
                    dokumenBukti1.style.display = "block";
                    dokumenBukti2.style.display = "block";
                    dokumenBukti3.style.display = "block";
                    document.getElementById("dokumen_buktiFile2").removeAttribute("disabled");
                    document.getElementById("dokumen_buktiFile3").removeAttribute("disabled");
                }

                var selectedOption = this.options[this.selectedIndex];
                var selectValue = selectedOption.value;
                var saksi = selectedOption.text;
                var range_saksi = selectedOption.getAttribute('data-range');

                console.log('Selected Value:', selectValue);
                console.log('Teks :', saksi);
                console.log('Range Field:', range_saksi);
            });

            document.getElementById("cedera_fisik").addEventListener("change", function() {
                var selectedOption = this.options[this.selectedIndex];
                var selectValue = selectedOption.value;
                var cederaFisik = selectedOption.text;
                var range_cf = selectedOption.getAttribute('data-range');
                var bobot = selectedOption.getAttribute('data-bobot');

                console.log('Selected Value:', selectValue);
                console.log('Teks :', cederaFisik);
                console.log('Range Field:', range_cf);
                console.log('Bobot Field:', bobot);
            });

            document.getElementById("ganggguan_psikis").addEventListener("change", function() {
                var selectedOption = this.options[this.selectedIndex];
                var selectValue = selectedOption.value;
                var dampakPsikis = selectedOption.text;
                var range_dp = selectedOption.getAttribute('data-range');

                console.log('Selected Value:', selectValue);
                console.log('Teks :', dampakPsikis);
                console.log('Range Field:', range_dp);
            });

            document.getElementById("frekuensi").addEventListener("change", function() {
                var selectedOption = this.options[this.selectedIndex];
                var selectValue = selectedOption.value;
                var frekuensi = selectedOption.text;
                var range_fr = selectedOption.getAttribute('data-range');

                console.log('Selected Value:', selectValue);
                console.log('Teks :', frekuensi);
                console.log('Range Field:', range_fr);
            });

            document.getElementById("bukti-select").addEventListener("change", function() {
                var selectedOption = this.options[this.selectedIndex];
                var selectValue = selectedOption.value;
                var bukti = selectedOption.text;
                var range_bukti = selectedOption.getAttribute('data-range');

                console.log('Selected Value:', selectValue);
                console.log('Teks :', bukti);
                console.log('Range Field:', range_bukti);
            });

            var csrfToken = document.querySelector('meta[name="csrf-token"]');

            function kirimLaporan() {
                let kriteriaData = [{
                        id: "cedera_fisik",
                        jenis_kriteria: 1
                    },
                    {
                        id: "ganggguan_psikis",
                        jenis_kriteria: 2
                    },
                    {
                        id: "frekuensi",
                        jenis_kriteria: 3
                    },
                    {
                        id: "bukti-select",
                        jenis_kriteria: 4
                    },
                    {
                        id: "saksi",
                        jenis_kriteria: 5
                    }
                ];

                let laporan = {
                    cost: [],
                    benefit: [],
                    totalCost: 0,
                    totalBenefit: 0
                };

                kriteriaData.forEach(function(kriteria) {
                    let element = document.getElementById(kriteria.id);
                    let selectedOption = element.options[element.selectedIndex];
                    let hasilrange = parseFloat(selectedOption.getAttribute('data-range'));
                    let bobotkriteria = parseFloat(selectedOption.getAttribute('data-bobot'));

                    let dataKriteria = {
                        id: kriteria.id,
                        hasilrange: hasilrange
                    };

                    if (kriteria.jenis_kriteria >= 1 && kriteria.jenis_kriteria <= 3) {
                        // Cost calculation
                        let minRange = 1;
                        let normalizedValue = minRange / hasilrange * bobotkriteria;
                        dataKriteria.normalizedValue = normalizedValue.toFixed(3);
                        laporan.cost.push(dataKriteria);
                        laporan.totalCost += normalizedValue;
                    } else if (kriteria.jenis_kriteria >= 4 && kriteria.jenis_kriteria <= 5) {
                        // Benefit calculation
                        let maxBobot = 1;
                        let normalizedValue = hasilrange / maxBobot * bobotkriteria;
                        dataKriteria.normalizedValue = normalizedValue.toFixed(3);
                        laporan.benefit.push(dataKriteria);
                        laporan.totalBenefit += normalizedValue;
                    }
                });

                let totalCost = parseFloat(laporan.totalCost);
                let totalBenefit = parseFloat(laporan.totalBenefit);
                let total = (totalCost + totalBenefit).toFixed(3);
                console.log("Total:", total);


                console.log("Cost:", laporan.cost);
                console.log("Benefit:", laporan.benefit);
                console.log("Total Cost:", laporan.totalCost);
                console.log("Total Benefit:", laporan.totalBenefit);
                console.log("Hasil hitung:", total);

                var url;
                var method;
                var response;

                var app = <?php echo json_encode($data); ?>;
                console.log(app)
                var arrResponse = [];
                arrResponse['jenis_identitas_pelapor'] = app.jenis_identitas_pelapor;
                arrResponse['nama_lengkap_pelapor'] = app.nama_lengkap_pelapor;
                arrResponse['nama_lengkap_terlapor'] = app.nama_lengkap_terlapor;
                arrResponse['nik'] = app.nik;
                arrResponse['no_hp_pelapor'] = app.no_hp_pelapor;
                arrResponse['nomor_identitas_terlapor'] = app.nomor_identitas_terlapor;
                arrResponse['nomor_identitas_pelapor'] = app.nomor_identitas_pelapor;
                arrResponse['profesi_pelapor'] = app.profesi_pelapor;
                arrResponse['status_terlapor'] = app.status_terlapor;


                url = '{{ route("laporkan.kirim") }}';
                method = 'POST';
                // var formData = new FormData(document.getElementById('formLaporkanNext'));
                var arrResponse = <?php echo json_encode($data); ?>;
                var formData = new FormData(document.getElementById('formLaporkanNext'));
                console.log(formData)
                formData.append('data', JSON.stringify(arrResponse));
                formData.append('total_hitung', total);


                $.ajax({
                    type: method,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: 'Berhasil Menambahkan Laporkan'
                        });
                        window.location.href = '/riwayat_laporan';
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr)
                        console.log(JSON.parse(xhr.responseText).message)
                        console.log("diatas sini")
                        console.error(xhr.responseText);
                        console.error("dibawah sini");

                        if (typeof JSON.parse(xhr.responseText).message !== 'undefined' && JSON.parse(xhr.responseText).message !== null) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: JSON.parse(xhr.responseText).message
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Gagal Menambahkan Laporkan'
                            });
                        }
                    }
                });

            }

            document.getElementById("btnSubmit").addEventListener("click", function(event) {
                event.preventDefault();
                kirimLaporan();
            });
        });
    </script>

</body>

</html>