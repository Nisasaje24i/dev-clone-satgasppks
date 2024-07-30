<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporkan extends Model
{
    use HasFactory;
    protected $table = 'laporan_kekerasan_seksual';
    protected $fillable = ['no_laporan', 'nama_lengkap_pelapor', 'jenis_identitas_pelapor', 'nomor_identitas_pelapor', 'no_hp_pelapor', 'nik', 'profesi_pelapor', 'nama_lengkap_terlapor', 'status_terlapor', 'nomor_identitas_terlapor', 'jenis_kekerasan_seksual', 'cedera_fisik', 'gangguan_psikis', 'frekuensi', 'saksi', 'bukti', 'hasil_hitung', 'status_laporan', 'penanganan', 'updated_at'];
}
