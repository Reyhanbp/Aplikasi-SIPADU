<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPindah extends Model
{
    use HasFactory;
    protected $table = 'data_pindahs';
    protected $fillable = [
        'data_penduduk_id',
        'tgl_pindah',
        'sebab_pindah',
    ];

    public function data_penduduk()
    {
        return $this->belongsTo(DataPenduduk::class, 'data_penduduk_id');
    }
}
