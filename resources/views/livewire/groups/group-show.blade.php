<div class="">
    <div class="flex grow min-w-full max-h-60 justify-center">
        @if($group->photo_path)
            <img src="{{asset('storage/' . $group->photo_path)}}">
        @else
            <img src="{{asset('storage/' . 'photos/placeholder_group_avatar.png')}}"
                 class="object-center object-cover ">
        @endif
    </div>
    <div class="mx-6 py-10">

        <div class="max-w-sm">
            <small
                class="text-base font-semibold leading-7 text-gray-600">{{$group->category()->first()->name}}
                in</small>
            <p class="text-base font-semibold leading-7 text-indigo-600">{{$group->prefecture}} Prefecture</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{$group->name}}</h1>
            <p class="mt-6 text-xl leading-8 text-gray-700">{{$group->description}}</p>
        </div>

        <div x-data="{ selectedTab: 'Upcoming Events' }">
            <div class="py-6 max-w-sm">
                <nav class="flex justify-around space-x-4" aria-label="Tabs">
                    <a href="#"
                       @click.prevent="selectedTab = 'Upcoming Events'"
                       :class="{'border-b-4 border-indigo-500 bg-gray-100 text-gray-700': selectedTab === 'Upcoming Events', 'text-gray-500 hover:text-gray-700': selectedTab !== 'Upcoming Events'}"
                       class="rounded text-md font-medium">Upcoming Events</a>
                    <a href="#"
                       @click.prevent="selectedTab = 'Members'"
                       :class="{'border-b-4 border-indigo-500 bg-gray-100 text-gray-700': selectedTab === 'Members', 'text-gray-500 hover:text-gray-700': selectedTab !== 'Members'}"
                       class="rounded text-md font-medium">Members</a>
                    <a href="#"
                       @click.prevent="selectedTab = 'Albums'"
                       :class="{'border-b-4 border-indigo-500 bg-gray-100 text-gray-700': selectedTab === 'Albums', 'text-gray-500 hover:text-gray-700': selectedTab !== 'Albums'}"
                       class="rounded text-md font-medium">Albums</a>
                </nav>
            </div>

            <!-- Content Sections -->
            <div class="">
                <div x-show="selectedTab === 'Upcoming Events'" class="tab-content">
                    <!-- Content for upcoming events -->
                    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach($events as $event)
                            <li wire:key="{{$event->id}}"
                                class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                                <div class="flex flex-1 flex-col p-8">
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
                                        <dd>{{ $event->event_date->format('D, M j') }}
                                            @ {{ $event->start_time->format('H:i') }}</dd>
                                        <dt class="sr-only">Date</dt>
                                        <dd></dd>
                                    </dl>
                                </div>
                                <div>
                                    <div class="-mt-px flex divide-x divide-gray-200">
                                        <div class="flex w-0 flex-1">
                                            <a href="mailto:janecooper@example.com"
                                               class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                                     fill="currentColor"
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
                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                                     fill="currentColor"
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
                <div x-show="selectedTab === 'Members'" class="tab-content">
                    <h2 class="text-xl font-bold mb-4">Members ({{$members->count()}})</h2>
                    <!-- members list -->
                    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach($members as $member)
                            <li wire:key="{{$member->id}}"
                                class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center">
                                <div class="flex flex-1 flex-col p-8">
                                    <h3 class="mt-6 text-sm font-medium text-gray-900">{{$member->name}}</h3>

                                    <a href="">
                                        @if ($member->photo_path)
                                            <img src="{{ asset('storage/' . $member->photo_path) }}" alt="Event Photo"
                                                 class="mx-auto rounded-full object-cover min-w-[128px] border border-gray2 h-32 w-32">
                                        @else
                                            <img src="{{ asset('storage/' . 'photos/placeholder_image.png' ) }}"
                                                 alt="Event Photo"
                                                 class="rounded-full object-cover min-w-[128px] border border-gray2 h-32 w-32">
                                        @endif
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div x-show="selectedTab === 'Albums'" class="tab-content">
                    <h2 class="text-xl font-bold mb-4">Albums</h2>
                    <!-- Content for albums -->
                    <p>Details about albums will be displayed here.</p>
                </div>
            </div>
        </div>
    </div>

</div>
