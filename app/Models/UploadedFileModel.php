<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedFileModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'path',
        'type',
    ];
}
