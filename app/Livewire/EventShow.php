<?php

namespace App\Livewire;

use App\Models\Event;
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

    public function render()
    {
        return view('livewire.events.event-show');
    }
}
