<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisiPemulihan extends Model
{
    use HasFactory;
    protected $table = 'tb_div_pemulihan';
    protected $fillable = ['no_laporan', 'penanganan_yang_diberikan', 'hasil_dari_penanganan', 'updated_at'];
}
