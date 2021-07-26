<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsPan extends Model
{

    protected $table = 'inbox';

    public $timestamps = true;

    protected $fillable = [
        'UpdatedInDB',
        'ReceivingDateTime',
        'Text',
        'SenderNumber',
        'Coding',
        'UDH',
        'SMSCNumber',
        'Class',
        'TextDecoded',
        'ID',
        'RecipientID',
        'Processed',
        'Status'
    ];

    use HasFactory;
}
