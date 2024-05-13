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
    
    public Event $event;

    public $showSuccessIndicator = false;

    public EventForm $form;
    public $title;
    public $description;
    public $location;
    public $max_participants;
    public $event_date;
    public $start_time;
    public $end_time;
    public $photo_path;

    #[Validate('image|max:20480')] // 20MB Max
    public $file_upload;

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->title = $this->event->title;
        $this->description = $this->event->description;
        $this->location = $this->event->location;
        $this->max_participants = $this->event->max_participants;
        $this->event_date = $this->event->event_date->format('Y-m-d');
        $this->start_time = $this->event->start_time->format('H:i');
        $this->end_time = $this->event->end_time->format('H:i');
        $this->photo_path = $this->event->photo_path;
    }

    public function store()
    {

    }

    public function render()
    {
        return view('livewire.events.event-edit');
    }
}
