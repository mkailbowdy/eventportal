<?php

namespace App\Livewire;

use App\Livewire\Forms\EventForm;
use Livewire\Component;

class EventCreate extends Component
{
    public EventForm $form;
    public $showSuccessIndicator = false;

    public function store()
    {
        $this->form->update();
        session()->flash('status', 'Event successfully posted!');

        sleep(1); // simulate a delay, although it's better to handle this differently
        $this->showSuccessIndicator = true;

        $this->redirect('/events/'.$this->form->getEventId());
    }

    public function render()
    {
        return view('livewire.events.event-create');
    }
}
