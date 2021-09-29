<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outbox;
use App\Models\Phones;
use App\Models\Sentitems;
use App\Models\Sms;
use Illuminate\Support\Facades\Response;

class SmsController extends Controller
{

    public function index()
    {
        return view('dashboard');
    }

    public function smsEnviados()
    {
        $inbox = Sentitems::paginate(1000);

        return Response::json($inbox);
    }

}
