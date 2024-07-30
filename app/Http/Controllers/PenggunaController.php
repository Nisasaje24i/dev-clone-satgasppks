<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Karyawan;
use App\Models\Mahasiswa;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function data_pengguna()
    {
        // Retrieve data for mahasiswa, petugas, dosen, and karyawan
        $mahasiswa = Mahasiswa::select('id', 'nim as no_identitas', 'nama_lengkap', 'email')
            ->get();
        $dosen = Dosen::select('id', 'nidn as no_identitas', 'nama_lengkap', 'email')
            ->get();
        $karyawan = Karyawan::select('id', 'nip as no_identitas', 'nama_lengkap', 'email')
            ->get();
        $petugas = Petugas::select('id', 'idpeg as no_identitas', 'nama_lengkap',  'email')
            ->get();

        $data = collect([$mahasiswa, $dosen, $karyawan,  $petugas])->collapse();
        return view('admin.data_pengguna', compact('data'));
    }
}
