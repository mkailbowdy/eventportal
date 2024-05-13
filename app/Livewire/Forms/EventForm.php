<?php

namespace App\Livewire\Forms;

use AllowDynamicProperties;
use App\Models\Event;
use Livewire\Attributes\Validate;
use Livewire\Form;

#[AllowDynamicProperties] class EventForm extends Form
{
    public Event $event;
    // To add the real time validation, we still need the #[Validate] even though we used rules()
    #[Validate]
    public $title = '';
    #[Validate]
    public $description = '';
    #[Validate]
    public $location = '';

    public $event_date;
    public $start_time;
    public $end_time;
    public $max_participants;
    public $participants;
    public $photo_path;

    public function rules()
    {
        return [
            'title' => ['required', 'min:5'],
            'description' => ['required', 'min:10'],
            'location' => ['required'],
            'event_date' => ['required', 'date', 'after_or_equal:today'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'max_participants' => ['required', 'min:1'],
        ];
    }

    public function setEvent(Event $event)
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

    public function update()
    {

        // If it's a new event with no participants, set participants to 1, which is the Organizer.
        if (!$this->participants) {
            $this->participants = 1;
        }
        // Always validate user input.
        $this->validate();

        $this->event->title = $this->title;
        $this->event->description = $this->description;
        $this->event->location = $this->location;
        $this->event->max_participants = $this->max_participants;
        $this->event->event_date = $this->event_date;
        $this->event->start_time = $this->start_time;
        $this->event->end_time = $this->end_time;
        $this->event->photo_path = $this->photo_path;

        $this->event->save();
    }
}
