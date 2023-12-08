<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jilid extends Model
{
    use HasFactory;

    protected $fillable = [
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
}
