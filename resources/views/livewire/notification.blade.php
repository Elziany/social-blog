<div wire:poll>
@if(auth()->user()->notifications->count()===0)
<div>No Notification</div>
@else
    @foreach(auth()->user()->notifications as $notification)
    <div>
    {{$notification['data']['notificationText']}}
   <script>
    alert().addEvetListners
   </script>


<a  href="{{route('accaepRequest',$notification['data']['user_id'])}}"><button class="btn btn-success" >
    confirm</button></a>

<a class="btn btn-danger" href="{{route('deleteRequest',$notification->id)}}">delete</a>
    </div>
    @endforeach
    @endif
</div>
