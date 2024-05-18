{{--<div class="mx-auto max-w-7xl sm:px-6 lg:px-8 py-6">--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Edit Event') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}
{{--    <form wire:submit="save">--}}
{{--        @csrf--}}
{{--        <div class="space-y-12 sm:space-y-16">--}}
{{--            <div>--}}
{{--                <h2 class="text-base font-semibold leading-7 text-gray-900">Remember to give all the details of your--}}
{{--                    event!</h2>--}}
{{--                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">Please review our community guidelines</p>--}}

{{--                <x-primary-button type="button" wire:click="delete({{$form->event->id}})"--}}
{{--                                  wire:confirm="Are you sure you want to delete this event?">Delete--}}
{{--                </x-primary-button>--}}

{{--                <div--}}
{{--                    class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">--}}
{{--                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">--}}
{{--                        <label for="form.title" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Title</label>--}}
{{--                        <div class="mt-2 sm:col-span-2 sm:mt-0">--}}
{{--                            <div--}}
{{--                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">--}}
{{--                                <input type="text" name="form.title" id="form.title" autocomplete="form.title"--}}
{{--                                       wire:model.blur='form.title'--}}
{{--                                       placeholder="e.g. English and Japanese Cultural Exchange"--}}
{{--                                    @class([--}}
{{--            'block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6',--}}
{{--            'border border-slate-300' => $errors->missing('form.title'),--}}
{{--            'border-2 border-red-500' => $errors->has('form.title'),--}}
{{--            ])>--}}
{{--                            </div>--}}
{{--                            @error('form.title')--}}
{{--                            <small class="text-red-500">--}}
{{--                                <em>--}}
{{--                                    {{$message}}--}}
{{--                                </em>--}}
{{--                            </small>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">--}}
{{--                        <label for="form.description"--}}
{{--                               class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Description</label>--}}
{{--                        <div class="mt-2 sm:col-span-2 sm:mt-0">--}}
{{--                        <textarea id="form.description" name="form.description" rows="3"--}}
{{--                                  wire:model.blur="form.description"--}}
{{--                                  @class([--}}
{{--        'block w-full max-w-2xl rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6',--}}
{{--        'border border-slate-300' => $errors->missing('form.description'),--}}
{{--        'border-2 border-red-500' => $errors->has('form.description'),--}}
{{--        ])></textarea>--}}
{{--                            @error('form.description')--}}
{{--                            <small class="text-red-500">--}}
{{--                                <em>--}}
{{--                                    {{$message}}--}}
{{--                                </em>--}}
{{--                            </small>--}}
{{--                            @enderror--}}
{{--                            <p class="mt-3 text-sm leading-6 text-gray-600">Write about your event. Add as much detail--}}
{{--                                as possible for your event goers.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">--}}
{{--                        <label for="form.form.location"--}}
{{--                               class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Location</label>--}}
{{--                        <div class="mt-2 sm:col-span-2 sm:mt-0">--}}
{{--                            <input type="text" name="form.location" id="form.location" autocomplete="form.location"--}}
{{--                                   wire:model.blur="form.location"--}}
{{--                                @class([--}}
{{--         'block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xl sm:text-sm sm:leading-6',--}}
{{--         'border border-slate-300' => $errors->missing('form.location'),--}}
{{--         'border-2 border-red-500' => $errors->has('form.location'),--}}
{{--         ])>--}}
{{--                            @error('form.location')--}}
{{--                            <small class="text-red-500">--}}
{{--                                <em>--}}
{{--                                    {{$message}}--}}
{{--                                </em>--}}
{{--                            </small>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">--}}
{{--                        <label for="form.max_participants"--}}
{{--                               class=" text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Capacity</label>--}}
{{--                        <div class="mt-2 sm:col-span-2 sm:mt-0">--}}
{{--                            <input wire:model="form.max_participants" type="number" name="form.max_participants"--}}
{{--                                   id="form.max_participants" autocomplete="form.max_participants" min="1"--}}
{{--                                @class([--}}
{{--         'block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xl sm:text-sm sm:leading-6',--}}
{{--         'border border-slate-300' => $errors->missing('form.max_participants'),--}}
{{--         'border-2 border-red-500' => $errors->has('form.max_participants'),--}}
{{--         ])--}}
{{--                            >--}}
{{--                            @error('form.max_participants')--}}
{{--                            <small class="text-red-500">--}}
{{--                                <em>--}}
{{--                                    {{$message}}--}}
{{--                                </em>--}}
{{--                            </small>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">--}}
{{--                        <label for="form.event_date"--}}
{{--                               class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Event Date</label>--}}
{{--                        <div class="mt-2 sm:col-span-2 sm:mt-0">--}}
{{--                            <input wire:model="form.event_date"--}}
{{--                                   type="date" id="form.event_date" name="form.event_date"--}}
{{--                                   min="{{ now()->toDateString() }}">--}}
{{--                            @error('form.event_date')--}}
{{--                            <small class="text-red-500">--}}
{{--                                <em>--}}
{{--                                    {{$message}}--}}
{{--                                </em>--}}
{{--                            </small>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">--}}
{{--                        <label for="form.start_time"--}}
{{--                               class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Start Time</label>--}}
{{--                        <div class="mt-2 sm:col-span-2 sm:mt-0">--}}
{{--                            <input wire:model="form.start_time" type="time" id="form.start_time" name="form.start_time">--}}
{{--                            @error('form.start_time')--}}
{{--                            <small class="text-red-500">--}}
{{--                                <em>--}}
{{--                                    {{$message}}--}}
{{--                                </em>--}}
{{--                            </small>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">--}}
{{--                        <label for="form.end_time" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">End--}}
{{--                            Time</label>--}}
{{--                        <div class="mt-2 sm:col-span-2 sm:mt-0">--}}
{{--                            <input wire:model="form.end_time" type="time" id="form.end_time" name="form.end_time">--}}
{{--                            @error('form.end_time')--}}
{{--                            <small class="text-red-500">--}}
{{--                                <em>--}}
{{--                                    {{$message}}--}}
{{--                                </em>--}}
{{--                            </small>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="space-y-4">--}}
{{--                        <label for="file_upload" class="block text-sm font-medium text-gray-900">--}}
{{--                            Event Main Image--}}
{{--                        </label>--}}
{{--                        <input type="file" wire:model="file_upload" id="file_upload" name="file_upload"--}}
{{--                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2">--}}
{{--                        @if($form->event->photo_path)--}}
{{--                            <div class="relative mt-4">--}}
{{--                                <img src="{{ asset('storage/' . $form->event->photo_path) }}" alt="Event Photo"--}}
{{--                                     class="w-full max-h-64 object-contain rounded-md border border-gray-300 p-2 hover:shadow-lg transition-shadow duration-300 ease-in-out">--}}
{{--                                <x-button-cancel class="absolute top-2 right-2" wire:click="clearImage"/>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        @if ($file_upload)--}}
{{--                            <div class="relative mt-4">--}}
{{--                                <img src="{{ $file_upload->temporaryUrl() }}" alt="Temporary Event Photo"--}}
{{--                                     class="w-full max-h-64 object-contain rounded-md border border-gray-300 p-2 hover:shadow-lg transition-shadow duration-300 ease-in-out">--}}
{{--                                <x-button-cancel class="absolute top-2 right-2" wire:click="cancelImage()"/>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        @error('file_upload')--}}
{{--                        <span class="text-red-600 text-sm">{{ $message }}</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="flex items-center justify-end gap-x-6 py-10">--}}
{{--            <a href="{{route('events.show', $this->form->event)}}"--}}
{{--               class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>--}}
{{--            <button type="submit"--}}
{{--                    class="inline-flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:cursor-not-allowed disabled:opacity-75">--}}
{{--                Save--}}
{{--                <div wire:loading.flex wire:target="save" class="flex">--}}
{{--                    <svg class="animate-spin mx-1 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"--}}
{{--                         viewBox="0 0 24 24">--}}
{{--                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"--}}
{{--                                stroke-width="4"></circle>--}}
{{--                        <path class="opacity-75" fill="currentColor"--}}
{{--                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--            </button>--}}
{{--        </div>--}}

{{--    </form>--}}
{{--    <!-- Success Indicator -->--}}
{{--    <div--}}
{{--        x-show="$wire.showSuccessIndicator"--}}
{{--        x-transition.out.opacity.duration.2000ms--}}
{{--        x-effect="if($wire.showSuccessIndicator) setTimeout(() => $wire.showSuccessIndicator = false, 3000)"--}}
{{--        class="flex justify-end pt-4">--}}
{{--        <div class="flex gap-2 items-center text-green-500 text-sm font-medium">--}}
{{--            Profile updated successfully--}}

{{--            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
{{--                 stroke="currentColor" class="w-6 h-6">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>--}}
{{--            </svg>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="mx-auto max-w-7xl sm:px-6 lg:px-8 py-6">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>
    <form wire:submit.prevent="save" class="space-y-12">
        @csrf
        <div>
            <h2 class="text-base font-semibold leading-7 text-gray-900">Remember to give all the details of your
                event!</h2>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">Please review our community guidelines</p>

            <x-primary-button type="button" wire:click="delete({{$form->event->id}})"
                              wire:confirm="Are you sure you want to delete this event?" class="mt-4">
                Delete
            </x-primary-button>
        </div>

        <div class="space-y-8 border-b border-gray-200 pb-12">
            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                <label for="form.title" class="block text-sm font-medium text-gray-900">Title</label>
                <div class="sm:col-span-2">
                    <input type="text" name="form.title" id="form.title" autocomplete="form.title"
                           wire:model.blur="form.title"
                           placeholder="e.g. English and Japanese Cultural Exchange"
                           class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('form.title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                <label for="form.description" class="block text-sm font-medium text-gray-900">Description</label>
                <div class="sm:col-span-2">
                    <textarea id="form.description" name="form.description" rows="3"
                              wire:model.blur="form.description"
                              class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                    @error('form.description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-sm text-gray-600">Write about your event. Add as much detail as possible for
                        your event goers.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                <label for="form.location" class="block text-sm font-medium text-gray-900">Location</label>
                <div class="sm:col-span-2">
                    <input type="text" name="form.location" id="form.location" autocomplete="form.location"
                           wire:model.blur="form.location"
                           class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('form.location')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                <label for="form.max_participants" class="block text-sm font-medium text-gray-900">Capacity</label>
                <div class="sm:col-span-2">
                    <input type="number" name="form.max_participants" id="form.max_participants" min="1"
                           wire:model="form.max_participants"
                           class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('form.max_participants')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                <label for="form.event_date" class="block text-sm font-medium text-gray-900">Event Date</label>
                <div class="sm:col-span-2">
                    <input type="date" name="form.event_date" id="form.event_date" min="{{ now()->toDateString() }}"
                           wire:model="form.event_date"
                           class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('form.event_date')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                <label for="form.start_time" class="block text-sm font-medium text-gray-900">Start Time</label>
                <div class="sm:col-span-2">
                    <input type="time" name="form.start_time" id="form.start_time"
                           wire:model="form.start_time"
                           class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('form.start_time')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                <label for="form.end_time" class="block text-sm font-medium text-gray-900">End Time</label>
                <div class="sm:col-span-2">
                    <input type="time" name="form.end_time" id="form.end_time"
                           wire:model="form.end_time"
                           class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('form.end_time')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                <label for="file_upload" class="block text-sm font-medium text-gray-900">Event Main Image</label>
                <div class="sm:col-span-2">
                    <div class="flex items-center">
                        <label for="file_upload"
                               class="cursor-pointer inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Choose an image
                        </label>
                        <input type="file" wire:model="file_upload" id="file_upload" name="file_upload" class="hidden">
                    </div>
                    @if($form->event->photo_path)
                        <div class="relative mt-4">
                            <img src="{{ asset('storage/' . $form->event->photo_path) }}" alt="Event Photo"
                                 class="w-full max-h-64 object-contain rounded-md border border-gray-300 p-2 hover:shadow-lg transition-shadow duration-300 ease-in-out">
                            <x-button-cancel class="absolute top-2 right-2" wire:click="clearImage"/>
                        </div>
                    @endif
                    @if ($file_upload)
                        <div class="relative mt-4">
                            <p><strong>Hit the save if you like your new pic!</strong></p>
                            <div class="relative mt-4">
                                <img src="{{ $file_upload->temporaryUrl() }}" alt="Event Photo"
                                     class="w-full max-h-64 object-contain rounded-md border border-gray-300 p-2 hover:shadow-lg transition-shadow duration-300 ease-in-out">
                                <x-button-cancel class="absolute top-2 right-2" wire:click="cancelImage()"/>
                            </div>
                        </div>
                    @endif
                    @error('file_upload')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>


        </div>

        <div class="flex items-center justify-end gap-x-6 py-6">
            <a href="{{ route('events.show', $this->form->event) }}"
               class="text-sm font-semibold text-gray-900">Cancel</a>
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
                <svg class="animate-spin ml-2 h-5 w-5 text-white" wire:loading wire:target="save"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </div>
    </form>

    <!-- Success Indicator -->
    <div x-show="$wire.showSuccessIndicator" x-transition:leave="transition ease-in duration-1000"
         class="fixed bottom-0 right-0 p-4 mb-4 mr-4 bg-green-100 border border-green-400 text-green-700 rounded-md shadow-md"
         x-init="setTimeout(() => $wire.set('showSuccessIndicator', false), 3000)">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M5 13l4 4L19 7"/>
            </svg>
            <span>Profile updated successfully</span>
        </div>
    </div>
</div>
