<?php

namespace Modules\Post\App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
//////
use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function edit(User $user , Post $post)
    {
        return $user->id === $post->user_id;
    }
    public function destroy(User $user , Post $post)
    {
        return $user->id === $post->user_id;
    }
}
