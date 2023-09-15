<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'beritas';
    protected $fillable = [
        'jdl_berita',
        'desc_berita',
        'foto',
        'link',

    ];

    public static function booted()
    {
        parent::boot();

        self::deleted(function ($model) {
            if (file_exists(storage_path('app/public/' . str_replace('storage/', '', $model->foto)))) {
                unlink(storage_path('app/public/' . str_replace('storage/', '', $model->foto)));
            }
        });
    }

}
