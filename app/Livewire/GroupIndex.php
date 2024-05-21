<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Groups')]
class GroupIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.groups.group-index', [
            'groups' => Group::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
