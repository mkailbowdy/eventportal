<div class="mx-auto max-w-7xl px-3 sm:px-6 lg:px-8 py-5">
    <div class="sm:flex sm:items-center">
        <div class="py-3">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Groups in
                <span class="text-indigo-500">{{$searchPrefecture}}</span>
            </h2>
        </div>
    </div>
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

    <div class="py-4">
        <div class="space-y-4 sm:space-y-0 sm:space-x-4 sm:flex sm:items-center">
            <input wire:model.live="searchQuery" type="search" placeholder="Search by Name"/>
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

    <div>
        <ul role="list" class="grid grid-cols-2 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach($groups as $group)
                <li wire:key="{{$group->id}}"
                    class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center">
                    <div class="flex flex-1 flex-col p-8">
                        <a href="/groups/{{$group->id}}">
                            @if ($group->photo_path)
                                <img src="{{ asset('storage/' . $group->photo_path) }}" alt="group Photo"
                                     class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            @else
                                <img src="{{ asset('storage/' . 'photos/placeholder_image.png' ) }}"
                                     alt="Group Photo"
                                     class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            @endif
                        </a>
                        <h3 class="mt-2 font-medium text-gray-900">{{$group->name}}</h3>
                        <p>
                            @if ($group->users())
                                {{$group->users()->count()}} Members
                            @else
                                0
                            @endif
                        </p>
                        {{--                        <dl class="mt-2 flex flex-grow flex-col justify-between">--}}
                        {{--                            <dt class="sr-only">Description</dt>--}}
                        {{--                            <dd class="text-sm text-gray-500 line-clamp-3">{{ $group->description }}</dd>--}}
                        {{--                        </dl>--}}
                    </div>
                </li>
            @endforeach
        </ul>
        {{$groups->links()}}
    </div>

</div>
