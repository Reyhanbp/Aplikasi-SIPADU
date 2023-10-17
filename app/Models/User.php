<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'profil',
        'name',
        'email',
        'password',
        'level',
        'jenis_kelamin',
        'user_group_id',
        'data_penduduk_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_group()
    {
        return $this->belongsTo(UserGroup::class);
    }
    public function data_penduduk()
    {
        return $this->belongsTo(DataPenduduk::class);
    }
    public function saran()
    {
        return $this->hasMany(KotakSaran::class);
    }
    public static function booted()
    {
        parent::boot();

        self::deleted(function ($model) {
            if (file_exists(storage_path('app/public/' . str_replace('storage/', '', $model->profil)))) {
                unlink(storage_path('app/public/' . str_replace('storage/', '', $model->profil)));
            }
        });
    }

}
