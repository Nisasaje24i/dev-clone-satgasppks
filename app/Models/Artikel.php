<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';
    protected $fillable = ['no_artikel', 'judul_artikel', 'deskripsi_artikel', 'sumber', 'link_sumber', 'image'];
}
