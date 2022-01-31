<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nonracikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'obatalkes_nama',
        'stok',
        'signa_nama',
    ];
}
