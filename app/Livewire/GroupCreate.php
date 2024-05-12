<?php

namespace App\Livewire;


use App\Livewire\Forms\GroupForm;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class GroupCreate extends Component
{
    use WithFileUploads;

    public GroupForm $form;
    public $showSuccessIndicator = false;

    #[Validate('image|max:20480')] // 20MB Max
    public $photo;


    public function store()
    {
        $this->form->update();

        $this->form->group->photo_path = $this->photo->store('photos', 'public');
        $this->form->group->save();

        // sleep(). This prevents multiple submissions from accidental double clicking. Also the user can
        // recognize that a network request was sent. If it's too fast, they might think something is wrong.
        sleep(1);
        $this->showSuccessIndicator = true;
        $this->redirect('/events');
    }

    public function render()
    {
        return view('livewire.groups.group-create');
    }
}
