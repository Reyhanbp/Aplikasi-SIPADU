<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    use HasFactory;
    protected $table = 'data_penduduks';
    protected $fillable = [
        'NIK',
        'name',
        'tmpt_lahir',
        'tgl_lahir',
        'desa_kelurahan',
        'rt',
        'rw',
        'agama',
        'pekerjaan',
        'status',
        'file_foto',
        'data_kk_id'

    ];

    public function datakk()
    {
        return $this->hasMany(Datakk::class);
    }
    public function data_penduduk()
    {
        return $this->belongsTo(Datakk::class,'data_kk_id');
    }
    public function add_anggota()
    {
        return $this->hasMany(AddAnggota::class);
    }

}
