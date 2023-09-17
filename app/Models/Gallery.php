<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galleries';
    protected $fillable = [
        'jdl_gallery',
        'gallery',

    ];

    public static function booted()
    {
        parent::boot();

        self::deleted(function ($model) {
            if (file_exists(storage_path('app/public/' . str_replace('storage/', '', $model->gallery)))) {
                unlink(storage_path('app/public/' . str_replace('storage/', '', $model->gallery)));
            }
        });
    }
}
