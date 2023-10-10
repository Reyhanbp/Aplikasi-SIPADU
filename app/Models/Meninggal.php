<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meninggal extends Model
{
    use HasFactory;
    protected $table = 'meninggals';
    protected $fillable = [
        'data_penduduk_id',
        'tgl_meninggal',
        'sebab_meninggal',
    ];

    public function data_penduduk()
    {
        return $this->belongsTo(DataPenduduk::class, 'data_penduduk_id');
    }
}
