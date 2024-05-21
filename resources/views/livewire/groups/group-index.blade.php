<div class="mx-auto max-w-7xl sm:px-6 lg:px-8 py-5">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Groups') }}
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
        <div class="items-center">
            @role('member')
            <h1 class="m-6">Want to start holding events? Register a new group!</h1>
            @endrole
        </div>
    </div>

    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach($groups as $group)
            <li wire:key="{{$group->id}}"
                class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                <div class="flex flex-1 flex-col p-8">
                    <a href="/groups/{{$group->id}}">
                        @if ($group->photo_path)
                            <img src="{{ asset('storage/' . $group->photo_path) }}" alt="group Photo"
                                 class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        @else
                            <img src="{{ asset('storage/' . 'photos/placeholder_image.png' ) }}"
                                 alt="Group Photo" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        @endif
                    </a>
                    <h3 class="mt-2 font-medium text-gray-900">{{$group->name}}</h3>
                    <small>Organized by
                        @if ($group->users()->wherePivot('role', 'organizer')->first())
                            {{$group->users()->wherePivot('role', 'organizer')->first()->name}}
                        @else
                            {{'No One'}}
                        @endif
                    </small>
                    <dl class="mt-2 flex flex-grow flex-col justify-between">
                        <dt class="sr-only">Description</dt>
                        <dd class="text-sm text-gray-500">{{ $group->description }}</dd>
                    </dl>
                </div>
            </li>
        @endforeach
    </ul>
    {{$groups->links()}}
</div>
