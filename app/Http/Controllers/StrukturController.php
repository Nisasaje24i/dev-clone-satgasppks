<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function struktur_organisasi()
    {
        $struktur_organisasi = StrukturOrganisasi::all();

        return view('admin/profile_struktur', ['struktur_organisasi' => $struktur_organisasi]);
    }

    public function tambah_struktur_organisasi(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'gambar_struktur' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar_profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Atur sesuai kebutuhan
        ]);

        // Handle gambar_struktur upload
        $imageStrukturName = time() . '_struktur.' . $request->gambar_struktur->extension();
        $request->gambar_struktur->move(public_path('images'), $imageStrukturName);

        // Handle gambar_profile upload
        $imageProfileName = time() . '_profile.' . $request->gambar_profile->extension();
        $request->gambar_profile->move(public_path('images'), $imageProfileName);

        StrukturOrganisasi::create([
            'deskripsi' => $request->deskripsi,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'gambar_struktur' => $imageStrukturName,
            'gambar_profile' => $imageProfileName
        ]);

        return response()->json(['success' => 'Data struktur organisasi berhasil disimpan']);
    }

    public function edit_struktur_organisasi(Request $request)
    {
    }
}
