<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_ta'
    ];
    public function files()
    {
        return $this->hasMany(File::class, 'kategori');
    }
}
