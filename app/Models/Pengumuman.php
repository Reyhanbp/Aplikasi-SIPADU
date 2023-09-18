<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
 
    protected $guarded = [];

    public static function booted()
    {
        parent::boot();

        self::deleted(function ($model) {
            if (file_exists(storage_path('app/public/' . str_replace('storage/', '', $model->file)))) {
                unlink(storage_path('app/public/' . str_replace('storage/', '', $model->file)));
            }
        });
    }
}
