<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaKS extends Model
{
    use HasFactory;
    protected $table = 'tb_nama_ks';
    protected $fillable = ['no_ks', 'nama_kekerasan_seksual'];
}
