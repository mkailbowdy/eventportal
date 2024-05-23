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

    public function render()
    {
        $events = Event::with('group')->orderBy('event_date', 'ASC')->orderBy('start_time', 'ASC')->paginate(10);
        $leEvents = Event::with('group')
            ->where('category_id', 1)
            ->orderBy('event_date', 'ASC')
            ->orderBy('start_time', 'ASC')
            ->paginate(10);
        $outdoorEvents = Event::with('group')->where('category_id', 2)->orderBy('event_date',
            'ASC')->orderBy('start_time', 'ASC')->paginate(10);
        $socialEvents = Event::with('group')->where('category_id', 3)->orderBy('event_date',
            'ASC')->orderBy('start_time', 'ASC')->paginate(10);
        $sportsEvents = Event::with('group')->where('category_id', 4)->orderBy('event_date',
            'ASC')->orderBy('start_time', 'ASC')->paginate(10);
        $exerciseEvents = Event::with('group')->where('category_id', 5)->orderBy('event_date',
            'ASC')->orderBy('start_time', 'ASC')->paginate(10);


        // We're passing to the view a variable called $events which contains an Event model that includes all records.
        return view('livewire.events.event-index', [
            'events' => $events,
            'leEvents' => $leEvents,
            'outdoorEvents' => $outdoorEvents,
            'socialEvents' => $socialEvents,
            'sportsEvents' => $sportsEvents,
            'exerciseEvents' => $exerciseEvents
        ]);
    }
}
