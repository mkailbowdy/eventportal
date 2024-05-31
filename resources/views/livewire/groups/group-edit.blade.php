<div class="mx-auto max-w-7xl sm:px-6 lg:px-8 py-6">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Group') }}
        </h2>
    </x-slot>
    <form wire:submit="save" class="space-y-12">
        @csrf
        <div>
            <h2 class="text-base font-semibold leading-7 text-gray-900">Remember to give all the details of your
                Group!</h2>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">Please review our community guidelines</p>
        </div>

        <div class="space-y-8 border-b border-gray-200 pb-12">
            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                <label for="form.name" class="block text-sm font-medium text-gray-900">Group Name</label>
                <div class="sm:col-span-2">
                    <input type="text" name="form.name" id="form.name" autocomplete="form.name"
                           wire:model.blur="form.name"
                           placeholder="e.g. English and Japanese Cultural Exchange"
                           class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('form.name')
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
                <label for="category_id" class="block text-sm font-medium text-gray-900">Prefecture</label>
                <div class="sm:col-span-2">
                    <input type="text" name="form.prefecture" id="form.prefecture" autocomplete="form.prefecture"
                           wire:model.blur="form.prefecture"
                           class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('form.prefecture')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                <label for="form.category_id" class="block text-sm font-medium text-gray-900">Category</label>
                <div class="sm:col-span-2">
                    <select wire:model="form.category_id"
                            class="block w-full rounded-md border-gray-300 py-2 px-3 text-gray-900 focus:ring-2 focus:ring-indigo-500 sm:text-sm">
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

            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                <label for="file_upload" class="block text-sm font-medium text-gray-900">Group Main Image</label>
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

                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                  aria-hidden="true">&#8203;</span>

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
                                            type="button"
                                            class="inline-flex justify-center w-1/2 rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-500 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm mr-2"
                                            wire:click="clearImage()">
                                        Cancel
                                    </button>
                                    <button @click="open = false"
                                            type="button"
                                            class="inline-flex justify-center w-1/2 rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                                        Keep
                                    </button>
                                </div>
                                @error('file_upload')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @if ($file_upload)
                        <div class="relative mt-4">
                            <p>New:</p>
                            <img src="{{ $file_upload->temporaryUrl() }}"
                                 alt="Temporary Event Photo"
                                 class="w-full max-h-64 object-contain rounded-md border border-gray-300 p-2 hover:shadow-lg transition-shadow duration-300 ease-in-out">
                            <x-button-cancel class="absolute top-2 right-2"
                                             wire:click="clearImage()"/>
                        </div>
                    @endif
                    @if ($form->photo_path)
                        <div class="relative mt-4">
                            <p>Current:</p>
                            <img src="{{ asset('storage/' . $form->photo_path) }}"
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
            </div>
        </div>
        <div class="flex items-center justify-between gap-x-6 py-6">
            <div>
                <x-danger-button
                    type="button"
                    wire:click="delete({{ $form->group->id }})"
                    wire:confirm="Are you sure you want to delete this event?">
                    Delete
                </x-danger-button>
            </div>
            <div class="flex items-center gap-x-6">
                <a href="{{ route('groups.show', $this->form->group) }}"
                   class="text-sm font-semibold text-gray-900">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                    <svg class="animate-spin ml-2 h-5 w-5 text-white"
                         wire:loading
                         wire:target="save"
                         xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24">
                        <circle class="opacity-25"
                                cx="12"
                                cy="12"
                                r="10"
                                stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75"
                              fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>
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
            <span>Group updated successfully</span>
        </div>
    </div>
</div>
