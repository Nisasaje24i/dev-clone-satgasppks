<main id="main">
    @if(isset($laporan_array))
    <pre id="jsonDataMasuk" style="display: none;">{!! json_encode($laporan_array) !!}</pre>
    @else
    <p>Data tidak tersedia</p>
    @endif

    @if(isset($laporan_array_selesai))
    <pre id="jsonDataSelesai" style="display: none;">{!! json_encode($laporan_array_selesai) !!}</pre>
    @else
    <p>Data tidak tersedia</p>
    @endif

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6" data-aos="fade-right">
                            <img src="assets/img/kekerasan2.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6" data-aos="fade-left">
                            <img src="assets/img/kekerasan-stop.jpeg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-6" data-aos="fade-right">
                            <img src="assets/img/kekerasan-seksual.jpeg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6" data-aos="fade-left">
                            <img src="assets/img/stop-kekerasan-seksual.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="col-lg-12 pt-4 content" data-aos="fade-left">
                        <h3>KOMITMEN SATGAS PPKS</h3>
                        <p>
                            Kami selaku Satuan Tugas Pencegahan dan Penanganan Kekerasan Seksual akan menjalankan beberapa komitmen yang sudah dibuat, yaitu:
                        </p>
                        <ol>
                            <li>Mencegah terjadinya kekerasan seksual di lingkungan institusi pendidikan. Kami akan melakukan ini dengan meningkatkan kesadaran akan pentingnya hak asasi manusia, memberikan edukasi tentang perilaku yang tidak dapat diterima, dan mempromosikan budaya sekolah yang aman dan inklusif.</li>
                            <li>Kami bertekad untuk menangani setiap kasus kekerasan seksual dengan cepat, adil, dan transparan. Ini melibatkan memberikan dukungan yang tepat kepada korban, melakukan investigasi menyeluruh terhadap setiap laporan, dan menegakkan sanksi yang sesuai terhadap pelaku kekerasan.</li>
                            <li>Kami akan menjadikan kekerasan seksual sebagai fokus utama dari SATGAS PPKS. Kami akan mengalokasikan sumber daya dan tenaga untuk memerangi kekerasan seksual, baik dalam bentuk peningkatan pengawasan, penyuluhan, atau tindakan penegakan hukum yang diperlukan.</li>
                        </ol>
                    </div>
                </div>
            </div>
            <p>
                Dengan komitmen ini, kami berharap dapat menciptakan lingkungan pendidikan yang bebas dari kekerasan seksual dan memberikan perlindungan yang kuat terhadap hak-hak asasi manusia bagi semua individu di dalamnya.
            </p>
        </div>

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">
                <div class="row no-gutter justify-content-center">
                    <div class="col-lg-3 align-items-md-stretch">
                        <p style="margin-bottom: 10px;">Total Laporan Masuk</p>
                        <div class="count-box">
                            <div class="count-content text-center">
                                <table style="width:100%; height:100%;">
                                    <tr>
                                        <td style="text-align:center;">
                                            <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah_laporan_masuk }}" data-purecounter-duration="1" class="purecounter" style="display: block; text-align: center;"></span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 align-items-md-stretch">
                        <p style="margin-bottom: 10px;">Total Laporan Selesai</p>
                        <div class="count-box">
                            <div class="count-content text-center">
                                <table style="width:100%; height:100%;">
                                    <tr>
                                        <td style="text-align:center;">
                                            <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah_selesai }}" data-purecounter-duration="1" class="purecounter" style="display: block; text-align: center;"></span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ======= Charts Section ======= -->
        <section id="charts" style="height: auto;">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <canvas id="laporanMasukChart" style="height: 200px;"></canvas>
                </div>
                <div class="col-md-4">
                    <canvas id="laporanSelesai" style="height: 200px;"></canvas>
                </div>
            </div>
        </section>

        <!-- End Counts Section -->
    </section>
    <!-- End About Us Section -->
    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h4>PETUGAS SATGAS PPKS</h4>
                <p>Dibawah ini adalah beberapa Petugas Satgas PPKS yang bisa anda kendali di lingkungan kampus STMIK BANDUNG. Semoga dapat membantu anda dalam melakukan pelaporan, pencegahan dan penanganan mengenai kekerasan seksual yang terjadi di lingkungan perguruan tinggi.</p>
            </div>

            <div class="row">
                @foreach($petugas as $member)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="{{ asset('images/' . $member->image) }}" class="img-fluid rounded-circle" style="height: 200px; width: 200px; object-fit: cover;" alt="{{ $member->nama_lengkap }}">
                            <div class="social mt-3">
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center mt-3">
                            <h4>{{ $member->nama_lengkap }}</h4>
                            <span>{{ $member->jabatan_satgas }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </section>

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h4>Dokumentasi Kegiatan</h4>
                <p>Dibawah ini merupakan dokumentasi kegiatan/program yang dilakukan oleh SATGAS PPKS STMIK BANDUNG</p>
            </div>
            <div class="gallery-slider swiper">
                <div class="swiper-wrapper">
                    @foreach($program as $dok_program)
                    <div class="swiper-slide">
                        <a class="gallery-lightbox" href="{{ asset('images/' . $dok_program->image) }}">
                            <img src="{{ asset('images/' . $dok_program->image) }}" class="img-fluid" alt="">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Gallery Section -->
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil data dari elemen <pre>
        var jsonDataMasuk = document.getElementById('jsonDataMasuk').innerText;
        var jsonDataSelesai = document.getElementById('jsonDataSelesai').innerText;

        console.log('Data Masuk:', jsonDataMasuk);
        console.log('Data Selesai:', jsonDataSelesai);

        // Parsing data JSON
        var laporanMasukDataFromPHP = JSON.parse(jsonDataMasuk || '[]');
        var laporanSelesaiDataFromPHP = JSON.parse(jsonDataSelesai || '[]');

        console.log('Parsed Masuk Data:', laporanMasukDataFromPHP);
        console.log('Parsed Selesai Data:', laporanSelesaiDataFromPHP);

        // Labels untuk grafik
        var labels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        // Fungsi untuk mengisi data ke dalam array berdasarkan bulan
        function fillData(dataFromPHP) {
            var data = Array(12).fill(0); // Array dengan 12 elemen, diisi dengan 0

            dataFromPHP.forEach(function(item) {
                var month = labels.indexOf(item[0]);
                if (month >= 0) {
                    data[month] = item[1];
                }
            });

            return data;
        }

        // Mengisi data untuk laporan masuk dan laporan selesai
        var laporanMasukData = fillData(laporanMasukDataFromPHP);
        var laporanSelesaiData = fillData(laporanSelesaiDataFromPHP);

        console.log('Laporan Masuk Data:', laporanMasukData);
        console.log('Laporan Selesai Data:', laporanSelesaiData);

        // Data untuk grafik batang
        var laporanMasukChartData = {
            labels: labels,
            datasets: [{
                label: 'Laporan Masuk',
                backgroundColor: 'yellow',
                borderColor: 'blue',
                data: laporanMasukData,
            }]
        };

        // Konfigurasi grafik batang
        var laporanMasukOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMin: 0,
                    suggestedMax: 20,
                    stepSize: 5
                }
            }
        };

        // Inisialisasi grafik batang
        var ctx = document.getElementById('laporanMasukChart').getContext('2d');
        var laporanMasukChart = new Chart(ctx, {
            type: 'bar',
            data: laporanMasukChartData,
            options: laporanMasukOptions
        });

        // Data untuk grafik garis
        var laporanSelesaiChartData = {
            labels: labels,
            datasets: [{
                label: 'Laporan Selesai',
                backgroundColor: 'transparent',
                borderColor: 'blue',
                borderWidth: 2,
                data: laporanSelesaiData,
            }]
        };

        // Konfigurasi grafik garis
        var laporanSelesaiOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMin: 0,
                    suggestedMax: 20,
                    stepSize: 5
                }
            }
        };

        // Inisialisasi grafik garis
        var ctx2 = document.getElementById('laporanSelesai').getContext('2d');
        var laporanSelesai = new Chart(ctx2, {
            type: 'line',
            data: laporanSelesaiChartData,
            options: laporanSelesaiOptions
        });
    });
</script>