<?php

namespace Modules\Post\App\Models;

use Modules\Post\Database\factories\CommentFactory;
//////
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Users\App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'parent_id', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
       return $this->hasMany(Comment::class, 'parent_id');
    }
}
