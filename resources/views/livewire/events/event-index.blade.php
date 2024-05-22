@php
    use Carbon\Carbon;
@endphp
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
            <span class="relative inline-flex">
    <a href="{{route('events.create')}}"
       class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-sky-500 bg-white dark:bg-slate-800 transition ease-in-out duration-150 ring-1 ring-slate-900/10 dark:ring-slate-200/20">
      Create Event
    </a>
    <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
      <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
    </span>
  </span>
            @endrole
            @role('member')
            <a href="{{route('groups.create')}}"
               class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                a Group</a>
            @endrole
        </div>
    </div>


    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <div x-data="{ selectedTab: 'All' }">
        <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select a tab</label>
            <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
            <select id="tabs" name="tabs"
                    class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                <option value="Language Exchange">Language Exchange</option>
                <option value="Outdoor">Outdoor</option>
                <option value="Social">Social</option>
                <option value="Sports">Sports</option>
                <option value="Exercise">Exercise</option>
            </select>
        </div>
        <div class="hidden sm:block">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                    <a href="#"
                       @click.prevent="selectedTab = 'All'"
                       :class="{'border-indigo-500 text-indigo-600' : selectedTab === 'All', 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' : selectedTab !== 'All'}"
                       class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 group inline-flex items-center border-b-2 py-4 px-1 text-sm font-medium">
                        <!-- Current: "text-indigo-500", Default: "text-gray-400 group-hover:text-gray-500" -->
                        <svg class="text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5"
                             :class="{'text-indigo-500' : selectedTab === 'All, 'text-gray-400 group-hover:text-gray-500' : selectedTab !== 'All'}"
                             viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                            <path
                                d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"/>
                        </svg>
                        <span>All</span>
                    </a>
                    <a href="#"
                       @click.prevent="selectedTab = 'Language Exchange'"
                       :class="{'border-indigo-500 text-indigo-600' : selectedTab === 'Language Exchange', 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' : selectedTab !== 'Language Exchange'}"
                       class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 group inline-flex items-center border-b-2 py-4 px-1 text-sm font-medium">
                        <!-- Current: "text-indigo-500", Default: "text-gray-400 group-hover:text-gray-500" -->
                        <svg class="text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5"
                             :class="{'text-indigo-500' : selectedTab === 'Language Exchange', 'text-gray-400 group-hover:text-gray-500' : selectedTab !== 'Language Exchange'}"
                             viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                            <path
                                d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"/>
                        </svg>
                        <span>Language Exchange</span>
                    </a>
                    <a href="#"
                       @click.prevent="selectedTab = 'Outdoor'"
                       :class="{'border-indigo-500 text-indigo-600' : selectedTab === 'Outdoor', 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' : selectedTab !== 'Outdoor'}"
                       class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 group inline-flex items-center border-b-2 py-4 px-1 text-sm font-medium">
                        <!-- Current: "text-indigo-500", Default: "text-gray-400 group-hover:text-gray-500" -->
                        <svg class="text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5"
                             :class="{'text-indigo-500' : selectedTab === 'Outdoor', 'text-gray-400 group-hover:text-gray-500' : selectedTab !== 'Outdoor'}"
                             viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                            <path
                                d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"/>
                        </svg>
                        <span>Outdoor</span>
                    </a>
                    <a href="#"
                       @click.prevent="selectedTab = 'Social'"
                       :class="{'border-indigo-500 text-indigo-600' : selectedTab === 'Social', 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' : selectedTab !== 'Social'}"
                       class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 group inline-flex items-center border-b-2 py-4 px-1 text-sm font-medium">
                        <!-- Current: "text-indigo-500", Default: "text-gray-400 group-hover:text-gray-500" -->
                        <svg class="text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5"
                             :class="{'text-indigo-500' : selectedTab === 'Social', 'text-gray-400 group-hover:text-gray-500' : selectedTab !== 'Social'}"
                             viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                            <path
                                d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"/>
                        </svg>
                        <span>Social</span>
                    </a>
                    <a href="#"
                       @click.prevent="selectedTab = 'Sports'"
                       :class="{'border-indigo-500 text-indigo-600' : selectedTab === 'Sports', 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' : selectedTab !== 'Sports'}"
                       class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 group inline-flex items-center border-b-2 py-4 px-1 text-sm font-medium">
                        <!-- Current: "text-indigo-500", Default: "text-gray-400 group-hover:text-gray-500" -->
                        <svg class="text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5"
                             :class="{'text-indigo-500' : selectedTab === 'Sports', 'text-gray-400 group-hover:text-gray-500' : selectedTab !== 'Sports'}"
                             viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                            <path
                                d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"/>
                        </svg>
                        <span>Sports</span>
                    </a>
                    <a href="#"
                       @click.prevent="selectedTab = 'Exercise'"
                       :class="{'border-indigo-500 text-indigo-600' : selectedTab === 'Exercise', 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' : selectedTab !== 'Exercise'}"
                       class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 group inline-flex items-center border-b-2 py-4 px-1 text-sm font-medium">
                        <!-- Current: "text-indigo-500", Default: "text-gray-400 group-hover:text-gray-500" -->
                        <svg class="text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5"
                             :class="{'text-indigo-500' : selectedTab === 'Exercise', 'text-gray-400 group-hover:text-gray-500' : selectedTab !== 'Exercise'}"
                             viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                            <path
                                d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z"/>
                        </svg>
                        <span>Exercise</span>
                    </a>
                </nav>
            </div>
        </div>

        <!--Content Sections -->
        <div class="mt-6">
            <div x-show="selectedTab === 'All'" class="tab-content">
                <h2 class="text-xl font-bold mb-4">All Upcoming Events</h2>
                @php
                    $filteredEvents = $events->filter(function($value){
                         return Carbon::parse($value->end_date) < now();
                    })->sortBy('start_time')->sortBy('event_date');
                @endphp
                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach($filteredEvents as $filteredEvent)
                        <li wire:key="{{$filteredEvent->id}}"
                            class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                            <div class="flex flex-1 flex-col p-8">
                                <a href="/events/{{$filteredEvent->id}}">
                                    @if ($filteredEvent->photo_path)
                                        <img src="{{ asset('storage/' . $filteredEvent->photo_path) }}"
                                             alt="Event Photo"
                                             class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                    @else
                                        <img src="{{ asset('storage/' . 'photos/placeholder_image.png' ) }}"
                                             alt="Event Photo"
                                             class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                    @endif
                                </a>
                                <h3 class="mt-2 font-medium text-gray-900">{{$filteredEvent->title}}</h3>
                                <dl class="mt-2 flex flex-grow flex-col justify-between">
                                    <dt class="sr-only">Name</dt>
                                    <dd class="text-sm text-gray-500">{{$filteredEvent->group->name}}</dd>
                                    <dt class="sr-only">Participants</dt>
                                    <dd class="mt-2">
                            <span
                                class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-lg font-medium text-green-700 ring-1 ring-inset ring-green-600/20">People Going: {{$filteredEvent->participants}}</span>
                                    </dd>
                                    <dt class="sr-only">Date</dt>
                                    <dd class="mt-2">{{ $filteredEvent->event_date->format('D, M j') }}
                                        @ {{ $filteredEvent->start_time->format('H:i') }}</dd>
                                    <dt class="sr-only">Date</dt>
                                    <dd></dd>
                                </dl>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div x-show="selectedTab === 'Language Exchange'" class="tab-content">
                <h2 class="text-xl font-bold mb-4">Language Exchange</h2>
                @php
                    $filteredEvents = $events->filter(function($value){
                         return Carbon::parse($value->end_date) < now() && $value->category_id === 1;
                    })->sortBy('start_time')->sortBy('event_date');
                @endphp
                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach($filteredEvents as $filteredEvent)
                        <li wire:key="{{$filteredEvent->id}}"
                            class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                            <div class="flex flex-1 flex-col p-8">
                                <a href="/events/{{$filteredEvent->id}}">
                                    @if ($filteredEvent->photo_path)
                                        <img src="{{ asset('storage/' . $filteredEvent->photo_path) }}"
                                             alt="Event Photo"
                                             class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                    @else
                                        <img src="{{ asset('storage/' . 'photos/placeholder_image.png' ) }}"
                                             alt="Event Photo"
                                             class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                    @endif
                                </a>
                                <h3 class="mt-2 font-medium text-gray-900">{{$filteredEvent->title}}</h3>
                                <dl class="mt-2 flex flex-grow flex-col justify-between">
                                    <dt class="sr-only">Name</dt>
                                    <dd class="text-sm text-gray-500">{{$filteredEvent->group->name}}</dd>
                                    <dt class="sr-only">Participants</dt>
                                    <dd class="mt-2">
                            <span
                                class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-lg font-medium text-green-700 ring-1 ring-inset ring-green-600/20">People Going: {{$filteredEvent->participants}}</span>
                                    </dd>
                                    <dt class="sr-only">Date</dt>
                                    <dd class="mt-2">{{ $filteredEvent->event_date->format('D, M j') }}
                                        @ {{ $filteredEvent->start_time->format('H:i') }}</dd>
                                    <dt class="sr-only">Date</dt>
                                    <dd></dd>
                                </dl>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

