<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\subscribe;
use App\Models\User;


class SendEmailController extends Controller
{
    function send(Request $request)
    {
     

        
     

        $data =$request->msg;
           
     
        //dd($data);
        $subscriber_emails =subscribe::pluck('email')->toArray();
        Mail::send('dynamic_email_template',['data' => $data], function($message) use ($subscriber_emails)
        {    
        $message->bcc($subscriber_emails)->subject('Alert');    
        });
     // Mail::to('shiahelprefrences12@gmail.com')->send(new SendMail($data));
     return back()->with('success', 'Your News later Successfully sended!!');
    
    }
}
