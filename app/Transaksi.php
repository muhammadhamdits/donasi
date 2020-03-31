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
        'bank',
        'status',
        'anonim',
        'tanggal',
    ];

    const NAGARI = 1;
    const BNI = 2;
    const MANDIRI_SYARIAH = 3;
    const MANDIRI = 4; 

    public static $bank =  [
        self::NAGARI => 'Bank Nagari',
        self::BNI => 'BNI',
        self::MANDIRI_SYARIAH => 'Bank Mandiri Syariah',
        self::MANDIRI => ' Bank Mandiri'
    ];
}
