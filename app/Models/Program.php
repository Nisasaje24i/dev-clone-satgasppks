<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'program';
    protected $fillable = ['no_program', 'judul_program', 'deskripsi_program', 'perencanaan_tanggal_program', 'narahubung', 'image', 'status_program', 'tanggal_terlaksana'];
}
