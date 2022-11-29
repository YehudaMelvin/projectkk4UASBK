<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable =[
        'username',
        'email',
        'telp',
        'type',
        'jmlh_pesan',
        'check_in',
        'check_out',
        'to_harga'
    ];
}
