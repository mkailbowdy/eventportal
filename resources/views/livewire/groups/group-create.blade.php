<div class="mx-auto max-w-7xl sm:px-6 lg:px-8 py-10">
    <form wire:submit="save">
        @csrf
        <div class="space-y-12 sm:space-y-16">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Looks like you're making the leap to be an
                    organizer!</h2>
                <p class="text-gray-500">Let's start with the details of your group.</p>

                <div
                    class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="form.name" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Give
                            your
                            group a memorable name<span class="text-red-500 opacity-75"
                                                        aria-hidden="true">*</span></label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text"
                                       wire:model.blur="form.name"
                                    @class([
 'block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6',
 'border border-slate-300' => $errors->missing('form.name'),
 'border-2 border-red-500' => $errors->has('form.name'),
 ])
                                >
                            </div>
                            <small>Char count: <span x-text="$wire.get('form.name').length"></span> / 65</small>
                            @error('form.name')
                            <small class="text-red-500">
                                <em>
                                    {{$message}}
                                </em>
                            </small>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                        <label for="form.description"
                               class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Tell
                            everyone what your group is about<span class="text-red-500 opacity-75"
                                                                   aria-hidden="true">*</span></label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <textarea wire:model.blur="form.description" rows="3"
                                      @class([
    'block w-full max-w-2xl rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6',
    'border border-slate-300' => $errors->missing('form.description'),
    'border-2 border-red-500' => $errors->has('form.description'),
])
                                      ></textarea>
                            @error('form.description')
                            <small class="text-red-500">
                                <em>
                                    {{$message}}
                                </em>
                            </small>
                            @enderror
                        </div>
                    </div>
                    <div
                        class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="form.prefecture"
                                   class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Prefecture<span
                                    class="text-red-500 opacity-75" aria-hidden="true">*</span></label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <select wire:model="form.prefecture"
                                >
                                    <option value="" @class([
    'border border-slate-300' => $errors->missing('form.prefecture'),
    'border-2 border-red-500' => $errors->has('form.prefecture'),
    ])
                                    >Choose a prefecture
                                    </option>
                                    @foreach(App\Enums\Prefecture::cases() as $prefecture)
                                        <option value="{{$prefecture->value}}">{{$prefecture->label()}}</option>
                                    @endforeach
                                </select>
                                @error('form.prefecture')
                                <small class="text-red-500">
                                    <em>
                                        {{$message}}
                                    </em>
                                </small>
                                @enderror
                            </div>
                        </div>


                        {{--                        CATEGORY--}}

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="form.category_id"
                                   class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Category<span
                                    class="text-red-500 opacity-75" aria-hidden="true">*</span></label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <select wire:model="form.category_id"
                                >
                                    <option value="" @class([
    'border border-slate-300' => $errors->missing('form.category_id'),
    'border-2 border-red-500' => $errors->has('form.category_id'),
    ])
                                    >Choose a category
                                    </option>
                                    <option value="1">Language Exchange</option>
                                    <option value="2">Outdoor</option>
                                    <option value="3">Social</option>
                                    <option value="4">Sports</option>
                                    <option value="5">Exercise</option>
                                </select>
                                @error('form.category_id')
                                <small class="text-red-500">
                                    <em>
                                        {{$message}}
                                    </em>
                                </small>
                                @enderror
                            </div>
                        </div>


                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="file_upload"
                                   class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Cover
                                photo</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <div
                                    class="flex max-w-2xl justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                             fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                            <label for="file_upload"
                                                   class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                @if ($file_upload)
                                                    <img src="{{ $file_upload->temporaryUrl() }}">
                                                    <x-primary-button type="button"
                                                                      class="absolute top-0 right-0 text-red-500 bg-red-500"
                                                                      wire:click="clearImage">X
                                                    </x-primary-button>
                                                @endif
                                                <input wire:model="file_upload" id="file_upload" name="file_upload"
                                                       type="file"
                                                       class="sr-only">
                                                @error('file_upload') <span
                                                    class="error">{{ $message }}</span> @enderror
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 20MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Payment Section</h2>
                    <p class="text-gray-500">under construction...</p>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit"
                        class="inline-flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:cursor-not-allowed disabled:opacity-75">
                    Save
                    <div wire:loading.flex wire:target="store" class="flex">
                        <svg class="animate-spin mx-1 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
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
