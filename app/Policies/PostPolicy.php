<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use Modules\Post\App\Models\Post;
use Modules\Users\App\Models\User;

class PostPolicy
{
    public function edit(\App\Models\User $user , \App\Models\Post $post)
    {
        return $user->id === $post->user_id;
    }
    public function destroy(\App\Models\User $user , \App\Models\Post $post)
    {
        return $user->id === $post->user_id;
    }
}
