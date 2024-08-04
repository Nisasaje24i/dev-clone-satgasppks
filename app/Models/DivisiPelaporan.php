<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisiPelaporan extends Model
{
    use HasFactory;
    protected $table = 'tb_div_pelaporan';
    protected $fillable = ['no_laporan', 'tanggal_pertemuan', 'tempat_pertemuan', 'kronologi_kekerasan_seksual', 'cedera_fisik', 'dampak_psikis', 'updated_at'];
}
