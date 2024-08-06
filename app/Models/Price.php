<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'pageBerwarnaPrice',
        'pageHitamPutihPrice',
        'softjilidprice',
        'hardjilidprice',
        'is_active',
    ];

    // Accessor untuk memformat tanggal
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y H:i:s');
    }
}
