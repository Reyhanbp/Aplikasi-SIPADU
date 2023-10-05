<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datakk extends Model
{
    use HasFactory;
    protected $table = 'datakks';
    protected $fillable = [
        'no_kk',
        'kepala_keluarga_id' ,
        'desa' ,
        'rt',
        'rw',
        'kecamatan',
        'kabupaten' ,
        'provinsi' ,

    ];

    public function data_penduduk()
    {
        return $this->belongsTo(DataPenduduk::class, 'kepala_keluarga_id');
    }
    public function datapenduduks()
    {
        return $this->hasMany(DataPenduduk::class);
    }
    public function addanggota()
    {
        return $this->hasMany(AddAnggota::class, 'kk_id');
    }

}
