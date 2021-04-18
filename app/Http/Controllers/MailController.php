<?php

namespace App\Http\Controllers;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function send(){
        $objDemo = new \stdClass();
        $objDemo->sender = 'Nurbakyt';
        $objDemo->receiver = 'Nurbakyt';

        Mail::to("190103335@stu.sdu.edu.kz")->send(new DemoEmail($objDemo));
    }
}
