<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kategori',
        'jenis_file',
        'bukti_file',
        'keterangan',
        'status',
        'updated_at',
        'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'jenis_file');
    }
}
