<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Stevebauman\Location\Facades\Location;
use Transliterator;

#[Title('Events')]
class EventIndex extends Component
{
    use WithPagination;

    public Collection $categories;
//    public string $searchQuery = '';
    public int $searchCategory = 0;
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
        $events = Event::with(['group', 'users'])
            ->withCount([
                'users as people_going_count' => function ($query) {
                    $query->where('participation_status', 1);
                }
            ])
            ->orderBy('event_date', 'ASC')
            ->orderBy('start_time', 'ASC')
//            ->when($this->searchQuery !== '',
//                fn(Builder $query) => $query->where('title', 'like', '%'.$this->searchQuery.'%'))
            ->when($this->searchCategory > 0, fn(Builder $query) => $query->where('category_id', $this->searchCategory))
            ->whereHas('group', function ($query) {
                $query->where('prefecture', $this->searchPrefecture);
            })
            ->paginate(8);


        // We're passing to the view a variable called $events which contains an Event model that includes all records.
        return view('livewire.events.event-index', [
            'events' => $events,
        ]);
    }
}
