<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    use HasFactory;
    protected $table = 'data_bukti';
    protected $fillable = ['no_laporan', 'bukti', 'dokumen_bukti'];
}
