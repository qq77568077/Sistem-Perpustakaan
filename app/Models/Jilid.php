<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jilid extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenis_pengumpulan',
        'judul',
        'page_berwarna',
        'page_hitamPutih',
        'exemplar',
        'cover',
        'total',
        'bukti_pembayaran',
        'file',
        'keterangan',
        'status',
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function pengumpulan()
    {
        return $this->belongsTo(Pengumpulan::class, 'jenis_pengumpulan');
    }
}
