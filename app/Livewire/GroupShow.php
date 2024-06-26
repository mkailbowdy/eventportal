<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;

class GroupShow extends Component
{

    public Group $group;
    public $events;
    public $members;

    public function mount(Group $group)
    {
        $this->group = $group;
        $this->events = $group->events()->orderBy('event_date', 'asc')->orderBy('start_time', 'desc')->get();
        $this->members = $group->users()->get();
    }

    public function render()
    {
        return view('livewire.groups.group-show');
    }
}
