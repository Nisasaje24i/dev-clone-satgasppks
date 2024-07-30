<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{

    public function jumlah_artikel()
    {
        $jumlah = Artikel::count();
        return response()->json(['jumlah' => $jumlah]);
    }

    public function artikel()
    {
        $artikels = Artikel::all();
        return view('user/artikel', ['artikels' => $artikels]);
    }

    public function artikel_admin()
    {
        $artikels = Artikel::all();

        return view('admin/artikel_admin', ['artikels' => $artikels]);
    }

    public function tambah_data_artikel(Request $request)
    {
        // Validasi data
        $request->validate([
            'no_artikel' => 'required',
            'judul_artikel' => 'required',
            'deskripsi_artikel' => 'required',
            'sumber' => 'required',
            'link_sumber' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Atur sesuai kebutuhan
        ]);

        // Upload gambar
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        // dump($imageName);
        // exit();
        $no_artikel = "Ar" . $request->no_artikel;

        Artikel::create([
            'no_artikel' => $no_artikel,
            'judul_artikel' => $request->judul_artikel,
            'deskripsi_artikel' => $request->deskripsi_artikel,
            'sumber' => $request->sumber,
            'link_sumber' => $request->link_sumber,
            'image' => $imageName
        ]);

        return response()->json(['success' => 'Artikel berhasil ditambahkan.']);
    }

    public function edit_data_artikel(Request $request, $no_artikel)
    {
        // Validasi data
        $request->validate([
            'judul_artikel' => 'required',
            'deskripsi_artikel' => 'required',
            'sumber' => 'required',
            'link_sumber' => 'required',
        ]);

        // Cek apakah ada perubahan gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            $oldImagePath = public_path('images/' . $request->old_image);
            File::delete($oldImagePath);

            // Upload gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // Update artikel dengan gambar baru
            Artikel::where('no_artikel', $no_artikel)->update([
                'judul_artikel' => $request->judul_artikel,
                'deskripsi_artikel' => $request->deskripsi_artikel,
                'sumber' => $request->sumber,
                'link_sumber' => $request->link_sumber,
                'image' => $imageName
            ]);
        } else {
            // Jika tidak ada perubahan gambar, update artikel tanpa mengubah gambar
            Artikel::where('no_artikel', $no_artikel)->update([
                'judul_artikel' => $request->judul_artikel,
                'deskripsi_artikel' => $request->deskripsi_artikel,
                'sumber' => $request->sumber,
                'link_sumber' => $request->link_sumber,
            ]);
        }

        return response()->json(['success' => 'Artikel berhasil diperbarui.']);
    }


    public function delete($id)
    {
        Artikel::where('no_artikel', $id)->delete();
        return redirect()->to('artikel_admin')->with('success', 'Berhasil Menghapus data');
    }
}
