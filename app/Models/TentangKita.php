<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKita extends Model
{
    use HasFactory;
    protected $table = 'tentang_kitas';
    protected $fillable = [
        'jdl_kita',
        'desc_kita',

    ];
}
