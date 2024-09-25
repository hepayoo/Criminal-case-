<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;


class MessageController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function fetchMessages()
    {
        return Message::with('user')->get();  
    }

    // Handle sending a message
    public function sendMessage(Request $request)
    {
      
     
     

        $message = new Message();
        $message->message = $request->message;
        $message->user()->associate(Auth()->user());
        $message->save();
       
        broadcast(new MessageSent(auth()->user(), $message->load('user')))->toOthers();

        return response(['status'=>'Message sent successfully']);
    }
    
}
