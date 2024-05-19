<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;

class GroupPolicy
{
    /**
     * Determine whether the user can view any models.
     */
//    public function viewAny(User $user): bool
//    {
//        //
//    }

    /**
     * Determine whether the user can view the model.
     */
//    public function view(User $user, Group $group): bool
//    {
//        //
//    }

    /**
     * Determine whether the user can create models.
     */
//    public function create(User $user): bool
//    {
//        //
//    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Group $group): bool
    {
        // Allow only if user is the owner of the group
        return $user->id === $group->users()->wherePivot('role', 'organizer')->first()->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Group $group): bool
    {
        //
        return $user->id === $group->users()->wherePivot('role', 'organizer')->first()->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
//    public function restore(User $user, Group $group): bool
//    {
//        //
//    }

    /**
     * Determine whether the user can permanently delete the model.
     */
//    public function forceDelete(User $user, Group $group): bool
//    {
//        //
//    }
}
