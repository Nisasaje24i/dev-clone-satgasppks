<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\KriteriaPilihan;
use App\Models\NamaKS;
use App\Models\Laporkan;
use App\Models\Bukti;
use App\Models\Dosen;
use App\Models\Karyawan;
use App\Models\Mahasiswa;
use App\Models\Petugas;
use App\Models\Saksi;
use App\Models\Sanksi;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Support\Str;
use Mpdf\Mpdf;

class LaporkanController extends Controller
{
    public function laporkan(Request $request)
    {
        $id_login = $request->session()->get('id_login');

        if (strpos($id_login, 'nim') === 0) {
            // id_login dimulai dengan 'nim'
            $id_logins = preg_replace('/nim/', '', $id_login);
            $mahasiswa = Mahasiswa::all();
            foreach ($mahasiswa as $mhs) {
                if ($mhs->nim == $id_login) {
                    $nama = $mhs->nama_lengkap;
                    // echo '<pre>';
                    // dd($nama);
                    // echo '</pre>';
                    // exit;
                }
            }
        } elseif (strpos($id_login, 'nidn') === 0) {
            // id_login dimulai dengan 'nidn'
            $id_logins = preg_replace('/nidn/', '', $id_login);
            $dosen = Dosen::all();
            foreach ($dosen as $dsn) {
                if ($dsn->nidn == $id_login) {
                    $nama = $dsn->nama_lengkap;
                    // echo '<pre>';
                    // dd($nama);
                    // echo '</pre>';
                    // exit;
                }
            }
        } elseif (strpos($id_login, 'nip') === 0) {
            // id_login dimulai dengan 'nip'
            $id_logins = preg_replace('/nip/', '', $id_login);
            $karyawan = Karyawan::all();
            foreach ($karyawan as $kry) {
                if ($kry->nip == $id_login) {
                    $nama = $kry->nama_lengkap;
                    // echo '<pre>';
                    // dd($nama);
                    // echo '</pre>';
                    // exit;
                }
            }
        } else {
            $nama = 'ID tidak valid';
        }
        return view('user/laporkan', ['nama' => $nama, 'id_login' => $id_login]);
    }

    public function laporkan_next(Request $request)
    {
        $data = $request->all();

        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        // exit;

        $tb_nama_kss = NamaKS::all();
        $kriteria = Kriteria::all();
        $tb_kriteria_pilihan = KriteriaPilihan::all();

        return view('user/laporkan_next', compact('kriteria', 'tb_kriteria_pilihan', 'tb_nama_kss'))->with('data', $data);
    }

