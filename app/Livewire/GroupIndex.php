<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Stevebauman\Location\Facades\Location;
use Transliterator;

#[Title('Groups')]
class GroupIndex extends Component
{
    use WithPagination;

    public Collection $categories;
    public int $searchCategory = 0;
    public string $searchQuery = '';
    public string $searchPrefecture = '';

    public function mount(): void
    {
        $this->categories = Category::pluck('name', 'id');
        $ip = request()->ip();
        $currentLocation = Location::get($ip);

        if (!$currentLocation || $currentLocation->countryName !== 'Japan') {
            $this->searchPrefecture = 'Tokyo';
        } else {
            $transliterator = Transliterator::create('NFD; [:Nonspacing Mark:] Remove; NFC;');
            $this->searchPrefecture = $transliterator->transliterate($currentLocation->regionName);
        }
    }

    // updating() is a lifecycle hook. Any time the component is updated, the pagination pages is reset
    public function updating($key): void
    {
        if ($key === 'searchQuery' || $key === 'searchCategory' || $key === 'searchPrefecture') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $groups = Group::with(['users'])
            ->orderBy('name', 'ASC')
            ->when($this->searchQuery !== '',
                fn(Builder $query) => $query->where('name', 'like', '%'.$this->searchQuery.'%'))
            ->when($this->searchCategory > 0, fn(Builder $query) => $query->where('category_id', $this->searchCategory))
            ->when($this->searchPrefecture !== '',
                fn(Builder $query) => $query->where('prefecture', 'like', '%'.$this->searchPrefecture.'%'))
//            ->whereHas('group', function ($query) {
//                $query->where('prefecture', $this->searchPrefecture);
//            })
            ->paginate(8);


        // We're passing to the view a variable called $events which contains an Event model that includes all records.
        return view('livewire.groups.group-index', [
            'groups' => $groups,
        ]);

//        return view('livewire.groups.group-index', [
//            'groups' => Group::orderBy('created_at', 'desc')->paginate(10),
//        ]);
    }
}
