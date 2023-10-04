@php
$class = "py-3 px-4 block w-full rounded-md border border-gray-200 rounded-md text-sm hover:border-blue-500 focus:outline-none focus:border-blue-500 focus:ring-blue-500 focus:ring-1"
@endphp

<div class="mt-2 space-y-2">
    <label for="{{ $data }}" class="flex text-sm text-gray-700 font-medium capitalize">{{ $label }}</label>
    @if($data == 'country')
    <select name="country" x-model="form.country" class="{{ $class }} bg-white">
        <option value="" selected disabled hidden>Choose here</option>
        <option>United Kingdom</option>
        <option>Germany</option>
        <option>Poland</option>
        <option>United States</option>
        <option>China</option>
        <option>Japan</option>
        <option>Ukraine</option>
    </select>
    @elseif($data == 'description')
    <textarea id="description" name="description" type="text" x-model="form.description" class="{{ $class }}" rows="3" placeholder="Description (up to 1000 characters)" maxlength="1000"></textarea>
    @else
    <input name="{{ $data }}" type="{{ $type ?? 'text' }}" x-model="form.{{ $data }}" class="{{ $class }}">
    @endif
</div>