    public function laporkan_kirim(Request $request)
    {
        $response = $request->post();
        $arrResponse = json_decode($request->input('data'), true);
        $arrDokumen = $request->file();

        $request->validate([
            'kekerasan_seksual' => 'required|string|max:255',
            'cedera_fisik' => 'required|string|max:255',
            'ganggguan_psikis' => 'required|string|max:255',
            'bukti-select' => 'required|string|max:255',
            'frekuensi' => 'required|string|max:255',
            'saksi' => 'required|string|max:255',
        ]);

        // echo '<pre>';
        // var_dump($arrDokumen);
        // var_dump($response);
        // echo '</pre>';
        // exit;


        $nik = substr($arrResponse['nik'], 0, 5);

        $laporanAll = Laporkan::where('nik', $arrResponse['nik'])->first();
        if (isset($laporanAll)) {
            $countLaporanAll = $laporanAll->count();
        }

        if (isset($laporanAll)) {
            // echo '<pre>';
            // var_dump($countLaporanAll);
            // echo '</pre>';
            // exit;
            $nomorLaporan = 'LP' . $nik . '_' . $countLaporanAll + 1;
        } else {
            $nomorLaporan = 'LP' . $nik . '_1';
        }



        try {

            $laporan = Laporkan::create([
                'no_laporan' => $nomorLaporan,
                'nama_lengkap_pelapor' => $arrResponse['nama_lengkap_pelapor'],
                'jenis_identitas_pelapor' => $arrResponse['jenis_identitas_pelapor'],
                'nomor_identitas_pelapor' => $arrResponse['nomor_identitas_pelapor'],
                'no_hp_pelapor' => $arrResponse['no_hp_pelapor'],
                'nik' => $arrResponse['nik'],
                'profesi_pelapor' => $arrResponse['profesi_pelapor'],
                'nama_lengkap_terlapor' => $arrResponse['nama_lengkap_terlapor'],
                'status_terlapor' => $arrResponse['status_terlapor'],
                'nomor_identitas_terlapor' => $arrResponse['nomor_identitas_terlapor'],
                'jenis_kekerasan_seksual' => $response['kekerasan_seksual'],
                'cedera_fisik' => $response['cedera_fisik'],
                'gangguan_psikis' => $response['ganggguan_psikis'],
                'frekuensi' => $response['frekuensi'],
                'bukti' => $response['bukti-select'],
                'saksi' => $response['saksi'],
                'hasil_hitung' => $response['total_hitung'],
                'status_laporan' => 'Menunggu',
                'penanganan' => 'Belum Ditangani'
            ]);

            foreach ($response['identitas'] as $identitas) {
                if (isset($identitas['namaSaksi'])) {
                    $saksi = Saksi::create([
                        'no_laporan' => $laporan->no_laporan,
                        'saksi' => $identitas['namaSaksi'],
                        'nama_lengkap_saksi' => $identitas['namaSaksi'],
                        'no_hp_saksi' => $identitas['nomorTeleponSaksi']
                    ]);
                }
            }

            foreach ($arrDokumen['dokumen'] as $dokumen) {
                if (!empty($dokumen->getFilename()) && $dokumen->getMimeType() == 'application/pdf') {

                    // Get original file name
                    $originalName = $dokumen->getClientOriginalName();

                    // Get MIME type
                    $mimeType = $dokumen->getMimeType();

                    // Get error code
                    $error = $dokumen->getError();

                    // Get temporary file path
                    $tempPath = $dokumen->getPathname();

                    // Get file name
                    $fileName = $dokumen->getFilename();

                    $dokumen->move(public_path('file'), $fileName);

                    $bukti = Bukti::create([
                        'no_laporan' => $laporan->no_laporan,
                        'bukti' => $fileName,
                        'dokumen_bukti' => $tempPath
                    ]);
                }
            }

            $sanksi = Sanksi::create([
                'no_laporan' => $laporan->no_laporan,
                'sanksi' => '',
                'bukti_sanksi' => '',
                'file_sanksi' => ''
            ]);
        } catch (\Exception $e) {

            //   return $e->getMessage();
            return response()->json(['error' => 'Data laporan tidak berhasil disimpan']);
        }

        // $bukti = Bukti::create([
        //     'no_laporan' => $laporan->no_laporan,
        //     'bukti' => $arrResponse['nama_lengkap_pelapor'],
        //     'dokumen_bukti' => $arrResponse['jenis_identitas_pelapor']
        // ]);

        // echo '<pre>';
        // var_dump($laporan->no_laporan);
        // echo '</pre>';
        // exit;
    }

