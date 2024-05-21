<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Events')]
class EventIndex extends Component
{
    use WithPagination;

    public function participate(Event $event)
    {
        $event->participants++;
        $event->update();
    }

    public function render()
    {
        // We're passing to the view a variable called $events which contains an Event model that includes all records.
        return view('livewire.events.event-index', [
            'events' => Event::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}

