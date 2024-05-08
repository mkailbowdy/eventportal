<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
<div class="min-h-full">
    <div class="py-10">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$event->title}}
            </h2>
            Hosted by:
            @php
                $organizer = $event->group->users()->wherePivot('role', 'organizer')->first();
            @endphp

            @if($organizer)
                {{ $organizer->name }}
            @else
                {{ 'Dummy Name' }}
            @endif

        </x-slot>
        <main>
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Your content -->
            </div>
        </main>
    </div>
</div>