    public function kelola_laporan()
    {
        // $laporan_kekerasan_seksual = Laporkan::all()->toArray();
        // foreach ($laporan_kekerasan_seksual as $key => $value) {
        //     if (isset($value['no_laporan']) && (!empty($value['no_laporan']))) {
        //         $no_laporan = $value['no_laporan'];

        //         $data_bukti = Bukti::where('no_laporan', $no_laporan)->get()->toArray();
        //         $laporan_kekerasan_seksual[$key]['dataBukti'] = $data_bukti;

        //         $kriteria_saksi = Saksi::where('no_laporan', $no_laporan)->get()->toArray();
        //         $laporan_kekerasan_seksual[$key]['dataSaksi'] = $kriteria_saksi;
        //     }
        // }

        $min_cedera_fisik = 999;
        $min_gangguan_psikis = 999;
        $min_frekuensi = 999;
        $max_saksi = 0;
        $max_bukti = 0;

        $bobot_cedera_fisik = 0;
        $bobot_gangguan_psikis = 0;
        $bobot_frekuensi = 0;
        $bobot_saksi = 0;
        $bobot_bukti = 0;

        $laporan_kekerasan_seksual = Laporkan::all();
        foreach ($laporan_kekerasan_seksual as $laporan_ks_key => $laporan_ks_value) {
            $no_laporan = $laporan_ks_value->no_laporan;
            $data_bukti = Bukti::where('no_laporan', $no_laporan)->get();
            $laporan_kekerasan_seksual[$laporan_ks_key]['data_bukti'] = $data_bukti;
            $kriteria_saksi = Saksi::where('no_laporan', $no_laporan)->get();
            $laporan_kekerasan_seksual[$laporan_ks_key]['kriteria_saksi'] = $kriteria_saksi;

            $kriteria_pilihan_cedera_fisik = KriteriaPilihan::where('nama_pilihan', $laporan_ks_value['cedera_fisik'])->get();
            $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_cedera_fisik'] = $kriteria_pilihan_cedera_fisik[0]['bobot'];

            $kriteria_pilihan_gangguan_psikis = KriteriaPilihan::where('nama_pilihan', $laporan_ks_value['gangguan_psikis'])->get();
            $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_gangguan_psikis'] = $kriteria_pilihan_gangguan_psikis[0]['bobot'];

            $kriteria_pilihan_frekuensi = KriteriaPilihan::where('nama_pilihan', $laporan_ks_value['frekuensi'])->get();
            $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_frekuensi'] = $kriteria_pilihan_frekuensi[0]['bobot'];

            $kriteria_pilihan_saksi = KriteriaPilihan::where('nama_pilihan', $laporan_ks_value['saksi'])->get();
            $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_saksi'] = $kriteria_pilihan_saksi[0]['bobot'];

            $kriteria_pilihan_bukti = KriteriaPilihan::where('nama_pilihan', $laporan_ks_value['bukti'])->get();
            $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_bukti'] = $kriteria_pilihan_bukti[0]['bobot'];

            $kekerasan_seksual = NamaKS::where('no_ks', $laporan_ks_value['jenis_kekerasan_seksual'])->get();
            $laporan_kekerasan_seksual[$laporan_ks_key]['kekerasan_seksual'] = $kekerasan_seksual[0]['nama_kekerasan_seksual'];

            $sanksi = Sanksi::where('no_laporan', $no_laporan)->get();
            $laporan_kekerasan_seksual[$laporan_ks_key]['sanksi'] = $sanksi[0]['sanksi'];

            // if (count($kriteria_saksi) == '1' || count($kriteria_saksi) == 1) {
            //     $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_saksi'] = 0.25;
            // } elseif (count($kriteria_saksi) == '2' || count($kriteria_saksi) == 2) {
            //     $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_saksi'] = 0.5;
            // } elseif (count($kriteria_saksi) == '3' || count($kriteria_saksi) == 3) {
            //     $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_saksi'] = 1;
            // }

            // if (count($data_bukti) == '1' || count($data_bukti) == 1) {
            //     $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_bukti'] = 0.25;
            // } elseif (count($data_bukti) == '2' || count($data_bukti) == 2) {
            //     $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_bukti'] = 0.5;
            // } elseif (count($data_bukti) == '3' || count($data_bukti) == 3) {
            //     $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_bukti'] = 1;
            // }

            if ($min_cedera_fisik > $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_cedera_fisik']) {
                $min_cedera_fisik = $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_cedera_fisik'];
            }

            if ($min_gangguan_psikis > $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_gangguan_psikis']) {
                $min_gangguan_psikis = $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_gangguan_psikis'];
            }

            if ($min_frekuensi > $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_frekuensi']) {
                $min_frekuensi = $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_frekuensi'];
            }

            if ($max_saksi < $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_saksi']) {
                $max_saksi = $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_saksi'];
            }

            if ($max_bukti < $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_bukti']) {
                $max_bukti = $laporan_kekerasan_seksual[$laporan_ks_key]['bobot_bukti'];
            }

            $kriteria_cedera_fisik = Kriteria::where('jenis_kriteria', $kriteria_pilihan_cedera_fisik[0]['jenis_kriteria'])->get();
            $kriteria_gangguan_psikis = Kriteria::where('jenis_kriteria', $kriteria_pilihan_gangguan_psikis[0]['jenis_kriteria'])->get();
            $kriteria_frekuensi = Kriteria::where('jenis_kriteria', $kriteria_pilihan_frekuensi[0]['jenis_kriteria'])->get();
            $kriteria_saksi = Kriteria::where('jenis_kriteria', $kriteria_pilihan_saksi[0]['jenis_kriteria'])->get();
            $kriteria_bukti = Kriteria::where('jenis_kriteria', $kriteria_pilihan_bukti[0]['jenis_kriteria'])->get();

            $bobot_cedera_fisik = $kriteria_cedera_fisik[0]['bobot'];
            $bobot_gangguan_psikis = $kriteria_gangguan_psikis[0]['bobot'];
            $bobot_frekuensi = $kriteria_frekuensi[0]['bobot'];
            $bobot_saksi = $kriteria_saksi[0]['bobot'];
            $bobot_bukti = $kriteria_bukti[0]['bobot'];
            // $bobot_saksi = 0.15;
            // $bobot_bukti = 0.15;
        }

        foreach ($laporan_kekerasan_seksual as $laporan_ks_key => $laporan_ks_value) {
            $no_laporan = $laporan_ks_value->no_laporan;
            $count_kriteria_cedera_fisik = ($min_cedera_fisik / $laporan_ks_value->bobot_cedera_fisik) * $bobot_cedera_fisik;
            $count_kriteria_gangguan_psikis = ($min_gangguan_psikis / $laporan_ks_value->bobot_gangguan_psikis) * $bobot_gangguan_psikis;
            $count_kriteria_frekuensi = ($min_frekuensi / $laporan_ks_value->bobot_frekuensi) * $bobot_frekuensi;
            $count_kriteria_saksi = ($laporan_ks_value->bobot_saksi / $max_saksi) * $bobot_saksi;
            $count_kriteria_bukti = ($laporan_ks_value->bobot_bukti / $max_bukti) * $bobot_bukti;

            $laporan_kekerasan_seksual[$laporan_ks_key]['total_bobot'] = $count_kriteria_cedera_fisik + $count_kriteria_gangguan_psikis + $count_kriteria_frekuensi + $count_kriteria_saksi + $count_kriteria_bukti;
            $laporan_kekerasan_seksual[$laporan_ks_key]['total_bobot'] =  round($laporan_kekerasan_seksual[$laporan_ks_key]['total_bobot'], 3);
        }

        $laporan_kekerasan_seksual = $laporan_kekerasan_seksual->sortByDesc('total_bobot');

        // echo '<pre>';
        // var_dump($min_cedera_fisik);
        // var_dump($min_gangguan_psikis);
        // var_dump($min_frekuensi);
        // var_dump($max_saksi);
        // var_dump($max_bukti);
        // var_dump($bobot_cedera_fisik);
        // var_dump($bobot_gangguan_psikis);
        // var_dump($bobot_frekuensi);
        // var_dump($bobot_saksi);
        // var_dump($bobot_bukti);
        // var_dump($laporan_kekerasan_seksual);
        // echo '</pre>';
        // exit;

        $sortedUsers = $laporan_kekerasan_seksual->sortByDesc('total_bobot');

        return view('admin/kelola_laporan', ['laporan_kekerasan_seksual' => $laporan_kekerasan_seksual]);
    }

