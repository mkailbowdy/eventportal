<?php

namespace App\Livewire;


use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Group;

class GroupCreate extends Component
{
    #[Validate]
    public $name = '';

    #[Validate('required', message:'Yo, too short')]
    public $description = '';

    #[Validate('required', message:"Don't forget your prefecture")]
    public $prefecture = '';

    #[Validate('required', message:'Every group needs a place to call home')]
    public $city = '';

    public $showSuccessIndicator = false;

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

    public function store()
    {



        // Let's get the attributes from the form
//        $group = Group::create([
//            'name' => $this->name,
//            'description' => $this->description,
//            'prefecture' => $this->prefecture,
//            'city' => $this->city,
//        ]);

        // Always validate user input.
        $validated = $this->validate();
        $group = Group::create($validated);

        // Give the user the role of 'organizer'
        auth()->user()->removeRole('member');
        auth()->user()->assignRole('organizer');

        // Attach the user to this group. This will be in the group_user pivot table.
        // Once a user becomes an organizer, they can no longer access /groups/create route.
        $group->users()->attach(auth()->user()->id, ['role' => 'organizer']);

        // sleep(). This prevents multiple submissions from accidental double clicking. Also the user can
        // recognize that a network request was sent. If it's too fast, they might think something is wrong.
        sleep(1);
        $this->showSuccessIndicator = true;

        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.groups.create');
    }
}
