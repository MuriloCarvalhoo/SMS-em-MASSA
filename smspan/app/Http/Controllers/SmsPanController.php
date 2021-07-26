<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outbox;
use App\Models\Phones;
use App\Models\Sentitems;
use App\Models\SmsPan;

class SmsPanController extends Controller
{

    public function index()
    {
        $inbox = Sentitems::paginate(15);

        return view('dashboard', ['inbox' => $inbox]);
    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    public function importCsv()
    {
        $file = public_path('file/test.csv');

        $customerArr = $this->csvToArray($file);

        for ($i = 0; $i < count($customerArr); $i ++)
        {
            User::firstOrCreate($customerArr[$i]);
        }

        return 'Jobi done or what ever';
    }

}
