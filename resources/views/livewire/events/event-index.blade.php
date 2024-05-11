<div class="mx-auto max-w-7xl sm:px-6 lg:px-8 py-5">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Events') }}
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
            @role('organizer')
            <h1 class="m-6">Host an event!</h1>
            @endrole

            @role('member')
            <h1 class="m-6">Want to start holding events? Register a new group!</h1>
            @endrole
        </div>
        <div>
            @role('organizer')
            <a href="{{route('events.create')}}"
               class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                Event</a>
            @endrole
            @role('member')
            <a href="{{route('groups.create')}}"
               class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                a Group</a>
            @endrole
        </div>
    </div>

    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach($events as $event)
            <li wire:key="{{$event->id}}"
                class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                <div class="flex flex-1 flex-col p-8">
                    <a href="/events/{{$event->id}}">
                        <img class="mx-auto h-32 w-32 flex-shrink-0 rounded-full"
                             src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                             alt="">
                    </a>
                    <h3 class="mt-6 text-sm font-medium text-gray-900">{{$event->title}}</h3>
                    <dl class="mt-1 flex flex-grow flex-col justify-between">
                        <dt class="sr-only">Name</dt>
                        <dd class="text-sm text-gray-500">{{$event->group->name}}</dd>
                        <dt class="sr-only">Participants</dt>
                        <dd class="mt-3">
                            <span
                                class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-lg font-medium text-green-700 ring-1 ring-inset ring-green-600/20">People Going: {{$event->participants}}</span>
                        </dd>
                        <dt class="sr-only">Date</dt>
                        <dd>{{ $event->event_date->format('D, M j') }} @ {{ $event->start_time->format('H:i') }}</dd>
                        <dt class="sr-only">Date</dt>
                        <dd></dd>
                    </dl>
                </div>
                <div>
                    <div class="-mt-px flex divide-x divide-gray-200">
                        <div class="flex w-0 flex-1">
                            <a href="mailto:janecooper@example.com"
                               class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path
                                        d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z"/>
                                    <path
                                        d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z"/>
                                </svg>
                                Details
                            </a>
                        </div>
                        <div class="-ml-px flex w-0 flex-1">
                            <button type="button"
                                    href="tel:+1-202-555-0170"
                                    wire:click="participate({{$event->id}})"
                                    wire:navigate
                                    class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z"
                                          clip-rule="evenodd"/>
                                </svg>
                                Join
                            </button>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
