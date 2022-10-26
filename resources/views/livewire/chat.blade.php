<div wire:poll>
    <div class="container">
        <div class="messagebody">
            @foreach($messages as $message)
            @if($message->sender_id===$this->receiver_id && $message->receiver_id===auth()->user()->id)
            <div class="receiver">{{$message->messageText}}</div>
            @elseif($message->sender_id===auth()->user()->id && $message->receiver_id===$this->receiver_id)
            <div class="sender">{{$message->messageText}}</div>
            @endif
            @endforeach
          


        </div>
        <div class="sendmessage">
            <form wire:submit.prevent="message">
        <input type="text" class="messagegfield" wire:model.defer="messageText">
       <button type="submit"> <img class="sendicon" src="{{asset('images/send.jpg')}}"  ></button>
</form>
        </div>
    </div>
</div>
