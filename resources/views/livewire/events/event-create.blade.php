@props(['file_upload'])

<div class="mx-auto max-w-7xl sm:px-6 lg:px-8 py-6">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Event') }}
        </h2>
    </x-slot>
    <form id="create" wire:submit.prevent="save" class="space-y-12">
        @csrf
        <div>
            <h2 class="text-base font-semibold leading-7 text-gray-900">Remember to give all the details of your
                event!</h2>
            <p class="mt-1 max-w-2xl text-sm text-gray-600">Please review our community guidelines</p>
        </div>

        <div class="space-y-8 divide-y divide-gray-200">
            <div class="sm:space-y-6">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:py-6">
                    <label for="form.title" class="block text-sm font-medium text-gray-900 sm:pt-2">Title</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="relative rounded-md shadow-sm">
                            <input type="text" name="form.title" id="form.title" autocomplete="form.title"
                                   wire:model.blur="form.title"
                                   placeholder="e.g. English and Japanese Cultural Exchange"
                                   class="block w-full pr-10 border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @if ($errors->has('form.title'))
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M18 8a8 8 0 11-16 0 8 8 0 0116 0zm-8 4a1 1 0 100-2 1 1 0 000 2zm-1-4a1 1 0 112-0 1 1 0 01-2 0z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <small class="block mt-1 text-sm text-gray-600">Max chars: <span
                                x-text="$wire.get('form.title').length"></span> / 100</small>
                        @error('form.title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:py-6">
                    <label for="form.description"
                           class="block text-sm font-medium text-gray-900 sm:pt-2">Description</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
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

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:py-6">
                    <label for="form.category_id" class="block text-sm font-medium text-gray-900 sm:pt-2">Category <span
                            class="text-red-500">*</span></label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <select wire:model="form.category_id"
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Choose a category</option>
                            <option value="1">Language Exchange</option>
                            <option value="2">Outdoor</option>
                            <option value="3">Social</option>
                            <option value="4">Sports</option>
                            <option value="5">Exercise</option>
                        </select>
                        @error('form.category_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:py-6">
                    <label for="form.location" class="block text-sm font-medium text-gray-900 sm:pt-2">Location</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" name="form.location" id="form.location" autocomplete="form.location"
                               wire:model.blur="form.location"
                               class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('form.location')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:py-6">
                    <label for="form.max_participants"
                           class="block text-sm font-medium text-gray-900 sm:pt-2">Capacity</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="form.max_participants" type="number" name="form.max_participants"
                               id="form.max_participants" autocomplete="form.max_participants" min="1"
                               class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('form.max_participants')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:py-6">
                    <label for="form.event_date" class="block text-sm font-medium text-gray-900 sm:pt-2">Event
                        Date</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="form.event_date" type="date" id="form.event_date" name="form.event_date"
                               min="{{ now()->toDateString() }}"
                               class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('form.event_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:py-6">
                    <label for="form.start_time" class="block text-sm font-medium text-gray-900 sm:pt-2">Start
                        Time</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="form.start_time" type="time" id="form.start_time" name="form.start_time"
                               class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('form.start_time')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:py-6">
                    <label for="form.end_time" class="block text-sm font-medium text-gray-900 sm:pt-2">End Time</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input wire:model="form.end_time" type="time" id="form.end_time" name="form.end_time"
                               class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('form.end_time')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                    <label for="file_upload" class="block text-sm font-medium text-gray-900">Event Main Image</label>

                    <div x-data="{ open: false }">
                        <input type="file"
                               @change="open = true"
                               wire:model="file_upload"
                               id="file_upload" name="file_upload">
                        <div x-show="open" class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title"
                             role="dialog"
                             aria-modal="true">
                            <div
                                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div x-show="open" @click="open = false"
                                     class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                     aria-hidden="true"></div>

                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                <div x-show="open"
                                     class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                    <div class="sm:col-span-2">
                                        @if ($file_upload)
                                            <div class="relative mt-4">
                                                <img src="{{ $file_upload->temporaryUrl() }}"
                                                     alt="Temporary Event Photo"
                                                     class="w-full max-h-fit object-contain rounded-md border border-gray-300 p-2 hover:shadow-lg transition-shadow duration-300 ease-in-out">
                                                <x-button-cancel class="absolute top-2 right-2"
                                                                 wire:click="clearImage()"/>
                                            </div>
                                        @endif
                                        @error('file_upload')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-5 sm:mt-6 flex justify-between">
                                        <button @click="open = false"
                                                class="inline-flex justify-center w-1/2 rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm mr-2"
                                                wire:click="clearImage()">
                                            Cancel
                                        </button>
                                        <button @click="open = false"
                                                class="inline-flex justify-center w-1/2 rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                                            Keep
                                        </button>
                                    </div>
                                    @error('file_upload')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @if ($file_upload)
                    <div class="relative mt-4">
                        <img src="{{ $file_upload->temporaryUrl() }}"
                             alt="Temporary Event Photo"
                             class="w-full max-h-64 object-contain rounded-md border border-gray-300 p-2 hover:shadow-lg transition-shadow duration-300 ease-in-out">
                        <x-button-cancel class="absolute top-2 right-2"
                                         wire:click="clearImage()"/>
                    </div>
                @endif
                @error('file_upload')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-x-6 py-6">
                <a href="{{ route('events.index') }}" class="text-sm font-semibold text-gray-900">Cancel</a>
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                    <svg class="animate-spin ml-2 h-5 w-5 text-white" wire:loading wire:target="save"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </form>
</div>

