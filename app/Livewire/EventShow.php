<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventShow extends Component
{
    public ?Event $event;
    public $isGoing; // Property to track if the user is going or not
    public $organizer;
    public $participants = 0;

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->checkParticipation();
        $this->organizer = $this->event->group->users()->wherePivot('role', 'organizer')->first();
        $this->countParticipants();
    }

    private function checkParticipation()
    {
        $user = auth()->user();
        if ($user) {
            // Ensure we are getting the pivot data including participation status
            $participant = $this->event->users()
                ->where('users.id', $user->id)
                ->first();

            $this->isGoing = $participant ? $participant->pivot->participation_status : false;
        }
    }

    private function countParticipants(): int
    {
        $previousCount = $this->participants;
        $newCount = $this->event->users()->wherePivot('participation_status', 1)->count();

        if ($newCount !== $previousCount) {
            $this->participants = $newCount;
            $this->event->participants = $newCount;
            $this->event->save();
        }
        return $this->participants;
    }


    public function goingOrNot(): void
    {
        $userId = auth()->id();
        $this->event->users()->syncWithoutDetaching([$userId]);
        $participant = $this->event->users()->where('users.id', $userId)->first();

        // Toggle the participation status
        $newStatus = !$participant || !$participant->pivot->participation_status;
        $this->event->users()->updateExistingPivot($userId, ['participation_status' => $newStatus]);

        // Refresh local status based on updated database entry
        $this->isGoing = $newStatus;
        $this->countParticipants();

    }

    public function render()
    {
        return view('livewire.events.event-show', ['isGoing' => $this->isGoing]);
    }
}
