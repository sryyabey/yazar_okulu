<?php

namespace App\Http\Controllers;

use App\Models\contact_form;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function inbox()
    {

        $messages = contact_form::all();
        return view('admin.message.inbox',compact('messages'));
    }

    public function message($id){

        $message= contact_form::find($id);
        if ($message->durum == 0){
            $message->update([
               'durum' => 1
            ]);
        }

        return view('admin.message.message',compact('message'));
    }
}
