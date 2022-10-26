<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class React extends Model
{
    use HasFactory;
    protected $table="react";
    protected $fillable=['user_id','post_id','type','comment_id'];

    function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
