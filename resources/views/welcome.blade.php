<x-base-layout>
    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-12">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Find events and friends near
                you!</h2>
            <p>Meet like-minded individuals and make new experiences in Japan.</p>
            <div class="mt-10 flex items-center gap-x-6">
                <a href="/register"
                   class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Join
                    Us</a>
            </div>
        </div>
        <div>
            <livewire:event-index/>
        </div>
    </div>
</x-base-layout>
