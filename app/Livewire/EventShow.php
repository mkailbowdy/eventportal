<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\User;
use Livewire\Component;

class EventShow extends Component
{
    public Event $event;
    public User $user;
    public $participationStatus;
    // We're using Route Model Binding by type hinting Event.
    // Livewire knows to use "route model binding" because
    // the Post type-hint is prepended to the $post parameter in mount().
    // technically we can even omit this mount function do the 'magic'
    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function goingOrNot()
    {

        $this->user = auth()->user();

        // Check if the user is already part of the event
        if (!$this->event->users()->where('users.id', $this->user->id)->exists()) {
            // Attach the user if they are not already part of the event
            $this->event->users()->attach($this->user->id, ['participation_status' => true]);
        } else {
            // Retrieve the existing pivot entry
            $pivot = $this->event->users()->where('users.id', $this->user->id)->first()->pivot;

            // Check the current participation status and toggle it
            if ($pivot->participation_status) {
                // If true, set to false
                $this->event->users()->updateExistingPivot($this->user->id, ['participation_status' => false]);
            } else {
                // If false or not set, set to true
                $this->event->users()->updateExistingPivot($this->user->id, ['participation_status' => true]);
            }
        }
    }

    public function render()
    {
        return view('livewire.events.event-show');
    }
}
