<?php

namespace App\Livewire;

use App\Livewire\Forms\EventForm;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EventCreate extends Component
{
    use WithFileUploads;


    public EventForm $form;
    public $showSuccessIndicator = false;

    #[Validate('image|max:20480')] // 20MB Max
    public $file_upload;

    public function store()
    {
        $this->form->update();

        $this->form->event->photo_path = $this->file_upload->store('photos', 'public');
        $this->form->event->save();

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
