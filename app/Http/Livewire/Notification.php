<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public function render()
    {
        return view('livewire.notification');
    }
    function marknotification($id)
    {
        dd('it is work');
        auth()->user()->notifications->where('id',$id)->markAsRead();
    }
}