{{--<ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">--}}
{{--    @foreach($events as $event)--}}
{{--        <li wire:key="{{$event->id}}"--}}
{{--            class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">--}}
{{--            <div class="flex flex-1 flex-col p-8">--}}
{{--                <a href="/events/{{$event->id}}">--}}
{{--                    @if ($event->photo_path)--}}
{{--                        <img src="{{ asset('storage/' . $event->photo_path) }}" alt="Event Photo"--}}
{{--                             class="h-full w-full object-cover object-center lg:h-full lg:w-full">--}}
{{--                    @else--}}
{{--                        <img src="{{ asset('storage/' . 'photos/placeholder_image.png' ) }}"--}}
{{--                             alt="Event Photo" class="h-full w-full object-cover object-center lg:h-full lg:w-full">--}}
{{--                    @endif--}}
{{--                </a>--}}
{{--                <h3 class="mt-2 font-medium text-gray-900">{{$event->title}}</h3>--}}
{{--                <dl class="mt-2 flex flex-grow flex-col justify-between">--}}
{{--                    <dt class="sr-only">Name</dt>--}}
{{--                    <dd class="text-sm text-gray-500">{{$event->group->name}}</dd>--}}
{{--                    <dt class="sr-only">Participants</dt>--}}
{{--                    <dd class="mt-2">--}}
{{--                            <span--}}
{{--                                class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-lg font-medium text-green-700 ring-1 ring-inset ring-green-600/20">People Going: {{$event->participants}}</span>--}}
{{--                    </dd>--}}
{{--                    <dt class="sr-only">Date</dt>--}}
{{--                    <dd class="mt-2">{{ $event->event_date->format('D, M j') }}--}}
{{--                        @ {{ $event->start_time->format('H:i') }}</dd>--}}
{{--                    <dt class="sr-only">Date</dt>--}}
{{--                    <dd></dd>--}}
{{--                </dl>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}
{{--{{$events->links()}}--}}
{{--</div>--}}
