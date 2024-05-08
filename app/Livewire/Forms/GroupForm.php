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

        /*1. $group->users()
                            $group is likely an instance of a model class in Laravel, possibly representing a data record from the groups table in the database.
                            users() is a method on the $group object. This method defines a relationship between the Group model and the User model.
                            The users() method should return an instance of a relationship class, such as BelongsToMany. This indicates a many-to-many relationship between groups and users, where a group can have multiple users and a user can belong to multiple groups. The actual users connected to this specific group can be accessed or modified through this relationship.
                            2. attach()
                            attach() is a method used to link models in many-to-many relationships by adding entries to the intermediate table, commonly known as a pivot table.
                            This method takes at least one argument, typically the ID of the model to attach. Additional arguments can be provided to set values for extra columns in the pivot table.
                            3. auth()->user()->id
                            auth() is a global helper function in Laravel that provides access to the authentication service.
                            user() is a method of the authentication guard, which returns the currently authenticated user, if any.
                            id accesses the id property of the authenticated user model, which is commonly used as a unique identifier in the database.
                            4. ['role' => 'organizer']
                            This array is the second argument to the attach() method. It specifies additional data to be stored in the pivot table.
                            In this case, it's setting the role column of the pivot table to 'organizer'. This might be used to store different roles or permissions that users have within a group.*/
        $group->users()->attach(auth()->user()->id, ['role' => 'organizer']);
    }
}
