<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JilidLaporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'page_berwarna',
        'page_hitamPutih',
        'exemplar',
        'total',
        'bukti_pembayaran',
        'file',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
