<?php

namespace App\Livewire;

use App\Livewire\Forms\EventForm;
use App\Models\Event;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EventEdit extends Component
{
    use WithFileUploads;

    #[Validate('image|max:20480')] // 20MB Max
    public $file_upload;
    public $showSuccessIndicator = false;
    public EventForm $form;

    public function mount(Event $event)
    {
        $this->form->setEvent($event);
    }

    public function save()
    {
        $this->form->update();
        $this->form->event->photo_path = $this->file_upload->store('photos', 'public');
        $this->form->event->save();

        sleep(1);

        $this->showSuccessIndicator = true;
    }

    public function render()
    {
        return view('livewire.events.event-edit');
    }
}
