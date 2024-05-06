<x-base-layout>
    <div class="bg-white">
        <div class="bg-white">
            <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Find events and friends near you!</h2>
                <p>Meet like-minded individuals and make new experiences in Japan.</p>
                <div class="mt-10 flex items-center gap-x-6">
                    <a href="/register" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Join Us</a>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 py-6 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Events in your area</h2>
            <livewire:event-show />
        </div>
    </div>
</x-base-layout>
