<?php

namespace App\Livewire\Forms;

use App\Models\Group;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GroupForm extends Form
{
    public ?Group $group;

    #[Validate]
    public $name = '';
    #[Validate]
    public $description = '';
    #[Validate]
    public $city = '';
    #[Validate]
    public $prefecture = '';

    public $photo_path = '';

    public function rules()
    {
        return [
            'name' => [
                'required',
                'max:65',
                Rule::unique('groups', 'name')
            ],
            'description' => ['required'],
            'prefecture' => ['required'],
            'city' => ['required'],
        ];
    }

    public function store()
    {
        // Always validate user input.
        $this->validate();
        $this->group = Group::create($this->except(['file_upload']));

        // Give the user the role of 'organizer'
        auth()->user()->removeRole('member');
        auth()->user()->assignRole('organizer');

        // Attach the user to this group. This will be in the group_user pivot table.
        // Once a user becomes an organizer, they can no longer access /groups/create route.
        $this->group->users()->attach(auth()->user()->id, ['role' => 'organizer']);
    }
}
