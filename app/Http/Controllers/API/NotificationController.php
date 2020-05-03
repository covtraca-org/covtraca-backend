<?php

namespace App\Http\Controllers\API;

use App\Mail\NewContactNotification;
use App\Mail\ContactSent;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class NotificationController extends AppBaseController
{


    public function sendEmail(Request $request)
    {        
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NewContactNotification($request));
        Mail::to("enimil.peter@gmail.com")->send(new NewContactNotification($request));
        Mail::to("liam.winder@gmail.com")->send(new NewContactNotification($request));
        Mail::to("omarmfs98@protonmail.com")->send(new NewContactNotification($request));
        Mail::to($request->email)->send(new ContactSent($request->name));

        return $this->sendSuccess('A message has been sent to Mailtrap!');
    }
}

