<?php

namespace Modules\Post\App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
//////
use Illuminate\Auth\Access\Response;



class PostPolicy
{
    public function edit(\Modules\Users\App\Models\User $user , \Modules\Post\App\Models\Post $post)
    {
        return $user->id === $post->user_id;
    }
    public function destroy(\Modules\Users\App\Models\User $user , \Modules\Post\App\Models\Post $post)
    {
        return $user->id === $post->user_id;
    }
}
