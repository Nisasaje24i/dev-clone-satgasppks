<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alur extends Model
{
    use HasFactory;
    protected $table = 'tbl_alur';
    protected $fillable = ['kode_alur', 'nama_alur'];
}
