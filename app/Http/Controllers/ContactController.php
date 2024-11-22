<?php

namespace App\Http\Controllers;

use App\Mail\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    //

    function create () {

            return view ('contact');
    }

    function store (Request $request) {
        //dd($request);
        $name = $request->name;
        $email = $request->input ('email');
        $message = $request->input ('description');

        Mail::to(env('MAIL_INBOX'))->send(new ContactNotification($name, $email, $message));

        return back()->with('code', '0')->with ('message', 'Mensaje enviado correctamente');
    }
}
