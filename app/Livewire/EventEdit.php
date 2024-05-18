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

    public EventForm $form;

    #[Validate('image|max:20480')] // 20MB Max
    public $file_upload;
    public $showSuccessIndicator = false;

    public function mount(Event $event)
    {
        $this->form->setEvent($event);
    }

    public function delete(Event $event)
    {
        $this->authorize('delete event', $event);
        $event->delete();
        return redirect(route('events.index'));
    }

    public function cancelImage()
    {
        $this->file_upload = null;
    }

    public function clearImage()
    {
        // Clear both the event's photo path and the form's photo path
        $this->form->event->photo_path = null;
        $this->form->photo_path = null;
        $this->file_upload = null;
    }

    public function save()
    {
        $this->form->update();

        // save the image to the photo_path in the database
        if ($this->file_upload) {
            $this->form->event->photo_path = $this->file_upload->store('photos', 'public');
        }

        $this->form->event->save();

        sleep(1);

        $this->showSuccessIndicator = true;
        return redirect(route('events.show', $this->form->event));
    }

    public function render()
    {
        return view('livewire.events.event-edit');
    }
}
