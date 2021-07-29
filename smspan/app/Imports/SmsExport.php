<?php

namespace App\Imports;

use App\Models\Outbox;
use Maatwebsite\Excel\Concerns\FromCollection;

class SmsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Outbox::all();
    }
}
