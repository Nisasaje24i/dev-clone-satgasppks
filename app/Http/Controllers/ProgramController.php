<?php

namespace App\Http\Controllers;

use App\Models\DaftarProgram;
use App\Models\Dosen;
use App\Models\Karyawan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\File;

class ProgramController extends Controller
{

    public function jumlah_program()
    {
        $jumlah = Program::count();
        return response()->json(['jumlah' => $jumlah]);
    }

    public function program(Request $request)
    {
        $programs = Program::all();
        $programs = Program::all();
        $daftar_program = DaftarProgram::all();
        $id_login = $request->session()->get('id_login');
        $id_logins = '';

        if (strpos($id_login, 'nim') === 0) {
            // id_login dimulai dengan 'nim'
            $id_logins = preg_replace('/nim/', '', $id_login);
            $mahasiswa = Mahasiswa::all();
            foreach ($mahasiswa as $mhs) {
                if ($mhs->nim == $id_login) {
                    $nama = $mhs->nama_lengkap;
                }
            }
        } elseif (strpos($id_login, 'nidn') === 0) {
            // id_login dimulai dengan 'nidn'
            $id_logins = preg_replace('/nidn/', '', $id_login);
            $dosen = Dosen::all();
            foreach ($dosen as $dsn) {
                if ($dsn->nidn == $id_login) {
                    $nama = $dsn->nama_lengkap;
                }
            }
        } elseif (strpos($id_login, 'nip') === 0) {
            // id_login dimulai dengan 'nip'
            $id_logins = preg_replace('/nip/', '', $id_login);
            $karyawan = Karyawan::all();
            foreach ($karyawan as $kry) {
                if ($kry->nip == $id_login) {
                    $nama = $kry->nama_lengkap;
                }
            }
        } else {
            $nama = 'ID tidak valid';
        }

        $id_logins = preg_replace('/\D/', '', $id_logins);
        foreach ($daftar_program as $dp) {
            $nomor_identitas_angka = preg_replace('/\D/', '', $dp->nomor_identitas_audience);
        }
        $terdaftar = $id_logins == $nomor_identitas_angka;
        // echo '<pre>';
        // dd($terdaftar);
        // echo '</pre>';
        // exit;

        return view('user/program', ['programs' => $programs, 'terdaftar' => $terdaftar]);
    }

    public function program_admin()
    {
        $programs = Program::all();

        return view('admin/program_admin', ['programs' => $programs]);
    }

    public function tambah_data_program(Request $request)
    {
        // Validasi data
        $request->validate([
            'no_program' => 'required',
            'judul_program' => 'required',
            'deskripsi_program' => 'required',
            'perencanaan_tanggal_program' => 'required',
            'narahubung' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_program' => 'required'
        ]);

        // Upload gambar
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $no_program = "Pr" . $request->no_program;
        $program_terlaksana = $request->status_program === 'Terlaksana' ? $request->perencanaan_tanggal_program : null;

        Program::create([
            'no_program' => $no_program,
            'judul_program' => $request->judul_program,
            'deskripsi_program' => $request->deskripsi_program,
            'perencanaan_tanggal_program' => $request->perencanaan_tanggal_program,
            'narahubung' => $request->narahubung,
            'image' => $imageName,
            'status_program' => $request->status_program,
            'tanggal_terlaksana' => $program_terlaksana
        ]);

        return response()->json(['success' => 'Program berhasil ditambahkan.']);
    }

    public function edit_data_program(Request $request, $no_program)
    {
        // Validasi data
        $request->validate([
            'judul_program' => 'required',
            'deskripsi_program' => 'required',
            'perencanaan_tanggal_program' => 'required',
            'narahubung' => 'required',
            'status_program' => 'required'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            $oldImagePath = public_path('images/' . $request->old_image);
            File::delete($oldImagePath);

            // Upload gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $program_terlaksana = $request->status_program === 'Terlaksana' ? $request->perencanaan_tanggal_program : null;


            // Update Program dengan gambar baru
            Program::where('no_program', $no_program)->update([
                'judul_program' => $request->judul_program,
                'deskripsi_program' => $request->deskripsi_program,
                'perencanaan_tanggal_program' => $request->perencanaan_tanggal_program,
                'narahubung' => $request->narahubung,
                'image' => $imageName,
                'status_program' => $request->status_program,
                'tanggal_terlaksana' => $program_terlaksana
            ]);
        } else {

            $program_terlaksana = $request->status_program === 'Terlaksana' ? $request->perencanaan_tanggal_program : null;

            // Jika tidak ada perubahan gambar, update Program tanpa mengubah gambar
            Program::where('no_program', $no_program)->update([
                'judul_program' => $request->judul_program,
                'deskripsi_program' => $request->deskripsi_program,
                'perencanaan_tanggal_program' => $request->perencanaan_tanggal_program,
                'narahubung' => $request->narahubung,
                'status_program' => $request->status_program,
                'tanggal_terlaksana' => $program_terlaksana
            ]);
        }

        return response()->json(['success' => 'Program berhasil diperbarui.']);
    }

    public function delete($id)
    {
        Program::where('no_program', $id)->delete();
        return redirect()->to('program_admin')->with('success', 'Berhasil Menghapus data');
    }

    public function daftar_program(Request $request)
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

        $judul = $request->query('judul');

        return view('user/daftar_program', ['judul' => $judul, 'nama' => $nama, 'id_login' => $id_login]);
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'nama_audience' => 'required',
            'jenis_identitas_audience' => 'required',
            'nomor_identitas_audience' => 'required',
            'email_audience' => 'required',
            'program_diikuti' => 'required'
        ]);

        DaftarProgram::create([
            'nama_audience' => $request->nama_audience,
            'jenis_identitas_audience' => $request->jenis_identitas_audience,
            'nomor_identitas_audience' => $request->nomor_identitas_audience,
            'email_audience' => $request->email_audience,
            'program_diikuti' => $request->program_diikuti
        ]);

        return response()->json(['success' => 'Berhasil daftar.']);
    }
}
