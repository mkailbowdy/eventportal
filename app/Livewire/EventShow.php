<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventShow extends Component
{
    public Event $event;
    public $isGoing; // Property to track if the user is going or not

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->checkParticipation();
    }

    private function checkParticipation()
    {
        $user = auth()->user();
        if ($user) {
            $this->isGoing = $this->event->users()->where('users.id', $user->id)->exists();
        }
    }

    public function goingOrNot()
    {
        $userId = auth()->id();
        $this->event->users()->syncWithoutDetaching([$userId]);
        $pivot = $this->event->users()->where('users.id', $userId)->first()->pivot;
        $newStatus = !$pivot->participation_status;
        $this->event->users()->updateExistingPivot($userId, ['participation_status' => $newStatus]);

        // Update local status after participation status change
        $this->isGoing = $newStatus;
    }

    public function render()
    {
        return view('livewire.events.event-show', ['isGoing' => $this->isGoing]);
    }
}
