<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasTa extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'laporan_ta',
        'dokumen_penunjang',
        'file_presentasi',
        'product',
        'haki',
        'video_trailer',
        'poster',
        'artikel_jurnal',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
