<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{

    public function jumlah_karyawan()
    {
        $jumlah = Karyawan::count();
        return response()->json(['jumlah' => $jumlah]);
    }
    public function data_karyawan()
    {
        $karyawans = Karyawan::all();

        return view('admin/data_karyawan', ['karyawans' => $karyawans]);
    }

    public function tambah_data_karyawan(Request $request)
    {

        $nip = "nip" . $request->nip;
        $password = "ppks" . $request->password;

        Karyawan::create([
            'nip' => $nip,
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'password' => $password
        ]);

        return response()->json(['success' => 'Data karyawan berhasil disimpan']);
    }

    public function getKaryawan($nip)
    {
        $karyawan = Karyawan::where('nip', $nip)->first();

        return response()->json($karyawan);
    }

    public function update(Request $request, $nip)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
        ]);

        $karyawan = Karyawan::where('nip', $nip)->first();

        $karyawan->update([
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json(['message' => 'Data karyawan berhasil diperbarui']);
    }

    public function delete($id)
    {
        karyawan::where('nip', $id)->delete();
        return redirect()->to('data_karyawan')->with('success', 'Berhasil Menghapus data');
    }
}
