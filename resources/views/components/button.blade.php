@props(['href' => null, 'message' => null, 'type' => null])

@php
    $buttonClass = 'w-full grid inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4';
@endphp

@if ($href)
    <a class="{{ $buttonClass }}" href="{{ $href }}{{ $message }}" target="_blank">
        {{ $slot }}
    </a>
@else
    <button class="{{ $buttonClass }}" type="{{ $type ?? 'button' }}" {{ $attributes->merge() }}>
        {{ $slot }}
    </button>
@endif
