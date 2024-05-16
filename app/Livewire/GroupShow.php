<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;

class GroupShow extends Component
{

    public Group $group;
    public $events;

    public function mount(Group $group)
    {
        $this->group = $group;
        $this->events = $group->events()->get();
    }

    public function render()
    {
        return view('livewire.groups.group-show');
    }
}
