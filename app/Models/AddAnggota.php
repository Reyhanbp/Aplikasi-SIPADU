<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddAnggota extends Model
{
    use HasFactory;
    protected $table = 'add_anggotas';
    protected $fillable = [
        'kk_id',
        'hub_keluarga',
        'anggota_id',
    ];
    public function anggota_keluarga()
    {
        return $this->belongsTo(DataPenduduk::class,'anggota_id');
    }
    public function no_keluarga()
    {
        return $this->belongsTo(Datakk::class,'kk_id');
    }
}
