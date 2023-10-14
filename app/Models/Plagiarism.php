<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plagiarism extends Model
{
    use HasFactory;


    protected $fillable = [
        'file',
        'hasil_cek',
        'status'
    ]; 
}
