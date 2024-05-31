<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;

class UserDashboard extends Component
{
    public User $user;
    public Collection $events;

    public function mount()
    {
        $this->user = auth()->user();
        $this->events = $this->user->events()->with('group')->wherePivot('participation_status', 1)->get();
    }

    public function render()
    {

        return view('livewire.user-dashboard', [
            'events' => $this->events
        ]);
    }
}
