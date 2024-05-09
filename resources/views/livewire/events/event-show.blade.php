<div class="min-h-full">
    <div class="py-10">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$event->title}}
            </h2>
            Hosted by:
            @php
                $organizer = $event->group->users()->wherePivot('role', 'organizer')->first();
            @endphp

            @if($organizer)
                {{ $organizer->name }}
            @else
                {{ 'Dummy Name' }}
            @endif

        </x-slot>
        <main>
            @guest
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <a href="/login"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'">Join</a>
                </div>
            @endguest
            @auth
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <x-primary-button type="button" wire:click="goingOrNot">
                        @if($isGoing)
                            Not Going
                        @else
                            Join
                        @endif
                    </x-primary-button>
                </div>
            @endauth
        </main>
    </div>
</div>
