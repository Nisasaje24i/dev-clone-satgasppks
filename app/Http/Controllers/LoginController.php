<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Karyawan;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request)
    {
        $id_login = $request->id_login;
        $password = $request->password;

        if (str_contains(strtolower($id_login), 'nim')) {
            $mahasiswa = Mahasiswa::where('nim', $id_login)->first();
            if ($mahasiswa && $password === $mahasiswa['password']) {
                $request->session()->put('id_login', $id_login);
                $request->session()->put('nama_lengkap', $mahasiswa['nama_lengkap']);
                $request->session()->put('program_studi', $mahasiswa['program_studi']);
                $request->session()->put('tahun_angkatan', $mahasiswa['tahun_angkatan']);
                $request->session()->put('email', $mahasiswa['email']);
                return redirect('/dashboard')->with('success', 'Login berhasil!');
            } else {
                return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan atau password salah');
            }
        } elseif (str_contains(strtolower($id_login), 'nidn')) {
            $dosen = Dosen::where('nidn', $id_login)->first();
            if ($dosen && $password === 'ppks' . substr($id_login, -10)) {
                $request->session()->put('id_login', $id_login);
                return redirect('/dashboard')->with('success', 'Login berhasil!');
            } else {
                return redirect()->back()->with('error', 'Data dosen tidak ditemukan atau password salah');
            }
        } elseif (str_contains(strtolower($id_login), 'nip')) {
            $karyawan = Karyawan::where('nip', $id_login)->first();
            if ($karyawan && $password === 'adminppks' . substr($id_login, -2)) {
                $request->session()->put('id_login', $id_login);
                return redirect('/dashboard')->with('success', 'Login berhasil!');
            } else {
                return redirect()->back()->with('error', 'Data karyawan tidak ditemukan atau password salah');
            }
        } elseif (str_contains(strtolower($id_login), 'idpeg')) {
            $petugas = Petugas::where('idpeg', $id_login)->first();
            if ($petugas && $password === $petugas['password']) {
                $request->session()->put('id_login', $id_login);
                $request->session()->put('kode_jabatan', $petugas['kode_jabatan']);
                $request->session()->put('jabatan_satgas', $petugas['jabatan_satgas']);
                $request->session()->put('nama_lengkap', $petugas['nama_lengkap']);
                return redirect('/dashboard_admin')->with('success', 'Login berhasil!');
            } else {
                return redirect()->back()->with('error', 'Data petugas tidak ditemukan atau password salah');
            }
        }

        return redirect('login/login')->with('error', 'Login gagal');
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/dashboard');
    }

    public function login()
    {
        return view('login/login');
    }
}
