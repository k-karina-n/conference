<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:gap-6">
    <x-input label="first name" name="first_name" />
    <x-input label="last name" name="last_name" />
    <x-input label="phone" name="phone" type="phone" x-mask="+99 (999) 999-9999" />
    <x-input label="email" name="email" type="email" />
    <x-input label="country" name="country" tag="select" />
    <x-input label="profile photo" name="photo" type="file" />
</div>
