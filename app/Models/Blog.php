<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function create_like($user=null,$liked = true) {
        $this->likes()->updateOrCreate(
            [
                'user_id'=> $user ? $user->id : auth()->id,
            ],
            [
                'isliked'=>$liked
            ]
        );
    }

    public function num_likes($blog) {
        return $blog->likes()->where('isliked',true);
    }

    public function ifLikedBy(User $user,Blog $blog) {
        return !!$blog->likes()->where('user_id', $user->id)
            ->where('isliked', true)->count();
    }





}
