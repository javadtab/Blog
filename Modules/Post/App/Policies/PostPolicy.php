<?php

namespace Modules\Post\App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
//////
use Illuminate\Auth\Access\Response;
//use Modules\Post\App\Models\Post;
//use Modules\Users\App\Models\User;
use App\Models\Post;
use App\Models\User;

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
