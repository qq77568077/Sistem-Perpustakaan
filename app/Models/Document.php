<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokumen'
    ];

    public function file()
    {

        return $this->hasMany(File::class, 'jenis_file');
    }
}
