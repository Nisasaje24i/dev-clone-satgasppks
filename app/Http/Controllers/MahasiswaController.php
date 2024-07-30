<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function data_mahasiswa()
    {
        $mahasiswas = Mahasiswa::all();

        return view('admin/data_mahasiswa', ['mahasiswas' => $mahasiswas]);
    }

    public function tambah_data_mahasiswa(Request $request)
    {

        $nim = "nim" . $request->nim;
        $password = "ppks" . $request->password;

        Mahasiswa::create([
            'nim' => $nim,
            'nama_lengkap' => $request->nama_lengkap,
            'program_studi' => $request->program_studi,
            'tahun_angkatan' => $request->tahun_angkatan,
            'email' => $request->email,
            'password' => $password
        ]);

        return response()->json(['success' => 'Data mahasiswa berhasil disimpan']);
    }

    public function getMahasiswa($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        return response()->json($mahasiswa);
    }

    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'tahun_angkatan' => 'required|numeric',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
        ]);

        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        $mahasiswa->update([
            'nama_lengkap' => $request->nama_lengkap,
            'program_studi' => $request->program_studi,
            'tahun_angkatan' => $request->tahun_angkatan,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json(['message' => 'Data mahasiswa berhasil diperbarui']);
    }

    public function delete($id)
    {
        Mahasiswa::where('nim', $id)->delete();
        return redirect()->to('data_mahasiswa')->with('success', 'Berhasil Menghapus data');
    }

    public function jumlah_mahasiswa()
    {
        $jumlah = Mahasiswa::count();
        return response()->json(['jumlah' => $jumlah]);
    }
}
