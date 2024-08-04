<?php

namespace App\Http\Controllers;

use App\Models\Laporkan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function dashboard_admin(Request $request)
    {
        $jumlah_laporan_masuk = Laporkan::where('status_laporan', '!=', 'selesai')->count();
        $jumlah_selesai = Laporkan::where('status_laporan', 'selesai')->count();

        $jumlah_laporan_masuk_div_pelaporan = Laporkan::where('kode_alur', '<=', '02')->count();
        $jumlah_selesai_div_pelaporan = Laporkan::where('kode_alur', '>', '02')->count();

        $jumlah_laporan_masuk_div_pencegahan = Laporkan::where('kode_alur', '03')->count();
        $jumlah_selesai_div_pencegahan = Laporkan::where('kode_alur', '>', '03')->count();

        $jumlah_laporan_masuk_div_pemulihan = Laporkan::where('kode_alur', '04')->count();
        $jumlah_selesai_div_pemulihan = Laporkan::where('kode_alur', '>', '04')->count();

        $jumlah_laporan_per_bulan = Laporkan::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total')
            ->where('status_laporan', '!=', 'selesai')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $jumlah_laporan_per_bulan_selesai = Laporkan::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total')
            ->where('status_laporan', 'selesai')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $laporan_array = [];
        $laporan_array_selesai = [];

        foreach ($jumlah_laporan_per_bulan as $laporan) {
            $bulan = Carbon::create()->month($laporan->month)->format('F');
            $laporan_array[] = [$bulan, $laporan->total];
            // echo '<pre>';
            // var_dump($laporan_array);
            // echo '</pre>';
            // exit;
        }

        foreach ($jumlah_laporan_per_bulan_selesai as $laporan_selesai) {
            $bulan = Carbon::create()->month($laporan_selesai->month)->format('F');
            $laporan_array_selesai[] = [$bulan, $laporan_selesai->total];
            // echo '<pre>';
            // var_dump('selesai', $laporan_array_selesai);
            // echo '</pre>';
            // exit;
        }
        return view('admin/dashboard_admin', [
            'jumlah_laporan_masuk' => $jumlah_laporan_masuk,
            'jumlah_selesai' => $jumlah_selesai,
            'laporan_array' => $laporan_array,
            'laporan_array_selesai' => $laporan_array_selesai,
            'jumlah_laporan_masuk_div_pelaporan' => $jumlah_laporan_masuk_div_pelaporan,
            'jumlah_selesai_div_pelaporan' => $jumlah_selesai_div_pelaporan,
            'jumlah_laporan_masuk_div_pencegahan' => $jumlah_laporan_masuk_div_pencegahan,
            'jumlah_selesai_div_pencegahan' => $jumlah_selesai_div_pencegahan,
            'jumlah_laporan_masuk_div_pemulihan' => $jumlah_laporan_masuk_div_pemulihan,
            'jumlah_selesai_div_pemulihan' => $jumlah_selesai_div_pemulihan
        ]);
    }
}
