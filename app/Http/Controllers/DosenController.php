<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{

    public function jumlah_dosen()
    {
        $jumlah = Dosen::count();
        return response()->json(['jumlah' => $jumlah]);
    }

    public function data_dosen()
    {
        $dosens = Dosen::all();

        return view('admin/data_dosen', ['dosens' => $dosens]);
    }

    public function tambah_data_dosen(Request $request)
    {

        $nidn = "nidn" . $request->nidn;
        $password = "ppks" . $request->password;

        Dosen::create([
            'nidn' => $nidn,
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'password' => $password
        ]);

        return response()->json(['success' => 'Data dosen berhasil disimpan']);
    }

    public function getDosen($nidn)
    {
        $dosen = Dosen::where('nidn', $nidn)->first();

        return response()->json($dosen);
    }

    public function update(Request $request, $nidn)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
        ]);

        $dosen = Dosen::where('nidn', $nidn)->first();

        $dosen->update([
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json(['message' => 'Data dosen berhasil diperbarui']);
    }

    public function delete($id)
    {
        Dosen::where('nidn', $id)->delete();
        return redirect()->to('data_dosen')->with('success', 'Berhasil Menghapus data');
    }
}
