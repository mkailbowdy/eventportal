<?php

namespace App\Livewire;

use App\Livewire\Forms\GroupForm;
use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class GroupEdit extends Component
{

    use WithFileUploads;

    public GroupForm $form;

    #[Validate('image|max:20480')]
    public $file_upload;
    public $showSuccessIndicator = false;

    public function mount(Group $group)
    {
        $this->form->group = Group::findOrFail($group->id);
        $this->authorize('update', $this->form->group);

        $this->form->setGroup($group);
    }

    public function delete(Group $group)
    {
        $group->delete();
        return redirect()->route('events.index');
    }

    public function cancelImage()
    {
        $this->file_upload = null;
    }

    public function clearImage()
    {
        // Clear both the event's photo path and the form's photo path
        $this->form->group->photo_path = null;
        $this->form->photo_path = null;
        $this->file_upload = null;
    }

    public function save()
    {
        $this->form->update();

        // save the image to the photo_path in the database
        if ($this->file_upload) {
            $this->form->group->photo_path = $this->file_upload->store('photos', 'public');
        }

        $this->form->group->save();

        sleep(1);

        $this->showSuccessIndicator = true;
        return redirect(route('groups.show', $this->form->group));
    }

    public function render()
    {
        return view('livewire.groups.group-edit');
    }
}
