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
<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
<form wire:submit="store">
    <div class="space-y-12 sm:space-y-16">
        <div>
            <h2 class="text-base font-semibold leading-7 text-gray-900">Create an Event</h2>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">Please review our community guidelines</p>

            <div class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Title</label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="title" id="title" autocomplete="title" wire:model.blur='title' placeholder="e.g. English and Japanese Cultural Exchange"
                                @class([
        'block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6',
        'border border-slate-300' => $errors->missing('title'),
        'border-2 border-red-500' => $errors->has('title'),
        ])>
                        </div>
                        @error('title')
                        <small class="text-red-500">
                            <em>
                                {{$message}}
                            </em>
                        </small>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Description</label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <textarea id="description" name="description" rows="3" wire:model.blur="description"
                                  @class([
        'block w-full max-w-2xl rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6',
        'border border-slate-300' => $errors->missing('title'),
        'border-2 border-red-500' => $errors->has('title'),
        ])></textarea>
                        @error('description')
                        <small class="text-red-500">
                            <em>
                                {{$message}}
                            </em>
                        </small>
                        @enderror
                        <p class="mt-3 text-sm leading-6 text-gray-600">Write about your event. Add as much detail as possible for your event goers.</p>
                    </div>

                </div>


                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="location" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Location</label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <input type="text" name="location" id="location" autocomplete="location"
                               wire:model.blur="location"
                               @class([
        'block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xl sm:text-sm sm:leading-6',
        'border border-slate-300' => $errors->missing('location'),
        'border-2 border-red-500' => $errors->has('location'),
        ])>
                        @error('location')
                        <small class="text-red-500">
                            <em>
                                {{$message}}
                            </em>
                        </small>
                        @enderror
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="max_participants" class=" text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Capacity</label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <input wire:model.blur="max_participants" type="number" name="max_participants" id="max_participants" autocomplete="max_participants" min="1"
                               @class([
        'block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xl sm:text-sm sm:leading-6',
        'border border-slate-300' => $errors->missing('location'),
        'border-2 border-red-500' => $errors->has('location'),
        ])
                               >
                        @error('max_participants')
                        <small class="text-red-500">
                            <em>
                                {{$message}}
                            </em>
                        </small>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="event_date" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Event Date</label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <input wire:model="event_date" type="date" id="event_date" name="event_date" min="{{ now()->toDateString() }}">
                        @error('event_date')
                        <small class="text-red-500">
                            <em>
                                {{$message}}
                            </em>
                        </small>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="start_time" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Start Time</label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <input wire:model="start_time" type="time" id="start_time" name="start_time">
                        @error('start_time')
                        <small class="text-red-500">
                            <em>
                                {{$message}}
                            </em>
                        </small>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="end_time" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">End Time</label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <input wire:model="end_time" type="time" id="end_time" name="end_time">
                        @error('end_time')
                        <small class="text-red-500">
                            <em>
                                {{$message}}
                            </em>
                        </small>
                        @enderror
                    </div>
                </div>


                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Event Images</label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <div class="flex max-w-2xl justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-end gap-x-6 py-10">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
</form>
    <!-- Success Indicator -->
    <div
        x-show="$wire.showSuccessIndicator"
        x-transition.out.opacity.duration.2000ms
        x-effect="if($wire.showSuccessIndicator) setTimeout(() => $wire.showSuccessIndicator = false, 3000)"
        class="flex justify-end pt-4">
        <div class="flex gap-2 items-center text-green-500 text-sm font-medium">
            Profile updated successfully

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
</div>
