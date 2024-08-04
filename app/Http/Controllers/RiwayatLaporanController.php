<?php

namespace App\Http\Controllers;

use App\Models\Laporkan;
use App\Models\Alur;
use Illuminate\Http\Request;

class RiwayatLaporanController extends Controller
{
    public function riwayat_laporan(Request $request)
    {
        $id_login = $request->session()->get('id_login');

        $id_logins = preg_replace('/\D/', '', $id_login);


        // Ambil laporan berdasarkan id_pelapor yang sesuai dengan id_logins
        $laporan_kekerasan_seksual = Laporkan::where('nomor_identitas_pelapor', $id_logins)->get();
        foreach ($laporan_kekerasan_seksual as $datum_laporan_kekerasan_seksualKey => $datum_laporan_kekerasan_seksualValue) {
            $alur = Alur::where('kode_alur', $datum_laporan_kekerasan_seksualValue['kode_alur'])->first();
            $laporan_kekerasan_seksual[$datum_laporan_kekerasan_seksualKey]['nama_alur'] = $alur['nama_alur'];
        }

        return view('user.riwayat_laporan', [
            'laporan_kekerasan_seksual' => $laporan_kekerasan_seksual,
        ]);
    }
}
