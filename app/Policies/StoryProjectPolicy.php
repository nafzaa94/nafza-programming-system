<?php

namespace App\Policies;

use App\Models\StoryProject;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StoryProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StoryProject  $storyProject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, StoryProject $storyProject)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StoryProject  $storyProject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, StoryProject $storyProject)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StoryProject  $storyProject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, StoryProject $storyProject)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StoryProject  $storyProject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, StoryProject $storyProject)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StoryProject  $storyProject
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, StoryProject $storyProject)
    {
        //
    }
}
