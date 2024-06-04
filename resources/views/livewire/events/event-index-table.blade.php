<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="py-3">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Events in
                <span class="text-indigo-500">{{$searchPrefecture}}</span>
            </h2>
        </div>
    </div>
    <div class="py-4">
        <div class="space-y-4 sm:space-y-0 sm:space-x-4 sm:flex sm:items-center">
            <select wire:model.live="searchPrefecture" name="prefecture"
                    class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="Japan">Choose a prefecture</option>
                @foreach(App\Enums\Prefecture::cases() as $prefecture)
                    <option value="{{$prefecture->value}}">{{$prefecture->label()}}</option>
                @endforeach
            </select>
            <select wire:model.live="searchCategory" name="category"
                    class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="0">Choose a category</option>
                @foreach($categories as $id => $category)
                    <option value="{{$id}}">{{$category}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mt-6 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <tbody class="divide-y divide-gray-200 bg-white">
                        @if($events->isEmpty())
                            <tr>
                                <td colspan="3" class="whitespace-nowrap py-4 px-4 text-center text-sm text-red-500">No
                                    events scheduled in this prefecture yet :(
                                </td>
                            </tr>
                        @endif
                        @foreach($events as $event)
                            <tr class="flex flex-col sm:table-row">
                                <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                    <a href="{{ route('events.show', ['event' => $event->id]) }}"
                                       class="flex flex-col sm:flex-row">
                                        <div class="flex-shrink-0">
                                            <img class="h-48 w-full sm:w-72 rounded-md object-cover"
                                                 src="{{asset('storage/' . $event->photo_path)}}" alt="">
                                        </div>
                                        <div class="mt-2 sm:mt-0 sm:ml-4">
                                            <div class="font-medium text-gray-900">{{$event->title}}</div>
                                            <div class="mt-1 text-gray-500">{{$event->group->name}}</div>
                                            <div class="mt-1 text-gray-500">
                                                <p class="line-clamp-3 text-wrap">
                                                    {{$event->description}}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                    <div class="text-gray-900">{{$event->event_date->format('D, M jS')}}</div>
                                    <div class="mt-1 text-gray-500">{{$event->start_time->format('g:i A')}}
                                        to {{$event->end_time->format('g:i A')}}</div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                    <div class="text-gray-900">Going</div>
                                    <div
                                        class="mt-1 text-gray-500">{{$event->users()->wherePivot('participation_status', 1)->count()}}
                                        / {{$event->max_participants}}</div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
