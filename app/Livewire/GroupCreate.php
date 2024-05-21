<?php

namespace App\Livewire;


use App\Livewire\Forms\GroupForm;
use App\Models\Group;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Create Group')]
class GroupCreate extends Component
{
    use WithFileUploads;

    public GroupForm $form;
    public Group $group;

    public $file_upload;

    public function mount()
    {
        $this->form->group = new Group();
    }

    public function save()
    {
        $this->form->store();

        if ($this->file_upload) {
            $this->form->group->photo_path = $this->file_upload->store('photos', 'public');
        }

        $this->form->group->save();

        session()->flash('status', 'Event successfully posted!');


        // sleep(). This prevents multiple submissions from accidental double clicking. Also the user can
        // recognize that a network request was sent. If it's too fast, they might think something is wrong.
        sleep(1);
//        $this->redirect('/events');

        return redirect()->to('/events')->with('success', 'Group created.');
    }


    public function clearImage()
    {
        // Clear both the event's photo path and the form's photo path
        $this->form->photo_path = null;
        $this->file_upload = null;
    }


    public function render()
    {
        return view('livewire.groups.group-create');
    }
}
