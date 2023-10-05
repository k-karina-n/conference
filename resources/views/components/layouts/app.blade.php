<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Conference</title>

    <script src="https://cdn.tailwindcss.com"></script>

    @livewireStyles
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
</head>

<body>
    <nav class="bg-gray-800">
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
            <div class="ml-10 flex items-baseline space-x-4">
                <x-nav-item route="registration">Registration</x-nav-item>
                <x-nav-item route="list">List</x-nav-item>
            </div>
        </div>
    </nav>
    {{ $slot }}
    @livewireScriptConfig
</body>

</html>
