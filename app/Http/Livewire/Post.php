<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PostModel;
use App\Models\showpostes;
use App\Models\comment;
use App\Models\React;
class Post extends Component
{
    public $title;
    public $body;
    public $commentText;
    public $replayText;
    public function render()
    {
        $postes=PostModel::orderBy('created_at','desc')->get();


        return view('livewire.post',compact('postes'));
    }
    function createPost()
    {
        if($this->title===null || $this->body===null)
        {
            $this->reset('title');
        $this->reset('body');
            return back();
        }
        $post=PostModel::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'user_id'=>auth()->user()->id
        ]);

        $this->reset('title');
        $this->reset('body');
    }


    public function createComment($id)
    {
        comment::create([
            'post_id'=>$id,
            'user_id'=>auth()->user()->id,
            'commentText'=>$this->commentText
        ]);
        $this->reset('commentText');
    }
    function createReplay($post_id,$comment_id)
    {
        if($this->replayText==null){
            $this->reset('replayText');

            return back();
        }
        comment::create([
            'post_id'=>$post_id,
            'user_id'=>auth()->user()->id,
            'commentText'=>$this->replayText,
            'parent_id'=>$comment_id
        ]);
        $this->reset('replayText');

    }

    #################### React creation function #################3
    function react($type,$post_id)
    {

        $react=React::where('post_id',$post_id)->where('user_id',auth()->user()->id)->first();
        if($react ==null){
        React::create([
            'user_id'=>auth()->user()->id,
            'post_id'=>$post_id,
            'type'=>$type
        ]);
    }
    else{
        return back();
    }
    }
}
