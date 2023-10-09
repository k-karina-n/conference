@props(['data' => null, 'label' => null, 'type' => null])

@php
    $class = 'py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:outline-none focus:border-blue-500 focus:ring-blue-500 focus:ring-1';
    $countries = ['United Kingdom', 'Germany', 'Poland', 'United States', 'China', 'Japan', 'Ukraine'];
@endphp

<div class="space-y-2">
    <label class="flex text-sm font-medium capitalize text-gray-700" for="{{ $data }}">{{ $label }}</label>

    @if ($data == 'country')
        <select class="{{ $class }} bg-white" name="country" wire:model="form.country">
            @foreach ($countries as $country)
                <option>{{ $country }}</option>
            @endforeach
        </select>
    @elseif($data == 'description')
        <textarea class="{{ $class }}" name="description" type="text" wire:model="form.description" rows="3"
            placeholder="Description (up to 1000 characters)" maxlength="1000">
        </textarea>
    @else
        <input class="{{ $class }}" name="{{ $data }}" type="{{ $type ?? 'text' }}"
            wire:model.lazy="form.{{ $data }}" {{ $attributes->merge() }}>
    @endif

    @error("form.$data")
        <p class="text-sm text-pink-600">{{ $message }}</p>
    @enderror
</div>
