<?php

namespace App\Livewire;

use App\Livewire\Forms\EventForm;
use Livewire\Component;

class EventCreate extends Component
{
    public EventForm $form;
    public $showSuccessIndicator = false;

    public function save()
    {
        $this->form->store();

        sleep(1); // simulate a delay, although it's better to handle this differently
        $this->showSuccessIndicator = true;

        $this->redirectRoute('events');

    }

    public function render()
    {
        return view('livewire.events.create');
    }
}
