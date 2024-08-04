<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisiPencegahanDeteksi extends Model
{
    use HasFactory;
    protected $table = 'tb_div_pencegahan_dan_deteksi';
    protected $fillable = ['no_laporan', 'hasil_observasi_korban', 'nama_pelaku', 'wawancara_pelaku', 'nama_saksi_dari_pelaku', 'keteranga_saksi_dari_pelaku', 'no_hp_saksi_pelaku', 'informasi_tambahan', 'bukti_tambahan', 'updated_at'];
}
