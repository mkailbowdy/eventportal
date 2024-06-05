<div class="mx-auto max-w-7xl px-3 sm:px-6 lg:px-8 py-5">
    <div class="sm:flex sm:items-center">
        <div class="py-3">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Events in
                <span class="text-indigo-500">{{$searchPrefecture}}</span>
            </h2>
        </div>
    </div>
    <div class="py-4">
        <div class="space-y-4 sm:space-y-0 sm:space-x-4 sm:flex sm:items-center">
            <select wire:model.live="searchPrefecture" name="prefecture"
                    class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="Japan">Choose a prefecture</option>
                @foreach(App\Enums\Prefecture::cases() as $prefecture)
                    <option value="{{$prefecture->value}}">{{$prefecture->label()}}</option>
                @endforeach
            </select>
            <select wire:model.live="searchCategory" name="category"
                    class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="0">Choose a category</option>
                @foreach($categories as $id => $category)
                    <option value="{{$id}}">{{$category}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if($events->isEmpty())
        <div class="pb-20">
            <div class="p-2 bg-red-500 text-white">No events scheduled yet :(</div>
        </div>
    @endif

    <div class="pb-20">
        @foreach($events as $event)
            <div class="flex flex-row py-3">
                <div class="flex-shrink-0">
                    <a href="{{route('events.show', ['event' => $event->id])}}">
                        @if($event->photo_path)
                            <img class="h-24 w-24 rounded-md object-cover"
                                 src="{{asset('storage/' . $event->photo_path)}}"
                                 alt="">
                        @else
                            <img class="h-24 w-24 rounded-md object-cover"
                                 src="{{asset('storage/' . 'photos/placeholder_image.png' )}}"
                                 alt="">
                        @endif
                    </a>

                </div>
                <div class="flex-col ml-6">
                    <div><a
                            href="{{route('events.show', ['event' => $event->id])}}"><strong>{{$event->title}}</strong></a>
                    </div>
                    <div class="text-gray-500">{{$event->group->name}}</div>
                    <div>
                        <div>{{$event->event_date->format('D, M jS')}}
                            ・{{$event->start_time->format('H:i')}}
                            to {{$event->end_time->format('H:i')}}</div>
                    </div>

                    <div>Going: {{$event->users()->wherePivot('participation_status', 1)->count()}}
                        / {{$event->max_participants}}</div>
                </div>
            </div>
        @endforeach
    </div>

</div>
