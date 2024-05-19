<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;

class EventPolicy
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
//    public function view(User $user, Event $event): bool
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
    public function update(User $user, Event $event): bool
    {
        // Allow only if the user is the owner of the event
        return $user->id === $event->group->users()->wherePivot('role', 'organizer')->first()->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Event $event): bool
    {
        //
        return $user->id === $event->group->users()->wherePivot('role', 'organizer')->first()->id;

    }

    /**
     * Determine whether the user can restore the model.
     */
//    public function restore(User $user, Event $event): bool
//    {
//        //
//    }

    /**
     * Determine whether the user can permanently delete the model.
     */
//    public function forceDelete(User $user, Event $event): bool
//    {
//        //
//    }
}
