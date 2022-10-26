<div wire:poll>

@foreach(auth()->user()->sendRequestFriends as $friend)
                    <li><a href="{{route('chat',$friend->receiver->id)}}">{{$friend->receiver->name}}<a></li>
                    @endforeach
                </div>
