<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ChatModel;

class Chat extends Component
{
    public $sender_id;
    public $receiver_id;
    public $messageText;
    #########render ogf the component########
    public function render()
    {
        $messages=ChatModel::orderBy('created_at','asc')->whereIn('sender_id',[$this->sender_id,$this->receiver_id])->get();
        return view('livewire.chat',compact('messages'));
    }
    #### to intialite the attributes #####
    function mount($id)
    {
$this->receiver_id=$id;
$this->sender_id=auth()->user()->id;
    }

    #### to send message #######
    function message()
    {
        if($this->messageText===null)
        {
         return  back();

        }
        ChatModel::create([
                'sender_id'=>$this->sender_id,
                'receiver_id'=>$this->receiver_id,
                'messageText'=>$this->messageText
        ]);
        $this->reset('messageText');
    }
}
