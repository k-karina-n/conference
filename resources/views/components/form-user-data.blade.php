<div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:gap-6" wire:init="getCookie">
    <x-input label="first name" name="first_name" />
    <x-input label="last name" name="last_name" />
    <x-input label="phone" name="phone" type="phone" x-mask="+99 (999) 999-9999" />
    <x-input label="email" name="email" type="email" />
</div>
<x-input label="country" name="country" tag="select" />
