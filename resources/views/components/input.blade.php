@props(['name' => null, 'label' => null, 'type' => null, 'tag' => null, 'admin' => false])

@php
    $class = 'py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:outline-none focus:border-blue-500 focus:ring-blue-500 focus:ring-1';
    $countries = ['United Kingdom', 'Germany', 'Poland', 'United States', 'China', 'Japan', 'Ukraine'];
@endphp

<div class="space-y-2">
    <label class="flex text-sm font-medium capitalize text-gray-700" for="{{ $name }}">{{ $label }}</label>

    @if ($tag)
        <{{ $tag }} class="{{ $class }}" name="{{ $name }}" wire:model="form.{{ $name }}"
            wire:change="updateSessionData('{{ $name }}')" {{ $attributes->merge() }}>
            @if ($tag == 'select')
                @foreach ($countries as $country)
                    <option>{{ $country }}</option>
                @endforeach
            @endif
        </{{ $tag }}>
    @else
        <input class="{{ $class }}" name="{{ $name }}" type="{{ $type ?? 'text' }}"
                wire:model.lazy="form.{{ $name }}" 
                @if(!$admin) wire:change="updateSessionData('{{ $name }}')" @endif
                {{ $attributes->merge() }}
        >
    @endif

    @error("form.$name")
        <p class="text-sm text-pink-600">{{ $message }}</p>
    @enderror
</div>
