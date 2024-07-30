<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saksi extends Model
{
    use HasFactory;
    protected $table = 'kriteria_saksi';
    protected $fillable = ['no_laporan', 'saksi', 'nama_lengkap_saksi', 'no_hp_saksi'];
}
