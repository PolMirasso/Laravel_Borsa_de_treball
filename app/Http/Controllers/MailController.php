<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use \App\Mail\SendMail;


class MailController extends BaseController
{
    public function sendEmail()
    {
        $details = [
            'subject' => 'nom empresa',
            'title' => 'Empresa X solicita publicacio en borsa de treball publica',
            'body' => 'La empresa X, con correo Y, etc mucho texto'
        ];

        Mail::to('NO-REPLY-BORSA@POLMIRASSO.CAT')->send(new SendMail($details));
        return "correu enviat";
    }
}
