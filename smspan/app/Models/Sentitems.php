<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentitems extends Model
{
    protected $table = 'sentitems';

    protected $fillable = [
        'UpdatedInDB',
        'InsertInDB',
        'SendingDateTime',
        'DeliveryDateTime',
        'Text',
        'DestinationNumber',
        'Coding',
        'UDH',
        'SMSCNumber',
        'Class',
        'TextDecoded',
        'ID',
        'SenderID',
        'SequencePosition'
    ];

    use HasFactory;
}
