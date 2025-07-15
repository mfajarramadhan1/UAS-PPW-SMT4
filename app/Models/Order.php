<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

   protected $fillable = [
    'nama',
    'telepon',
    'alamat',
    'metode_pembayaran', // tambahkan ini
    'items',
    'total',
];

}

