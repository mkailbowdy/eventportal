<?php

namespace App\Livewire;

use App\Livewire\Forms\EventForm;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Create Event')]
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

    public function clearImage()
    {
        // Clear both the event's photo path and the form's photo path
        $this->form->photo_path = null;
        $this->file_upload = null;
    }


    public function render()
    {
        return view('livewire.events.event-create');
    }
}
