<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotakSaran extends Model
{
    use HasFactory;
    protected $table = 'kotak_sarans';
    protected $fillable = [
        'users_id',
        'desc_saran',

    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
