<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =[
        'no_pemesan',
        'tgl_pemesan',
        'username',
        'email',
        'no_telp',
        'metode_pemb',
        'hrg_total',
    ];
}
