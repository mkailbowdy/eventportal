<?php

namespace App\Livewire\Forms;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EventForm extends Form
{
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
    public $group_id;
    public Event $event;

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

    public function update()
    {
        $this->assignGroupId();  // Ensure the group ID is assigned

        // If it's a new event with no participants, set participants to 1, which is the Organizer.
        if (!$this->participants) {
            $this->participants = 1;
        }
        // Always validate user input.
        $this->validate();

        // Include the group_id in the array passed to the create method
        $this->event = Event::create($this->all());

        // Ofcourse the host will participate, so participation_status is set to true by default here.
        $this->event->users()->attach(auth()->user()->id, ['participation_status' => true]);
    }

    public function assignGroupId()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $group = $user->groups()->wherePivot('role', 'organizer')->first(); // Get the first matching group

        if ($group) {
            $this->group_id = $group->pivot->group_id;
        } else {
            dd('Must be an Organizer Please sign up.');
        }
    }

    public function getEventId()
    {
        return $this->event->id;
    }
}
