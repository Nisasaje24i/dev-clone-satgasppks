<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaPilihan extends Model
{
    use HasFactory;
    protected $table = 'pilihan';
    protected $fillable = ['jenis_kriteria', 'nama_pilihan', 'bobot'];
}
