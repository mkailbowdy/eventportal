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
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{$group->name}}</h1>
            <p class="text-xl leading-8 text-gray-700">{{$group->description}}</p>
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
                    </ul>
                </div>
                <div x-show="selectedTab === 'Members'" class="tab-content">
                    <h2 class="text-xl font-bold mb-4">Members ({{$members->count()}})</h2>
                    <!-- members list -->
                    <ul role="list" class="flex">
                        @foreach($members as $member)
                            <li wire:key="{{$member->id}}"
                                class="p-1 rounded-lg text-center">
                                <div class="">
                                    <h3 class="">{{$member->name}}</h3>

                                    <a href="">
                                        @if ($member->photo_path)
                                            <img src="{{ asset('storage/' . $member->photo_path) }}" alt="Event Photo"
                                                 class="mx-auto rounded-full object-cover min-w-[128px] border border-gray2 h-24 w-24 overflow-hidden">
                                        @else
                                            <img src="{{ asset('storage/' . 'photos/placeholder_image.png' ) }}"
                                                 alt="Event Photo"
                                                 class="rounded-full object-cover min-w-[128px] border border-gray2 h-24 w-24 overflow-hidden">
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
