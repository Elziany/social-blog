<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    use HasFactory;
    protected $table='friendship';
    protected $fillable=['sender_add_id','receiver_add_id','statues'];
   function receiver()
   {
    return $this->belongsTo(User::class,'receiver_add_id');
   }

   function sender()
   {
    return $this->belongsTo(User::class,'sender_add_id');
   }


}
