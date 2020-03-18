<?php

namespace App\Http\Controllers;

use App\Events\MessageDelivered;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $messages = Message::all();

        return view('messages.index', compact('messages'));
        
    }// end of index

    public function store(Request $request)
    {
        $message = auth()->user()->messages()->create($request->all());

        broadcast(new MessageDelivered($message))->toOthers();

    }// end of store

}// end of controller
