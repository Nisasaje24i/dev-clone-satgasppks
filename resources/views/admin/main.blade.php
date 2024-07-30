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

    <section></section>
    <section id="" style="height: 60vh; display: flex; justify-content: center; align-items: center;">
        <div class="justify-content-center" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
            <a href="/data_mahasiswa" class="card" style="background-color: blue; width: 250px; height: 150px; border: 1px solid yellow; padding: 20px; color: yellow; font-weight: bold; text-align: center; text-decoration: none;">
                <div id="jumlah_mahasiswa" style="font-size: 36px; margin-bottom: 10px;"></div>
                Mahasiswa
            </a>
            <a href="/data_dosen" class="card" style="background-color: blue; width: 250px; height: 150px; border: 1px solid yellow; padding: 20px; color: yellow; font-weight: bold; text-align: center; text-decoration: none;">
                <div id="jumlah_dosen" style="font-size: 36px; margin-bottom: 10px;"></div>
                Dosen
            </a>
            <a href="/data_karyawan" class="card" style="background-color: blue; width: 250px; height: 150px; border: 1px solid yellow; padding: 20px; color: yellow; font-weight: bold; text-align: center; text-decoration: none;">
                <div id="jumlah_karyawan" style="font-size: 36px; margin-bottom: 10px;"></div>
                Karyawan/Staff
            </a>
            <a href="/artikel_admin" class="card" style="background-color: blue; width: 250px; height: 150px; border: 1px solid yellow; padding: 20px; color: yellow; font-weight: bold; text-align: center; text-decoration: none;">
                <div id="jumlah_artikel" style="font-size: 36px; margin-bottom: 10px;"></div>
                Artikel
            </a>
            <a href="/program_admin" class="card" style="background-color: blue; width: 250px; height: 150px; border: 1px solid yellow; padding: 20px; color: yellow; font-weight: bold; text-align: center; text-decoration: none;">
                <div id="jumlah_program" style="font-size: 36px; margin-bottom: 10px;"></div>
                Program
            </a>
            <a href="/data_petugas" class="card" style="background-color: blue; width: 250px; height: 150px; border: 1px solid yellow; padding: 20px; color: yellow; font-weight: bold; text-align: center; text-decoration: none;">
                <div id="jumlah_petugas" style="font-size: 36px; margin-bottom: 10px;"></div>
                Petugas SATGAS PPKS
            </a>
            <a href="/data_pengguna" class="card" style="background-color: blue; width: 250px; height: 150px; border: 1px solid yellow; padding: 20px; color: yellow; font-weight: bold; text-align: center; text-decoration: none;">
                <div id="jumlah_pengguna_satgas_ppks" style="font-size: 36px; margin-bottom: 10px;"></div>
                Pengguna SATGAS PPKS
            </a>
            <a href="/kelola_laporan" class="card" style="background-color: blue; width: 250px; height: 150px; border: 1px solid yellow; padding: 20px; color: yellow; font-weight: bold; text-align: center; text-decoration: none;">
                <div id="jumlah_laporan" style="font-size: 36px; margin-bottom: 10px;"></div>
                Kelola Laporan
            </a>
            <!-- <a href="/laporan_masuk" class="card" style="background-color: blue; width: 250px; height: 150px; border: 1px solid yellow; padding: 20px; color: yellow; font-weight: bold; text-align: center; text-decoration: none;">
                <div id="jumlah_masuk" style="font-size: 36px; margin-bottom: 10px;">5</div>
                Laporan Masuk
            </a>
            <a href="/laporan_masuk" class="card" style="background-color: blue; width: 250px; height: 150px; border: 1px solid yellow; padding: 20px; color: yellow; font-weight: bold; text-align: center; text-decoration: none;">
                <div id="jumlah_masuk" style="font-size: 36px; margin-bottom: 10px;">5</div>
                Laporan Selesai
            </a> -->
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
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // Data untuk grafik
    $(document).ready(function() {

        function getJumlahMahasiswa() {
            $.get('/jumlah_mahasiswa', function(response) {
                $('#jumlah_mahasiswa').text(response.jumlah);
                updateJumlahPenggunaSatgasPpks();
            });
        }

        function getJumlahDosen() {
            $.get('/jumlah_dosen', function(response) {
                $('#jumlah_dosen').text(response.jumlah);
                updateJumlahPenggunaSatgasPpks();
            });
        }

        function getJumlahKaryawan() {
            $.get('/jumlah_karyawan', function(response) {
                $('#jumlah_karyawan').text(response.jumlah);
                updateJumlahPenggunaSatgasPpks();
            });
        }

        function getJumlahPetugas() {
            $.get('/jumlah_petugas', function(response) {
                $('#jumlah_petugas').text(response.jumlah);
                updateJumlahPenggunaSatgasPpks();
            });
        }

        function updateJumlahPenggunaSatgasPpks() {
            var jumlahMahasiswa = parseInt($('#jumlah_mahasiswa').text()) || 0;
            var jumlahDosen = parseInt($('#jumlah_dosen').text()) || 0;
            var jumlahKaryawan = parseInt($('#jumlah_karyawan').text()) || 0;
            var jumlahPetugas = parseInt($('#jumlah_petugas').text()) || 0;

            var totalPengguna = jumlahMahasiswa + jumlahDosen + jumlahKaryawan + jumlahPetugas;
            $('#jumlah_pengguna_satgas_ppks').text(totalPengguna);
        }

        function getJumlahArtikel() {
            $.get('/jumlah_artikel', function(response) {
                $('#jumlah_artikel').text(response.jumlah);
            });
        }

        function getJumlahProgram() {
            $.get('/jumlah_program', function(response) {
                $('#jumlah_program').text(response.jumlah);
            });
        }

        function getJumlahLaporan() {
            $.get('/jumlah_laporan', function(response) {
                $('#jumlah_laporan').text(response.jumlah);
            });
        }


        // Panggil semua fungsi untuk menginisialisasi data
        getJumlahMahasiswa();
        getJumlahDosen();
        getJumlahKaryawan();
        getJumlahPetugas();
        getJumlahArtikel();
        getJumlahProgram();
        getJumlahLaporan();

    });


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