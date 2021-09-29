<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outbox;
use App\Models\Phones;
use App\Models\Sentitems;
use App\Models\Sms;
use App\Imports\SmsImport;
use App\Imports\SmsExport;
use App\Models\OutboxMultipart;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;


class SendSMSController extends Controller
{
    public function index()
    {
        return view('sendsms');
    }

    public function smsNaoEnviados()
    {
        $outbox = Outbox::paginate(1000);

        return Response::json($outbox);

    }

    public function smsNaoEnviadosMulti()
    {
        $outboxMulti = OutboxMultipart::paginate(1000);

        return Response::json($outboxMulti);

    }


    public function export()
    {
        return Excel::download(new SmsExport, 'enviarsms.xlsx');
    }

    public function import()
    {
        Excel::import(new SmsImport,request()->file('file'));

        return back();
    }

}
