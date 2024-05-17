<?php

namespace App\Livewire\Forms;

use App\Models\Event;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EventForm extends Form
{
    public ?Event $event;
    // To add the real time validation, we still need the #[Validate] even though we used rules()

    #[Validate]
    public $title = '';
    #[Validate]
    public $description = '';
    #[Validate]
    public $location = '';
    #[Validate]
    public $category_id;

    public $event_date;
    public $start_time;
    public $end_time;
    public $max_participants;
    public $photo_path = '';

    #[Locked]
    public int $group_id = 1;

    public function rules()
    {
        return [
            'title' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'min:5'],
            'location' => ['required'],
            'max_participants' => ['required', 'min:1'],
            'event_date' => ['required', 'date', 'after_or_equal:today'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'category_id' => ['required'],
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
        $this->category_id = $this->event->category_id;

    }

    public function store()
    {
        $this->validate();
        // Set the group_id from default 1 to the user's group id
        $this->group_id = auth()->user()->groups()->wherePivot('role', 'organizer')->first()->id;
        $this->event = Event::create($this->except(['file_upload']));

        $user_id = auth()->id();
        $this->event->users()->syncWithoutDetaching([$user_id]);
        $this->event->users()->updateExistingPivot($user_id, ['participation_status' => true]);


    }

    public function update()
    {

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
        $this->event->category_id = $this->category_id;

        $this->event->save();
    }

}
