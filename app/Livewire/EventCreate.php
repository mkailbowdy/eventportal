<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EventCreate extends Component
{
    use WithFileUploads;

    public $showSuccessIndicator = false;

    public Event $event;
    public $group_id;
    public $title = '';
    public $description = '';
    public $location = '';
    public $event_date;
    public $start_time;
    public $end_time;
    public $max_participants;
    public $photo_path = '';

    #[Validate('image|max:20480')] // 20MB Max
    public $file_upload;

    public function save()
    {
        $this->event = Event::create([
            'group_id' => auth()->user()->groups()->wherePivot('role', 'organizer')->first()->id,
            'title' => $this->title,
            'description' => $this->description,
            'location' => $this->location,
            'event_date' => $this->event_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'max_participants' => $this->max_participants,
        ]);

        $this->event->photo_path = $this->file_upload->store('photos', 'public');
        $this->event->save();

        session()->flash('status', 'Event successfully posted!');
        sleep(1);
        $this->showSuccessIndicator = true;
    }

    public function render()
    {
        return view('livewire.events.event-create');
    }
}
