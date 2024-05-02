<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nrp',
        'email',
        'user_id',
        'prodi_id'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
