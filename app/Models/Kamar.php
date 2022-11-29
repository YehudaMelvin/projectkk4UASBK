<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $fillable =[
        'type',
        'harga',
        'desc',
        'fas',
        'kebijakan',
        'jmlh_kamar'
    ];
}