    public function getLaporanById($no_laporan)
    {

        $laporan_kekerasan_seksual = Laporkan::where('no_laporan', $no_laporan)->first();

        return response()->json($laporan_kekerasan_seksual);
    }

    public function updatePenanganan(Request $request, $no_laporan)
    {
        $laporan_kekerasan_seksual = Laporkan::where('no_laporan', $no_laporan);

        if ($laporan_kekerasan_seksual) {
            $laporan_kekerasan_seksual->update([
                'penanganan' => $request->penanganan
            ]);
            return response()->json(['message' => 'Catatan Dikirim!']);
        } else {
            return response()->json(['message' => 'No laporan tidak ditemukan!'], 404);
        }
    }

    public function updateStatus(Request $request, $no_laporan)
    {
        $laporan_kekerasan_seksual = Laporkan::where('no_laporan', $no_laporan);

        if ($laporan_kekerasan_seksual) {
            $laporan_kekerasan_seksual->update([
                'status_laporan' => $request->status_laporan,
                'updated_at' => now() // Set updated_at to the current timestamp
            ]);
            return response()->json(['message' => 'Status Laporan Diperbarui!']);
        } else {
            return response()->json(['message' => 'No laporan tidak ditemukan!'], 404);
        }
    }

    public function updateSanksi(Request $request, $no_laporan)
    {
        $response = $request->post();
        $dokumen = $request->file('file_sanksi');

        $sanksi = Sanksi::where('no_laporan', $no_laporan);

        if (!$sanksi) {
            return response()->json(['message' => 'No laporan tidak ditemukan!'], 404);
        }

        try {
            // Lakukan validasi dan simpan file jika ada file upload
            if (!empty($dokumen->getFilename()) && $dokumen->getMimeType() == 'application/pdf') {
                $tempPath = $dokumen->getPathname();
                $dokumen->move(public_path('file'), $dokumen->getClientOriginalName());
                $sanksi->update([
                    'sanksi' => $response['sanksi'],
                    'bukti_sanksi' => $response['bukti_sanksi'],
                    'file_sanksi' => $tempPath,
                    'updated_at' => now()
                ]);
            } else {
                $sanksi->update([
                    'sanksi' => $response['sanksi'],
                    'bukti_sanksi' => $response['bukti_sanksi'],
                    'updated_at' => now()
                ]);
            }

            return response()->json(['message' => 'Sanksi berhasil diperbarui!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function jumlah_laporan()
    {
        $jumlah = Laporkan::count();
        return response()->json(['jumlah' => $jumlah]);
    }

    public function generate_pdf_laporan($no_laporan)
    {
        $petugas = Petugas::all();
        $sanksi = Sanksi::where('no_laporan', $no_laporan)->first();
        $laporan_kekerasan_seksual = Laporkan::where('no_laporan', $no_laporan)->first();
        if (!$laporan_kekerasan_seksual) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }

        $mpdf = new Mpdf([
            'orientation' => 'L'
        ]);

        $html = view('admin/generate_pdf_laporan', compact('laporan_kekerasan_seksual', 'petugas', 'sanksi'))->render();
        $mpdf->WriteHTML($html);
        $pdf = $mpdf->Output('', 'S');

        return response()->streamDownload(
            fn () => print($pdf),
            "document.pdf"
        );
    }
}
