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

    public $group_id;

    #[Validate('image|max:20480')] // 20MB Max
    public $file_upload;

    public function save()
    {
        $this->form->store();

        $this->form->event->group_id = auth()->user()->groups()->wherePivot('role', 'organizer')->first()->id;
        $this->form->event->photo_path = $this->file_upload->store('photos', 'public');

        $user_id = auth()->id();
        $this->form->event->users()->syncWithoutDetaching([$user_id]);
        $this->form->event->users()->updateExistingPivot($user_id, ['participation_status' => true]);

        $this->form->event->save();

        session()->flash('status', 'Event successfully posted!');
        sleep(1);
        $this->showSuccessIndicator = true;
        redirect()->route('events.show', $this->form->event);
    }

    public function render()
    {
        return view('livewire.events.event-create');
    }
}
