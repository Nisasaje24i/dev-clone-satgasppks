<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Add your styles here */
    </style>
</head>

<body>
    <p>LAMPIRAN 1</p>
    <p>SURAT EDARAN INSPEKTUR JENDERAL</p>
    <p>NOMOR 3 TAHUN 2023</p>
    <p>TENTANG</p>
    <p>PELAPORAN PENANGANAN KASUS KEKERASAN SEKSUAL OLEH SATUAN TUGAS PPKS</p>
    <table style="width: 100%; margin: 10px 0; border-collapse: collapse;">
        <tr>
            <td style="width: 200px;">Nama Perguruan Tinggi</td>
            <td style="width: 10px;">:</td>
            <td>STMIK BANDUNG</td>
        </tr>
        <tr>
            <td style="width: 200px; font-weight:bold;">Data Penanganan</td>
        </tr>
        <tr>
            <td style="width: 200px;">Periode Penanganan</td>
            <td style="width: 10px;">:</td>
            <td>
                @php
                // Get the updated_at timestamps from both tables
                $laporanUpdatedAt = $laporan_kekerasan_seksual->updated_at ?? null;
                $sanksiUpdatedAt = $sanksi->updated_at ?? null;

                // Check if sanksi->updated_at is later than laporan_kekerasan_seksual->updated_at
                $showEndDate = $sanksiUpdatedAt && $laporanUpdatedAt && $sanksiUpdatedAt->gt($laporanUpdatedAt);

                // Format the dates into readable strings
                $laporanUpdatedAtString = $laporanUpdatedAt ? $laporanUpdatedAt->format('j F Y') : 'Belum tersedia';
                $sanksiUpdatedAtString = $sanksiUpdatedAt ? $sanksiUpdatedAt->format('j F Y') : 'Belum tersedia';
                @endphp

                {{-- Display the period --}}
                @if ($laporanUpdatedAt && $sanksiUpdatedAt)
                {{ $laporanUpdatedAtString }} s.d. @if($showEndDate){{ $sanksiUpdatedAtString }}@else Sekarang @endif
                @elseif ($laporanUpdatedAt)
                {{ $laporanUpdatedAtString }} s.d. Belum tersedia
                @elseif ($sanksiUpdatedAt)
                Belum tersedia s.d. {{ $sanksiUpdatedAtString }}
                @else
                Belum tersedia s.d. Belum tersedia
                @endif
            </td>

        </tr>

        @foreach($petugas as $ptgs)
        @if($ptgs->jabatan_satgas == 'Ketua SATGAS PPKS')
        <tr>
            <td style="width: 200px;">Ketua Satgas</td>
            <td style="width: 10px;">:</td>
            <td>{{$ptgs->nama_lengkap}} - {{$ptgs->nohp}}</td>
        </tr>
        @endif
        @if($ptgs->jabatan_satgas == 'Sekretaris')
        <tr>
            <td style="width: 200px;">Sekretaris</td>
            <td style="width: 10px;">:</td>
            <td>{{$ptgs->nama_lengkap}} - {{$ptgs->nohp}}</td>
        </tr>
        @endif
        @endforeach
    </table>
    <br>
    @if($laporan_kekerasan_seksual->status_laporan == 'Diproses' || $laporan_kekerasan_seksual->status_laporan == 'Menunggu')
    <div id="proses">
        <p style="text-align: center;">FORMAT LAPORAN PENANGANAN KASUS KEKERASAN SEKSUAL YANG MASIH DALAM PROSES PENANGANAN</p>

        <table border="1" cellspacing="0" cellpadding="8" style="width: 100%;">
            <tr>
                <th colspan="3">Terlapor</th>
                <th colspan="2">Pelapor</th>
                <th colspan="2">Korban</th>
                <th rowspan="2">Tanggal Pelaporan</th>
                <th rowspan="2">Status Kasus</th>
                <th rowspan="2">Keterangan</th>
            </tr>
            <tr>
                <td>Inisial</td>
                <td>Status</td>
                <!-- <td>NIK</td> -->
                <td>Nomor Induk</td>
                <td>Inisial</td>
                <td>Status</td>
                <td>Inisial</td>
                <td>Status</td>
            </tr>
            <tr>
                <td>{{ getInitials($laporan_kekerasan_seksual->nama_lengkap_terlapor) }}</td>
                <td>{{$laporan_kekerasan_seksual->status_terlapor}}</td>
                <!-- <td>nik</td> -->
                <td>{{$laporan_kekerasan_seksual->nomor_identitas_terlapor}}</td>
                <td>{{ getInitials($laporan_kekerasan_seksual->nama_lengkap_pelapor)}}</td>
                <td>
                    @php
                    switch ($laporan_kekerasan_seksual->jenis_identitas_pelapor) {
                    case 'ktm':
                    echo 'Mahasiswa';
                    break;
                    case 'Kartu Dosen':
                    echo 'Dosen';
                    break;
                    case 'Kartu Pegawai':
                    echo 'Karyawan';
                    break;
                    default:
                    echo '-';
                    }
                    @endphp
                </td>
                <td>{{ getInitials($laporan_kekerasan_seksual->nama_lengkap_pelapor)}}</td>
                <td>
                    @php
                    switch ($laporan_kekerasan_seksual->jenis_identitas_pelapor) {
                    case 'ktm':
                    echo 'Mahasiswa';
                    break;
                    case 'Kartu Dosen':
                    echo 'Dosen';
                    break;
                    case 'Kartu Pegawai':
                    echo 'Karyawan';
                    break;
                    default:
                    echo '-';
                    }
                    @endphp
                </td>
                <td>{{ $laporan_kekerasan_seksual->created_at->toDateString() }}</td>
                <td>{{$laporan_kekerasan_seksual->status_laporan}}</td>
                <td>{{$laporan_kekerasan_seksual->penanganan}}</td>
            </tr>

        </table>
    </div>
    @elseif($laporan_kekerasan_seksual->status_laporan == 'Selesai')
    <!-- Tabel untuk kasus yang sudah selesai -->
    <div id="selesai">
        <p style="text-align: center;">FORMAT LAPORAN PENANGANAN KASUS KEKERASAN SEKSUAL YANG SUDAH SELESAI PROSES PENANGANAN</p>

        <table border="1" cellspacing="0" cellpadding="8" style="width: 100%;">
            <tr>
                <th colspan="3">Terlapor</th>
                <th colspan="2">Pelapor</th>
                <th colspan="2">Korban</th>
                <th rowspan="2">Tanggal Pelaporan</th>
                <th rowspan="2">Hasil Penanganan</th>
                <th rowspan="2">Penjatuhan Sanksi</th>
                <th rowspan="2">Bukti Sanksi</th>
            </tr>
            <tr>
                <td>Nama</td>
                <td>Status</td>
                <!-- <td>NIK</td> -->
                <td>Nomor Induk</td>
                <td>Inisial</td>
                <td>Status</td>
                <td>Inisial</td>
                <td>Status</td>
            </tr>
            <tr>
                <td>{{$laporan_kekerasan_seksual->nama_lengkap_terlapor}}</td>
                <td>{{$laporan_kekerasan_seksual->status_terlapor}}</td>
                <!-- <td>nik</td> -->
                <td>{{$laporan_kekerasan_seksual->nomor_identitas_terlapor}}</td>
                <td>{{ getInitials($laporan_kekerasan_seksual->nama_lengkap_pelapor)}}</td>
                <td>
                    @php
                    switch ($laporan_kekerasan_seksual->jenis_identitas_pelapor) {
                    case 'ktm':
                    echo 'Mahasiswa';
                    break;
                    case 'Kartu Dosen':
                    echo 'Dosen';
                    break;
                    case 'Kartu Pegawai':
                    echo 'Karyawan';
                    break;
                    default:
                    echo '-';
                    }
                    @endphp
                </td>
                <td>{{ getInitials($laporan_kekerasan_seksual->nama_lengkap_pelapor)}}</td>
                <td>
                    @php
                    switch ($laporan_kekerasan_seksual->jenis_identitas_pelapor) {
                    case 'ktm':
                    echo 'Mahasiswa';
                    break;
                    case 'Kartu Dosen':
                    echo 'Dosen';
                    break;
                    case 'Kartu Pegawai':
                    echo 'Karyawan';
                    break;
                    default:
                    echo '-';
                    }
                    @endphp
                </td>
                <td>{{ $laporan_kekerasan_seksual->created_at->toDateString() }}</td>
                <td>{{$laporan_kekerasan_seksual->penanganan}}</td>
                <td>{{$sanksi->sanksi}}</td>
                <td>{{$sanksi->bukti_sanksi}}</td>
            </tr>
            <!-- Contoh entri untuk kasus yang sudah selesai -->

        </table>
    </div>
    @endif
</body>
</body>

</html>
@php
function getInitials($name)
{
$words = explode(" ", $name);
$initials = "";

foreach ($words as $word) {
$initials .= strtoupper(substr($word, 0, 1));
}

return $initials;
}
@endphp