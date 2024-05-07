<?php

namespace App\Livewire\Forms;

use App\Enums\Prefecture;
use App\Models\Group;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GroupForm extends Form
{
    #[Validate]
    public $name = '';

    #[Validate]
    public $description = '';

    #[Validate]
    public $city = '';

    public Prefecture $prefecture;

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('groups', 'name')
            ],
            'description' => ['required'],
            'prefecture' => ['required'],
            'city' => ['required'],
        ];
    }

    public function update()
    {
        // Always validate user input.
        $validated = $this->validate();
        $group = Group::create($validated);

        // Give the user the role of 'organizer'
        auth()->user()->removeRole('member');
        auth()->user()->assignRole('organizer');

        // Attach the user to this group. This will be in the group_user pivot table.
        // Once a user becomes an organizer, they can no longer access /groups/create route.
        $group->users()->attach(auth()->user()->id, ['role' => 'organizer']);
    }
}
