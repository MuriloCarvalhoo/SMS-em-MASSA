<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
    protected $table = 'phones';

    public $timestamps = false;

    protected $fillable = [
        'ID',
        'UpdatedInDB',
        'TimeOut',
        'Send',
        'Receive',
        'IMEI',
        'IMSI',
        'NetCode',
        'NetName',
        'Client',
        'Battery',
        'Signal',
        'Sent',
        'Received'
    ];

    use HasFactory;
}
