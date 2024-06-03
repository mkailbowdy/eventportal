<div class="mx-auto max-w-7xl px-6 lg:px-8 pb-64">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Please read the community guidelines before participating in events!') }}
        </h2>
    </x-slot>
    <div class="flex justify-center items-baseline">
        {{--        <div>--}}
        {{--            @if (session()->has('status'))--}}
        {{--                <div class="alert alert-success text-green-500">--}}
        {{--                    {{ session('status') }}--}}
        {{--                </div>--}}
        {{--            @endif--}}
        {{--        </div>--}}
        @role('member')
        <div class="items-center">
            <h1 class="m-6">Want to start holding events? Register a new group!</h1>
        </div>
        @endrole
        @role('member')
        <div>
            <a href="{{route('groups.create')}}"
               class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                a Group</a>
        </div>
        @endrole
    </div>

    <div class="mt-6">
        <div class="py-3">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Events in
                <span class="text-indigo-500">{{$searchPrefecture}}</span></h2>
        </div>
        <div class="py-6">
            {{--            <input wire:model.live="searchQuery" type="search" id="search" placeholder="Search...">--}}
            <select wire:model.live="searchPrefecture" name="prefecture">
                <option value="Japan">Choose a prefecture</option>
                @foreach(App\Enums\Prefecture::cases() as $prefecture)
                    <option value="{{$prefecture->value}}">{{$prefecture->label()}}</option>
                @endforeach
            </select>
            <select wire:model.live="searchCategory" name="category">
                <option value="0">Choose a category</option>
                @foreach($categories as $id => $category)
                    <option value="{{$id}}">{{$category}}</option>
                @endforeach
            </select>
        </div>

        <div>
            @if($events->isEmpty())
                <p>No events scheduled in this prefecture :(</p>
            @endif
            <ul role="list" class="grid gap-6 grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach($events as $event)
                    <li wire:key="{{$event->id}}"
                        class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                        <div class="flex flex-1 flex-col p-4">
                            <a href="/events/{{$event->id}}">
                                @if ($event->photo_path)
                                    <img src="{{ asset('storage/' . $event->photo_path) }}" alt="Event Photo"
                                         class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                @else
                                    <img src="{{ asset('storage/' . 'photos/placeholder_image.png' ) }}"
                                         alt="Event Photo"
                                         class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                @endif
                            </a>
                            <h3 class="mt-2 font-medium text-gray-900">{{$event->title}}</h3>
                            <dl class="mt-2 flex flex-grow flex-col justify-between">
                                <dt class="sr-only">Name</dt>
                                <dd class="text-sm text-gray-500">{{$event->group->name}}</dd>
                                <dt class="sr-only">Participants</dt>
                                <dd class="mt-2">
                            <span
                                class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-lg font-medium text-green-700 ring-1 ring-inset ring-green-600/20">People Going: {{$event->people_going_count}}</span>
                                </dd>
                                <dt class="sr-only">Date</dt>
                                <dd class="mt-2">{{ $event->event_date->format('D, M j') }}
                                    @ {{ $event->start_time->format('H:i') }}</dd>
                                <dt class="sr-only">Date</dt>
                                <dd></dd>
                            </dl>
                        </div>
                    </li>
                @endforeach
            </ul>
            {{$events->links()}}
        </div>
    </div>
</div>
