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

    #[Validate('image|max:20480')] // 20MB Max
    public $file_upload;

    public function save()
    {
        $this->form->store();

        if ($this->file_upload) {
            $this->form->event->photo_path = $this->file_upload->store('photos', 'public');
        }

        $this->form->event->save();

        session()->flash('status', 'Event successfully posted!');
        sleep(1);
        return redirect()->route('events.show', $this->form->event);
    }

    public function render()
    {
        return view('livewire.events.event-create');
    }
}
