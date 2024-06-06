<div class="max-w-7xl mx-auto py-12 px-6 sm:px-8 lg:px-12 bg-gray-50">
    <div class="flex justify-center">
        @if($group->photo_path)
            <img src="{{ asset('storage/' . $group->photo_path) }}"
                 class="object-cover rounded-lg shadow-lg w-full max-w-xl">
        @else
            <img src="{{ asset('storage/photos/placeholder_group_avatar.png') }}"
                 class="object-cover rounded-lg shadow-lg w-full max-w-xl">
        @endif
    </div>

    <div class="mt-12">
        <div class="max-w-xl mx-auto mb-12">
            <small class="text-lg font-semibold text-gray-700">{{ $group->category()->first()->name }} in</small>
            <p class="text-lg font-semibold text-blue-600">{{ $group->prefecture }} Prefecture</p>
            <h1 class="text-4xl font-extrabold text-gray-900 mt-2 mb-4">{{ $group->name }}</h1>
            <p class="text-lg text-gray-700">{{ $group->description }}</p>
        </div>

        <div x-data="{ selectedTab: 'Upcoming Events' }">
            <div class="py-6 max-w-xl mx-auto">
                <nav class="flex justify-around border-b border-gray-300">
                    <a href="#"
                       @click.prevent="selectedTab = 'Upcoming Events'"
                       :class="{ 'border-b-4 border-blue-600 text-gray-900': selectedTab === 'Upcoming Events', 'text-gray-600 hover:text-gray-900': selectedTab !== 'Upcoming Events' }"
                       class="pb-3 text-lg font-medium">Upcoming Events</a>
                    <a href="#"
                       @click.prevent="selectedTab = 'Members'"
                       :class="{ 'border-b-4 border-blue-600 text-gray-900': selectedTab === 'Members', 'text-gray-600 hover:text-gray-900': selectedTab !== 'Members' }"
                       class="pb-3 text-lg font-medium">Members</a>
                    <a href="#"
                       @click.prevent="selectedTab = 'Albums'"
                       :class="{ 'border-b-4 border-blue-600 text-gray-900': selectedTab === 'Albums', 'text-gray-600 hover:text-gray-900': selectedTab !== 'Albums' }"
                       class="pb-3 text-lg font-medium">Albums</a>
                </nav>
            </div>

            <!-- Content Sections -->
            <div class="mt-8 space-y-8">
                <div x-show="selectedTab === 'Upcoming Events'" class="space-y-8">
                    @foreach($events as $event)
                        <div
                            class="flex flex-col lg:flex-row bg-white rounded-lg shadow-md p-6 space-y-4 lg:space-y-0 lg:space-x-6">
                            <a href="{{ route('events.show', ['event' => $event->id]) }}" class="lg:flex-shrink-0">
                                @if($event->photo_path)
                                    <img class="h-48 w-full lg:w-36 rounded-md object-cover"
                                         src="{{ asset('storage/' . $event->photo_path) }}" alt="">
                                @else
                                    <img class="h-48 w-full lg:w-36 rounded-md object-cover"
                                         src="{{ asset('storage/photos/placeholder_image.png') }}" alt="">
                                @endif
                            </a>
                            <div class="flex flex-col justify-between">
                                <a href="{{ route('events.show', ['event' => $event->id]) }}"
                                   class="text-xl font-bold text-gray-900">{{ $event->title }}</a>
                                <div class="text-gray-600">{{ $event->group->name }}</div>
                                <div class="text-gray-600">
                                    {{ $event->event_date->format('D, M jS') }} &bull; {{ $event->start_time->format('H:i') }}
                                    to {{ $event->end_time->format('H:i') }}</div>
                                <div class="text-gray-600">
                                    Going: {{ $event->users()->wherePivot('participation_status', 1)->count() }}
                                    / {{ $event->max_participants }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div x-show="selectedTab === 'Members'" class="space-y-8">
                    <h2 class="text-2xl font-bold mb-4">Members ({{ $members->count() }})</h2>
                    <ul role="list" class="space-y-4">
                        @foreach($members as $member)
                            <li wire:key="{{ $member->id }}"
                                class="flex items-center gap-4 bg-white rounded-lg shadow-md p-4">
                                @if ($member->photo_path)
                                    <img src="{{ asset('storage/' . $member->photo_path) }}" alt="Member Photo"
                                         class="h-20 w-20 rounded-full object-cover border border-gray-300">
                                @else
                                    <img src="{{ asset('storage/photos/placeholder_image.png') }}" alt="Member Photo"
                                         class="h-20 w-20 rounded-full object-cover border border-gray-300">
                                @endif
                                <span class="text-lg text-gray-800">{{ $member->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div x-show="selectedTab === 'Albums'" class="space-y-8">
                    <h2 class="text-2xl font-bold mb-4">Albums</h2>
                    <p class="text-lg text-gray-700">Details about albums will be displayed here.</p>
                </div>
            </div>
        </div>
    </div>
</div>
