<?php

namespace App\Imports;

use App\Models\Outbox;
use App\Models\OutboxMultipart;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;


use Illuminate\Support\Facades\DB;

class SmsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $rows;

        foreach ($rows as $row)
        {


            $texto = $row['texto'];
            $tamTexto = strlen($texto);
            if ($tamTexto > 70){

                $part1 = substr($texto, 0 ,66);
                $part2 = substr($texto, 66);
                $letras = ('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
                $letraAleatoria = strlen($letras);
                $random_str= $letras[rand(0,$letraAleatoria - 1)];
                $letraAleatoria = ucfirst($random_str);

                $numeroAleatorio = mt_rand(0,9);
                $udh = '050003'.$letraAleatoria.$numeroAleatorio.$numeroAleatorio.$numeroAleatorio.'01';
                $udh2 = substr($udh,0,-1);
                $udh2 = substr($udh2,0,-1);
                $udh2 = $udh2.'02';

                Outbox::create([

                    'CreatorID' => 'Gammu 1.41.0',
                    'MultiPart' => "true",
                    'DestinationNumber' => $row['numero'],
                    'TextDecoded' => $part1.'...',
                    'Coding' => 'Unicode_No_Compression',
                    'Class' => '1',
                    //'UDH' => $udh,
                ]);

                //$id = Outbox::where('UDH', '=', $udh)->pluck('ID');
                $statement = DB::select("SHOW TABLE STATUS LIKE 'outbox'");
                $nextId = $statement[0]->Auto_increment;


                OutboxMultipart::create([
                    'SequencePosition' => '2',
                    //'UDH' => $udh2,
                    'Class' => '1',
                    'Coding' => 'Default_No_Compression',
                    'TextDecoded' => $part2,
                    'ID' => $nextId,
                ]);

                //return [Outbox::insert($sms),OutboxMultipart::insert($sms2)] ;

            } else
                Outbox::create([

                'DestinationNumber' => $row['numero'],
                'TextDecoded' => $row['texto'],
                //'InsertInDB' => date('Y-m-d H:i:s'),
                //'UpdatedInDB' => date('Y-m-d H:i:s'),
                //'SendingDateTime' => date('Y-m-d H:i:s'),
                //'SendBefore' => '23:59:59',
                //'SendAfter' => '00:00:00',
                //'Text' => '0x000x4a0x000x610x000x200x000x650x000x730x000x740x000x610x000x200x000x640x000x690x000x730x000x700x000x6f0x000x6e0x000x690x000x760x000x650x000x6c0x000x200x000x6f0x000x200x000x720x000x650x000x660x000x690x000x6e0x000x200x000x490x000x740x000x610x000x750x000x2e0x000x200x000x510x000x750x000x650x000x720x000x200x000x730x000x610x000x620x000x650x000x720x000x200x000x6d0x000x610x000x690x000x730x000x3f0x000x200x000x4c0x000x690x000x670x000x750x000x650x000x200x000x300x000x380x000x300x000x300x000x200x000x300x000x300x000x300x000x300x000x200x000x310x000x310x000x35',
                'Coding' => 'Unicode_No_Compression',
                //'Class' => '-1',
                'MultiPart' => 'false',
                'RelativeValidity' => '255',
                //'SendingTimeOut' => date('Y-m-d H:i:s'),
                //'DeliveryReport' => 'default',
                'CreatorID' => 'Gammu 1.41.0',
                //'Retries' => '0',
                'Priority' => $row['prioridade'],
                //'Status' => 'Reserved',
                //'StatusCode' => '-1'

            ]);
        }
    }
}
