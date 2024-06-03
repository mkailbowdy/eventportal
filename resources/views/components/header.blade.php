<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="bg-gray-800" x-data="{ mobileMenuOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <div class="flex flex-shrink-0 items-center">
                    <a href="/"><img class="h-8 w-auto"
                                     src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                                     alt="Your Company">
                    </a>
                </div>
                <div class="ml-6 flex items-center space-x-4">
                    <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')"
                                wire:navigate>
                        {{ __('Events') }}
                    </x-nav-link>
                    <x-nav-link :href="route('groups.index')" :active="request()->routeIs('groups.index')"
                                wire:navigate>
                        {{ __('Groups') }}
                    </x-nav-link>

                    @role('member')
                    <x-nav-link :href="route('groups.create')" :active="request()->routeIs('groups.create')"
                                wire:navigate>
                        {{ __('Create a Group') }}
                    </x-nav-link>
                    @endrole
                </div>
            </div>
            <div class="flex items-center space-x-1.5">
                <div class="flex-shrink-0">
                    <a wire:navigate
                       href="{{route('login')}}"
                       class="relative inline-flex items-center gap-x-1.5 rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Login
                    </a>
                </div>
                <div class="flex-shrink-0">
                    <a wire:navigate
                       href="{{route('register')}}"
                       class="relative inline-flex items-center gap-x-1.5 rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
