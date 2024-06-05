<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} " class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>


<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
<div class="min-h-full">
    <x-header/>
    <main>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{$slot}}
        </div>
    </main>
</div>
<x-layouts.footer/>
</body>
</html>

