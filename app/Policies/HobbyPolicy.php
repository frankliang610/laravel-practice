<?php

namespace App\Policies;

use App\Hobby;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HobbyPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if($user->role === 'admin'){
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Hobby  $hobby
     * @return mixed
     */
    public function view(User $user, Hobby $hobby)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Hobby  $hobby
     * @return mixed
     */
    public function update(User $user, Hobby $hobby)
    {
        return $user->id === $hobby->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Hobby  $hobby
     * @return mixed
     */
    public function delete(User $user, Hobby $hobby)
    {
        return $user->id === $hobby->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Hobby  $hobby
     * @return mixed
     */
    public function restore(User $user, Hobby $hobby)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Hobby  $hobby
     * @return mixed
     */
    public function forceDelete(User $user, Hobby $hobby)
    {
        //
    }
}
