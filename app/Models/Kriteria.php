<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria_pertanyaan';
    protected $fillable = ['jenis_kriteria', 'kriteria', 'bobot', 'pertanyaan'];
}
