<div class="min-h-full">
    <div class="py-10">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$event->title}}
            </h2>
        </x-slot>
        <main>
            <div class="bg-white">
                <section aria-labelledby="features-heading" class="relative">
                    <div
                        class="aspect-h-2 aspect-w-3 overflow-hidden sm:aspect-w-5 lg:aspect-none lg:absolute lg:h-full lg:w-1/2 lg:pr-4 xl:pr-16">
                        @if ($event->photo_path)
                            <img src="{{ asset('storage/' . $event->photo_path) }}" alt="Event Photo"
                                 class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        @else
                            <img src="{{ asset('storage/' . 'photos/placeholder_image.png' ) }}"
                                 alt="Event Photo" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        @endif
                    </div>
                    <div
                        class="mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 sm:pb-32 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 lg:pt-32">
                        <div class="lg:col-start-2">
                            <a href="/groups/{{$event->group->id}}">
                                @if($event->group->photo_path)
                                    <img class="mx-auto h-32 w-32 flex-shrink-0 rounded-full"
                                         src="{{ asset('storage/' . $event->group->photo_path) }}"
                                         alt="">
                                @else
                                    <img class="mx-auto h-32 w-32 flex-shrink-0 rounded-full"
                                         src="{{ asset('storage/' . 'photos/placeholder_group_avatar.png') }}"
                                         alt="">
                                @endif
                            </a>
                            <h2 id="features-heading" class="text-center font-medium text-gray-500">Hosted
                                by {{$event->group->name}}</h2>
                            <p class="mt-4 text-4xl font-bold tracking-tight text-gray-900">{{$event->title}}</p>
                            <p class="mt-4 text-gray-500">{{$event->description}}</p>

                            {{--                            Need to check if $organizer is not null AND auth()->id() === $organizer->id because--}}
                            {{--                            We need to check if an object is not null before we can access properties or methods of that object --}}
                            @if($organizer && auth()->id() === $organizer->id)
                                <div class="mx-auto mt-6">
                                    <a href="{{ route('events.edit', ['event' => $event->id]) }}"
                                       class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white bg-gray-800 hover:bg-gray-700 uppercase tracking-widest transition ease-in-out duration-150">
                                        Edit Event
                                    </a>
                                </div>
                            @endif

                            <dl class="mt-10 grid grid-cols-1 gap-x-8 gap-y-10 text-sm sm:grid-cols-2">
                                <div>
                                    <dt class="font-medium text-gray-900">Location</dt>
                                    <dd class="mt-2 text-gray-500">{{$event->location}}
                                    </dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-gray-900">Date</dt>
                                    <dd class="mt-2 text-gray-500">{{ $event->event_date->format('l M d, Y') }}</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-gray-900">Time</dt>
                                    <dd class="mt-2 text-gray-500">Start
                                        Time {{ $event->start_time->format('h:i A') }}</dd>
                                    @if($event->end_time)
                                        <dd class="mt-2 text-gray-500">End
                                            Time {{ $event->end_time->format('h:i A') }}</dd>
                                    @endif
                                </div>
                                <div>
                                    <dt class="font-medium text-gray-900">Going</dt>
                                    <dd class="mt-2 text-gray-500">
                                        {{$participants}} / {{$event->max_participants}} people
                                    </dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-gray-900">Want to Join?</dt>
                                    <dd class="mt-2 text-gray-500">
                                        @guest

                                            <div class="mx-auto">
                                                <a href="/login"
                                                   class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white bg-gray-800 hover:bg-gray-700 uppercase tracking-widest transition ease-in-out duration-150">Join</a>
                                            </div>
                                        @endguest
                                        @auth
                                            <div x-data="{ isGoing: @entangle('isGoing') }">
                                                <button @click="isGoing = !isGoing; $wire.goingOrNot()"
                                                        :class="isGoing ? 'bg-red-500 hover:bg-red-700' : 'bg-gray-800 hover:bg-gray-700'"
                                                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150">
                                                    <span x-text="isGoing ? 'I changed my mind...' : 'Join!'"></span>
                                                </button>
                                            </div>
                                        @endauth
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </section>
                {{--                <section class="relative">--}}
                {{--                    <livewire:upload-photos/>--}}
                {{--                </section>--}}
            </div>
        </main>
    </div>
</div>
