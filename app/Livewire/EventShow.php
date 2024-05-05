<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Events')]
class EventShow extends Component
{

    public function participate(Event $event)
    {
        $event->participants++;
        $event->update();
    }

    public function render()
    {
        return view('livewire.events.index',[
            'events' => Event::all()
        ]);
    }
}
