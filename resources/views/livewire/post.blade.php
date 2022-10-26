<div wire:poll>
    <!--create post form-->
    <p style="font-weight:bold">Create post</p>
    <form wire:submit.prevent="createPost">
        <input type="text" placeholder="post title or caption" wire:model.lazy="title"><br>
        <textarea  placeholder="post body" wire:model="body"></textarea><br>
        <button class="btn btn-primary"type="submit">Post</button>

    </form>

<!-- show postes -->
    <p  style="font-weight:bold">postes</p>

    @foreach($postes as $post)

    <!--user postes-->
    @if($post->user_id ===auth()->user()->id)
    <div class="card-body">
    <div class="time">owner :{{$post->user->name}}</div>
    <div class="title">Title :{{$post->title}}</div>
    <div class="body">{{$post->body}}</div>
    </div>



    <!--button react to this post -->
    <span class="text text-primary">{{$post->like_react->count()}}</span>
    <button class="btn btn-primary"  style="border:none;width:55px ;height:55px; border-radius:50%"
   wire:click="react('like',{{$post->id}})" >Like</button>

   <span class="text text-danger">{{$post->love_react->count()}}</span>
    <button class="btn btn-danger"  style="border:none;width:55px ;height:55px; border-radius:50%"
    wire:click="react('love',{{$post->id}})" >Love</button>


 <!--commments related to the post-->

<div>Comments</div>
@foreach($post->comment as $comment)
<div class="text text-primary">{{$comment->user->name}}  => {{$comment->commentText}}</div>




<!-- comment replaies-->
@foreach($comment->replaies as $replay)
 @if($replay->parent_id === $comment->id)

<div class="text text-danger">{{$replay->user->name}} => {{$replay->commentText}}</div>
<!-- replies for certain replay-->
@foreach($replay->replaies as $replayItem)
@if($replayItem->parent_id ==$replay->id)
<div class="text text-success">{{$replayItem->user->name}} => {{$replayItem->commentText}}</div>

@endif
@endforeach
 <!-- form to create replay on replay-->
 <form wire:submit.prevent="createReplay({{$post->id}},{{$replay->id}})">
<input type="text" placeholder="comment " wire:model.lazy="replayText">
<button wire:click="submit">add ReplayItem</button>
</form>
 @endif
 @endforeach
 <!-- form to create replay on comment-->
<form wire:submit.prevent="createReplay({{$post->id}},{{$comment->id}})">
<input type="text" placeholder="comment " wire:model.lazy="replayText">
<button type="submit">add Replay</button>
</form>
 @endforeach


<!-- form to create comment-->

<input type="text" placeholder="comment " wire:model.lazy="commentText">
<button wire:click="createComment({{$post->id}})">add comment</button>


<!--friend postes -->
@else
    @foreach($post->user->sendRequestFriends as $friend)
    @if($friend->receiver_add_id === auth()->id())
    <div class="card-body">
    <div>{{$friend->sender->name}}</div>
    <div class="time"> owner:{{$post->user->name}}</div>
    <div class="title">Title :{{$post->title}}</div>
    <div class="body">{{$post->body}}</div>
    </div>

  <!--button react to this post -->
  <span class="text text-primary">{{$post->like_react->count()}}</span>
  <button class="btn btn-primary"  style="border:none;width:55px ;height:55px; border-radius:50%"
   wire:click="react('like',{{$post->id}})" >Like</button>

    <span class="text text-danger">{{$post->love_react->count()}}</span>
    <button class="btn btn-danger"  style="border:none;width:55px ;height:55px; border-radius:50%"
    wire:click="react('love',{{$post->id}})" >Love</button>



 <!--commments related to the post-->
<div>Comments</div>
    @foreach($post->comment as $comment)
    <div class="text text-primary">{{$comment->user->name}} => {{$comment->commentText}}</div>




    <!--comment replaies-->
    @foreach($comment->replaies as $replay)
    @if($replay->parent_id == $comment->id)
    <div class="text text-danger">{{$replay->user->name}} => {{$replay->commentText}}</div>

    <!-- replies for certain replay-->
@foreach($replay->replaies as $replayItem)
@if($replayItem->parent_id ==$replay->id)
<div class="text text-success">{{$replayItem->user->name}} => {{$replayItem->commentText}}</div>

@endif
@endforeach
 <!-- form to create replay on replay-->
 <form wire:submit.prevent="createReplay({{$post->id}},{{$replay->id}})">
<input type="text" placeholder="comment " wire:model.lazy="replayText">
<button type="submit">add ReplayItem</button>
</form>

    @endif
    @endforeach
    <!--form to create replaies on comment-->
    <form wire:submit.prevent="createReplay({{$post->id}},{{$comment->id}})">
    <input type="text" placeholder="comment " wire:model.lazy="replayText">
    <button type="submit">add Replay</button>
    </form>
    @endforeach

<!-- form to create comment-->
<input type="text" placeholder="comment " wire:model.lazy="post.commentText">
<button wire:click="createComment({{$post->id}})">add comment</button>

@endif

@endforeach
@endif
@endforeach

</div>
