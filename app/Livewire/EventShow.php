<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

class EventShow extends Component
{
    public Event $event;
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
        $userId = auth()->id(); // Get the authenticated user's ID directly

        // Attach the user to the event if they are not already attached
        $this->event->users()->syncWithoutDetaching([$userId]);

        // Retrieve the pivot entry to toggle participation status
        $pivot = $this->event->users()->where('users.id', $userId)->first()->pivot;

        // Toggle the participation status
        $newStatus = !$pivot->participation_status;
        $this->event->users()->updateExistingPivot($userId, ['participation_status' => $newStatus]);
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.events.event-show');
    }
}
