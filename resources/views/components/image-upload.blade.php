{{--@props([--}}
{{--    /** @var mixed */--}}
{{--    'file_upload'--}}
{{--])--}}

{{--<div x-data="{ open: false }" {{ $attributes }}>--}}
{{--    <input type="file"--}}
{{--           @change="open = true"--}}
{{--           wire:model="file_upload"--}}
{{--           id="file_upload" name="file_upload">--}}
{{--    <div x-show="open" class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title"--}}
{{--         role="dialog"--}}
{{--         aria-modal="true">--}}
{{--        <div--}}
{{--            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">--}}
{{--            <div x-show="open" @click="open = false"--}}
{{--                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"--}}
{{--                 aria-hidden="true"></div>--}}

{{--            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>--}}

{{--            <div x-show="open"--}}
{{--                 class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">--}}
{{--                <div class="sm:col-span-2">--}}
{{--                    @if ($file_upload)--}}
{{--                        <div class="relative mt-4">--}}
{{--                            <img src="{{ $file_upload->temporaryUrl() }}"--}}
{{--                                 alt="Temporary Event Photo"--}}
{{--                                 class="w-full max-h-fit object-contain rounded-md border border-gray-300 p-2 hover:shadow-lg transition-shadow duration-300 ease-in-out">--}}
{{--                            <x-button-cancel class="absolute top-2 right-2"--}}
{{--                                             wire:click="clearImage()"/>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @error('file_upload')--}}
{{--                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="mt-5 sm:mt-6 flex justify-between">--}}
{{--                    <button @click="open = false"--}}
{{--                            class="inline-flex justify-center w-1/2 rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm mr-2"--}}
{{--                            wire:click="clearImage()">--}}
{{--                        Cancel--}}
{{--                    </button>--}}
{{--                    <button @click="open = false"--}}
{{--                            class="inline-flex justify-center w-1/2 rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">--}}
{{--                        Keep--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                @error('file_upload')--}}
{{--                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
