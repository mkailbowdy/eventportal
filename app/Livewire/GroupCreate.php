<?php

namespace App\Livewire;


use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Group;

class GroupCreate extends Component
{

    public $name = '';


    public $description = '';


    public $prefecture = '';

    public $city = '';

    public function store()
    {

        // Let's get the attributes from the form
        Group::create([
            'name' => $this->name,
            'description' => $this->description,
            'prefecture' => $this->prefecture,
            'city' => $this->city,
        ]);

        // We could also do $job->employer->user->email, but Laravel is smart enough where we can just use the following:
        // We throw the mail request into a queue
//        Mail::to($job->employer->user)->queue(
//            new JobPosted($job)
//        );

        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.groups.create');
    }
}
