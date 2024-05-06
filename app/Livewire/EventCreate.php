<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EventCreate extends Component
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
    public $showSuccessIndicator = false;

    public $group_id;

    public function assignGroupId()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $group = $user->groups()->wherePivot('role', 'organizer')->first(); // Get the first matching group

        if ($group) {
            $this->group_id = $group->pivot->group_id;
        } else {
            dd('group not found');
        }
    }




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

    public function store()
    {
        $this->assignGroupId();  // Ensure the group ID is assigned

        // Always validate user input.
        $validated = $this->validate();

        // Include the group_id in the array passed to the create method
        Event::create($validated + ['group_id' => $this->group_id]);

        sleep(1); // simulate a delay, although it's better to handle this differently
        $this->showSuccessIndicator = true;
        $this->redirect('/events');
    }


    public function render()
    {
        return view('livewire.event-create');
    }
}
