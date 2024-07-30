<?php

namespace App\Http\Controllers;

use App\Models\Laporkan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function dashboard_admin()
    {
        $jumlah_laporan_masuk = Laporkan::where('status_laporan', '!=', 'selesai')->count();
        $jumlah_selesai = Laporkan::where('status_laporan', 'selesai')->count();
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
            'laporan_array_selesai' => $laporan_array_selesai
        ]);
    }
}
