<?php

namespace App\Livewire;


use App\Livewire\Forms\GroupForm;
use Livewire\Component;

class GroupCreate extends Component
{

    public GroupForm $form;
    public $showSuccessIndicator = false;

    public function store()
    {
        $this->form->update();
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
