<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friendship;
use App\Notifications\userNotification;

class freindshipController extends Controller
{
    //to send friendship request to particular user
function add_friend(Request $req){
    $this->validate($req,['email'=>'required']);
    try{
     $user=User::where('email',$req->email)->first();

    if($user){

        $user->notify(new userNotification(auth()->user(),'send u add request'));
    Friendship::create([
        'sender_add_id'=>\Auth::user()->id,
        'receiver_add_id'=>$user->id

    ]);

    return redirect()->back()->with('msg','created successfully');
}
else{
    dd('not found');
}

}

    catch(\Exception $ex){
        return redirect()->back();
    }

}

//accept friendship reuest
function accaepRequest($id)
{
    $friendship=Friendship::where('sender_add_id',$id)->where('receiver_add_id',auth()->id())->first();
    if($friendship->statues==1)
    {
        return back();
    }
    else{
        $friendship->update(['statues'=>1]);


    Friendship::create([
        'sender_add_id'=>\Auth::user()->id,
        'receiver_add_id'=>$id,
        'statues'=>1

    ]);
}
    return back();


}
//delete request of friendship
function  deleteRequest($id)
{
    auth()->user()->notifications()->where('id',$id)->delete();
    return back();
}
}
