<?php

namespace App\Policies;

use App\Enums\PostStatus;
use App\Models\Shot;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ShotPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param  \App\Models\Shot  $shot
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Shot $shot)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param  \App\Models\Shot  $shot
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Shot $shot)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param  \App\Models\Shot  $shot
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Shot $shot)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param  \App\Models\Shot  $shot
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Shot $shot)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param  \App\Models\Shot  $shot
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Shot $shot)
    {
        //
    }

    /**
     * Determine if the given  post is open for accepting shot and the post belongs to the user.
     *
     * @param User $user
     * @param Shot $shot
     * @return Response
     */
    public function acceptShot(User $user, Shot $shot) : Response
    {
        return $user->id === $shot->post->user_id && $shot->post->status != PostStatus::CLOSED ? Response::allow()
            : Response::deny('You can not accept shot for a post that has been closed or does not belong to you');
    }
    /**
     * Determine if the given  post has shot has been accepted and the post belongs to the user.
     *
     * @param User $user
     * @param Shot $shot
     * @return Response
     */
    public function declineShot(User $user, Shot $shot) : Response
    {
        return $user->id === $shot->post->user_id && $shot->post->status != PostStatus::OPEN ? Response::allow()
            : Response::deny('You can not decline shot for a post that is till open or does not belong to you');
    }
}
