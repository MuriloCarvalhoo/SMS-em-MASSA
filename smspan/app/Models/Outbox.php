<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    protected $table = 'outbox';
    
    public $timestamps = false;

    protected $fillable = [
        'UpdatedInDB',
        'InsetIntoDB',
        'SendingDateTime',
        'SendBefore',
        'SendAfter',
        'Text',
        'DestinationNumber',
        'Coding',
        'UDH',
        'Class',
        'TextDecoded',
        'ID',
        'MultiPart',
        'RelativeValidity',
        'SenderID',
        'SendingTimeOut',
        'DeliveryReport',
        'CreatorID',
        'Retries',
        'Priority',
        'Status',
        'StatusCode'
    ];

    use HasFactory;


}
