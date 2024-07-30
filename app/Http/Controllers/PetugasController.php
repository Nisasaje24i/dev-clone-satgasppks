<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Petugas;
use App\Models\Dosen;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PetugasController extends Controller
{
    public function jumlah_petugas()
    {
        $jumlah = Petugas::count();
        return response()->json(['jumlah' => $jumlah]);
    }

    public function data_petugas()
    {
        $petugas = Petugas::all();

        return view('admin/data_petugas', ['petugas' => $petugas]);
    }

    public function getData($profesi)
    {
        switch ($profesi) {
            case 'Mahasiswa':
                $data = Mahasiswa::all();
                break;
            case 'Dosen':
                $data = Dosen::all();
                break;
            case 'Karyawan':
                $data = Karyawan::all();
                break;
            default:
                $data = [];
                break;
        }

        return response()->json(['data' => $data]);
    }

    public function tambah_data_petugas(Request $request)
    {

        $idpeg = "idpeg" . $request->idpeg;
        $password = "adminppks" . $request->password;

        // Validasi data
        $request->validate([
            'idpeg' => 'required',
            'nama_lengkap' => 'required',
            'profesi' => 'required',
            'jabatan_satgas' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Atur sesuai kebutuhan
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Petugas::create([
            'idpeg' => $idpeg,
            'nama_lengkap' => $request->nama_lengkap,
            'profesi' => $request->profesi,
            'jabatan_satgas' => $request->jabatan_satgas,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'password' => $password,
            'image' => $imageName
        ]);

        return response()->json(['success' => 'Data petugas berhasil disimpan']);
    }

    public function getPetugas($idpeg)
    {
        $petugas = Petugas::where('idpeg', $idpeg)->first();

        return response()->json($petugas);
    }

    public function update(Request $request, $idpeg)
    {
        $request->validate([
            'profesi' => 'required|string|max:255',
            'jabatan_satgas' => 'required|string|max:255',
            'nohp' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            $oldImagePath = public_path('images/' . $request->old_image);
            File::delete($oldImagePath);

            // Upload gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // Update artikel dengan gambar baru
            Petugas::where('idpeg', $idpeg)->update([
                'profesi' => $request->profesi,
                'jabatan_satgas' => $request->jabatan_satgas,
                'nohp' => $request->nohp,
                'email' => $request->email,
                'password' => $request->password,
                'image' => $imageName
            ]);
        } else {
            // Jika tidak ada perubahan gambar, update artikel tanpa mengubah gambar
            Petugas::where('idpeg', $idpeg)->update([
                'profesi' => $request->profesi,
                'jabatan_satgas' => $request->jabatan_satgas,
                'nohp' => $request->nohp,
                'email' => $request->email,
                'password' => $request->password
            ]);
        }

        return response()->json(['message' => 'Data petugas berhasil diperbarui']);
    }

    public function delete($id)
    {
        Petugas::where('idpeg', $id)->delete();
        return redirect()->to('data_petugas')->with('success', 'Berhasil Menghapus data');
    }
}
