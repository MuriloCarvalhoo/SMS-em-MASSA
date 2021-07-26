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
}
