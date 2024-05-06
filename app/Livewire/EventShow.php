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

    public function store()
    {
        $this->form->update();
        // sleep(). This prevents multiple submissions from accidental double clicking. Also the user can
        // recognize that a network request was sent. If it's too fast, they might think something is wrong.
        sleep(1);
        $this->showSuccessIndicator = true;
        $this->redirect('/events');
    }

    public function render()
    {
        return view('livewire.events.index',[
            'events' => Event::all()
        ]);
    }
}
