<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    protected $table="post";
    protected $fillable=['user_id','title','body'];


    function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


function comment()
{
    return $this->hasMany(comment::class,'post_id')->where('parent_id',null);
}
function like_react()
{
    return $this->hasMany(React::class,'post_id')->where('type','like');
}

function love_react()
{
    return $this->hasMany(React::class,'post_id')->where('type','love');
}
}
