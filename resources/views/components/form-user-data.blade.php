<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:gap-6">
    <x-input label="first name" data="first_name" />
    <x-input label="last name" data="last_name" />
    <x-input label="phone" data="phone" type="phone" x-mask="+99 (999) 999-9999" />
    <x-input label="email" data="email" type="email" />
    <x-input label="country" data="country" tag="select" />
    <x-input label="profile photo" data="photo" type="file" />
</div>
