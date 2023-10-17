<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendatang extends Model
{
    use HasFactory;
    protected $table = 'data_pendatangs';
    protected $fillable = [
        'NIK',
        'name',
        'tgl_datang',
        'jenis_kelamin',
        'pelapor_id',

    ];

    public function data_penduduk()
    {
        return $this->belongsTo(DataPenduduk::class, 'pelapor_id');
    }
}
