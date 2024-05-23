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

    public function tabChanged()
    {
        $this->resetPage();
    }

    public function render()
    {
        $events = Event::with('group')->orderBy('event_date', 'ASC')->orderBy('start_time', 'ASC')->paginate(8);

        // We're passing to the view a variable called $events which contains an Event model that includes all records.
        return view('livewire.events.event-index', [
            'events' => $events,
        ]);
    }
}
