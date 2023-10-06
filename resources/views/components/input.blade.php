@props(['data' => null, 'label' => null, 'type' => null, 'model' => 'firstStep' ])

@php
$class = "py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:outline-none focus:border-blue-500 focus:ring-blue-500 focus:ring-1"
@endphp

<div class="mt-2 space-y-2">
    <label for="{{ $data }}" class="flex text-sm text-gray-700 font-medium capitalize">{{ $label }}</label>
    @if($data == 'country')
    <select name="country" wire:model="firstStep.country" class="{{ $class }} bg-white">
        <option>United Kingdom</option>
        <option>Germany</option>
        <option>Poland</option>
        <option>United States</option>
        <option>China</option>
        <option>Japan</option>
        <option>Ukraine</option>
    </select>
    @elseif($data == 'description')
    <textarea name="description" type="text" wire:model="secondStep.description" class="{{ $class }}" rows="3" placeholder="Description (up to 1000 characters)" maxlength="1000"></textarea>
    @else
    <input name="{{ $data }}" type="{{ $type ?? 'text' }}" wire:model="{{ $model }}.{{ $data }}" class="{{ $class }}" {{ $attributes->merge() }}>
    @endif

    @error("$model.$data")<p class="text-pink-600 text-sm">{{ $message }}</p>@enderror
</div>