<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarProgram extends Model
{
    use HasFactory;
    protected $table = 'daftar_program';
    protected $fillable = ['nama_audience', 'jenis_identitas_audience', 'nomor_identitas_audience', 'email_audience', 'program_diikuti'];
}
