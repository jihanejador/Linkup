<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'content',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'post_id');
    }
    public function likes(){
        return $this->hasMany(Like::class, 'post_id');
    }

    public function isLikedByUser(){
        return $this()->where('user_id', auth()->id())->exists();
    }
}
