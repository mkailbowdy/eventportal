<?php

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    public string $name = '';
    public string $email = '';
    public $file_upload;
    public $photo_path = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->photo_path = Auth::user()->photo_path;
    }

    public function clearImage()
    {
        $user = Auth::user();
        // Clear both the event's photo path and the form's photo path
        Auth::user()->photo_path = null;
        $this->photo_path = '';
        $this->file_upload = null;
    }

    public function cancelImage()
    {
        $this->file_upload = null;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)
            ],
        ]);

        $user->fill($validated);
        $user->photo_path = $this->photo_path;

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($this->file_upload) {
            $user->photo_path = $this->file_upload->store('photos', 'public');
        }

        $user->save();

        $this->file_upload = null;

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div>
            @if(auth()->user()->photo_path)
                <div class="relative inline-block">
                    <div>
                        <label for="file_upload" class="cursor-pointer">
                            <img class="rounded-full object-cover min-w-[128px] border border-gray2 h-32 w-32"
                                 src="{{ asset('storage/' . auth()->user()->photo_path) }}"
                                 alt="">
                        </label>
                        <input type="file"
                               wire:model="file_upload"
                               id="file_upload"
                               name="file_upload"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"/>
                        <button type="button"
                                class="absolute top-0 -right-8 text-white bg-gray-400 px-1 rounded"
                                wire:click="clearImage">x
                        </button>
                    </div>

                    @if ($file_upload)
                        <div class="relative inline-block mt-2 mb-2">
                            <div><strong>Your new profile image!</strong></div>
                            <img src="{{ $file_upload->temporaryUrl() }}"
                                 class="rounded-full object-cover min-w-[128px] border border-gray2 h-32 w-32">
                            <button type="button"
                                    class="absolute top-0 -right-8 text-gray-600 px-1 rounded"
                                    wire:click="cancelImage">X
                            </button>
                        </div>

                    @endif
                </div>
            @else
                <div class="relative inline-block">
                    @if ($file_upload)
                        <img src="{{ $file_upload->temporaryUrl() }}"
                             class="rounded-full object-cover min-w-[128px] border border-gray2 h-32 w-32">
                        <button type="button"
                                class="absolute top-0 -right-8 text-white bg-gray-400 px-1 rounded"
                                wire:click="clearImage">x
                        </button>

                    @else
                        <label for="file_upload" class="cursor-pointer">
                            <img class="rounded-full object-cover min-w-[128px] border border-gray2 h-32 w-32"
                                 src="{{ asset('storage/' . 'photos/placeholder_group_avatar.png') }}"
                                 alt="">
                        </label>
                        <input type="file"
                               wire:model="file_upload"
                               id="file_upload"
                               name="file_upload"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"/>
                    @endif
                </div>
            @endif
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required
                          autofocus autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required
                          autocomplete="username"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')"/>

            @if (auth()->user() instanceof MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
