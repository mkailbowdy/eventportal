<div class="mx-auto max-w-7xl sm:px-6 lg:px-8 py-10 bg-white shadow-md rounded-md">
    <form wire:submit="save" class="space-y-12 sm:space-y-16">
        @csrf
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Looks like you're making the leap to be an organizer!</h2>
            <p class="mt-2 text-gray-600">Let's start with the details of your group.</p>

            <div class="mt-8 space-y-8 border-t border-gray-200 pt-8">
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
                    <label for="form.name" class="block text-sm font-medium text-gray-700 sm:pt-1.5">Give your group a
                        memorable name<span class="text-red-500 opacity-75">*</span></label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <div class="flex rounded-md shadow-sm focus-within:ring-2 focus-within:ring-indigo-500">
                            <input type="text" wire:model.blur="form.name"
                                   class="block w-full rounded-md border-gray-300 py-2 px-3 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"/>
                        </div>
                        <small class="block mt-1 text-gray-500">Char count: <span
                                x-text="$wire.get('form.name').length"></span> / 65</small>
                        @error('form.name')
                        <small class="text-red-500"><em>{{$message}}</em></small>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
                    <label for="form.description" class="block text-sm font-medium text-gray-700 sm:pt-1.5">Tell
                        everyone what your group is about<span class="text-red-500 opacity-75">*</span></label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <textarea wire:model.blur="form.description" rows="3"
                                  class="block w-full rounded-md border-gray-300 py-2 px-3 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 sm:text-sm"></textarea>
                        @error('form.description')
                        <small class="text-red-500"><em>{{$message}}</em></small>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
                    <label for="form.prefecture"
                           class="block text-sm font-medium text-gray-700 sm:pt-1.5">Prefecture<span
                            class="text-red-500 opacity-75">*</span></label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                        <select wire:model="form.prefecture"
                                class="block w-full rounded-md border-gray-300 py-2 px-3 text-gray-900 focus:ring-2 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Choose a prefecture</option>
                            @foreach(App\Enums\Prefecture::cases() as $prefecture)
                                <option value="{{$prefecture->value}}">{{$prefecture->label()}}</option>
                            @endforeach
                        </select>
                        @error('form.prefecture')
                        <small class="text-red-500"><em>{{$message}}</em></small>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
                    <label for="form.category_id"
                           class="block text-sm font-medium text-gray-700 sm:pt-1.5">Category<span
                            class="text-red-500 opacity-75">*</span></label>
                    <div class="mt-2 sm:col-span-2 sm:mt-0">
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
                        <small class="text-red-500"><em>{{$message}}</em></small>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-6 sm:py-6">
                    <label for="file_upload" class="block text-sm font-medium text-gray-900">Group Main Image</label>
                    <div class="sm:col-span-2">
                        <div class="flex items-center">
                            <label for="file_upload"
                                   class="cursor-pointer inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Choose an image
                            </label>
                            <input type="file" wire:model="file_upload" id="file_upload" name="file_upload"
                                   class="hidden">
                        </div>
                        @if ($file_upload)
                            <div class="relative mt-4">
                                <img src="{{ $file_upload->temporaryUrl() }}" alt="Temporary Event Photo"
                                     class="w-full max-h-64 object-contain rounded-md border border-gray-300 p-2 hover:shadow-lg transition-shadow duration-300 ease-in-out">
                                <x-button-cancel type="button"
                                                 class="absolute top-2 right-2 text-gray-500 bg-gray-100 hover:bg-red-200 rounded-full p-1"
                                                 wire:click="clearImage"/>
                            </div>
                        @endif
                        @error('file_upload')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-xl font-bold text-gray-800">Payment Section</h2>
        <p class="text-gray-600">Under construction...</p>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold text-gray-700 hover:text-gray-900">Cancel</button>
            <button type="submit"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-75">
                Save
                <div wire:loading.flex wire:target="store" class="ml-2 flex">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </button>
        </div>
    </form>
</div>
