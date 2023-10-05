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
    <x-header />
    {{ $slot }}
    @livewireScriptConfig
</body>

</html>