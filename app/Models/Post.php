<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    //check if particular user liked for the post
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id',$user->id); //contains laravel collection obj which we can check what contains in a given time
    }

    public function ownedBy(User $user)
    {
        return $user->id===$this->user_id; //match the user ID with the post user ID
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
