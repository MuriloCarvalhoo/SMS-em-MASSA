<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutboxMultipart extends Model
{
    protected $table = 'outbox_multipart';

    public $timestamps = false;

    protected $fillable = [
        'Text',
        'Coding',
        'UDH',
        'Class',
        'TextDecoded',
        'ID',
        'SequencePosition',
        'Status',
        'StatusCode'
    ];

    use HasFactory;


}
