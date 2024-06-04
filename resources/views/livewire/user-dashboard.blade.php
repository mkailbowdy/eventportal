<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="py-3">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Your Events</h2>
        </div>
    </div>

    @if($events->isEmpty())
        <div class="pb-20">
            <div class="p-2 bg-gray-500 text-white rounded">Go join some events :) Events will show here when you mark
                'Going' on an event
            </div>
        </div>
    @endif

    <div class="pb-20">
        @foreach($events as $event)
            <div class="flex flex-row py-3">
                <div class="flex-shrink-0">
                    <a href="{{route('events.show', ['event' => $event->id])}}">
                        <img class="h-24 w-24 rounded-md object-cover"
                             src="{{asset('storage/' . $event->photo_path)}}"
                             alt="">
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
