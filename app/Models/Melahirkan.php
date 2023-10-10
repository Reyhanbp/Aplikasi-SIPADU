<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Melahirkan extends Model
{
    use HasFactory;
    protected $table = 'melahirkans';
    protected $fillable = [
        'name',
        'tgl_lahir',
        'jenis_kelamin',
        'data_kk_id',
    ];

    public function Data_kk()
    {
        return $this->belongsTo(Datakk::class, 'data_kk_id');
    }


}
