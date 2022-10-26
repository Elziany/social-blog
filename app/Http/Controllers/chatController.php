<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class chatController extends Controller
{
    //index function to return the chat page
    function index($id)
    {
        $receiver=User::find($id);
        return view('chatpage',compact('receiver'));
    }
}
