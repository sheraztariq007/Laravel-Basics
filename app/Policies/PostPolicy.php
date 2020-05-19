<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy {

    use HandlesAuthorization;

    public function before($user, $ability) {
        if ($user->isAdminOrEditor()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post) {
       return $user->id == $post->user()->id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post) {
       return $user->id == $post->user()->id;
    }



}
