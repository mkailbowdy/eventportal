<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhotos extends Component
{
    use WithFileUploads;

    #[Validate(['photos.*' => 'image|max:1024'])]
    public $photos = [];

    public function save()
    {
        foreach ($this->photos as $photo) {
            $path = $photo->store('photos', 'public');
            $this->photos[] = $path;
        }
    }
}
