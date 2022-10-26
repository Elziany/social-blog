<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table="comment";
    protected $fillable=['post_id','user_id','commentText','parent_id'];


    function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    function replaies()
    {
        return $this->hasMany(comment::class,'parent_id');
    }
}
