<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';

    protected $fillable = [
        'id',
        'nama',
        'email',
        'jumlah',
        'bukti_transfer',
        'status',
        'anonim',
        'tanggal',
    ];
}
