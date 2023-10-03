<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    // message list
    public function messageList(){
        return view('admin.forms.messagetemplate');
    }
}
