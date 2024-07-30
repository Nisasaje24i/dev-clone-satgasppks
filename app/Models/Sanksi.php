<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    use HasFactory;
    protected $table = 'sanksi';
    protected $fillable = ['no_laporan', 'sanksi', 'bukti_sanksi', 'file_sanksi', 'updated_at'];
}
