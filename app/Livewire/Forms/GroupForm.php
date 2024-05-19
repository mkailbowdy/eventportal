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
    public $prefecture = '';
    #[Validate]
    public $category_id;
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
            'category_id' => ['required'],
        ];
    }

    public function setGroup(Group $group)
    {
        $this->group = $group;

        $this->name = $this->group->name;
        $this->description = $this->group->description;
        $this->prefecture = $this->group->prefecture;
        $this->photo_path = $this->group->photo_path;
        $this->category_id = $this->group->category_id;

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

    public function update()
    {

        // Always validate user input
        $this->validate();

        $this->group->name = $this->name;
        $this->group->description = $this->description;
        $this->group->prefecture = $this->prefecture;
        $this->group->photo_path = $this->photo_path;
        $this->group->category_id = $this->category_id;

        $this->group->save();
    }


}
