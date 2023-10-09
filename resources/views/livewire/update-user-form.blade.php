<main class="mx-auto my-8 max-w-[50rem] px-4">
    <form class="space-y-6 rounded-xl border border-gray-200 p-8 shadow-sm" wire:submit="save">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:gap-6">
            <x-input label="first name" data="first_name" value="{{ $user->first_name }}" />
            <x-input label="last name" data="last_name" value="{{ $user->last_name }}" />
            <x-input label="phone" data="phone" type="phone" x-mask="+99 (999) 999-9999" value="{{ $user->phone }}" />
            <x-input label="email" data="email" type="email" value="{{ $user->email }}" />
            <x-input label="country" data="country" userCountry="{{ $user->country }}" />
            <x-input label="profile photo" data="photo" type="file" value="{{ $user->photo }}" />
        </div>

        <x-input label="title" data="title" value="{{ $user->title }}" />
        <x-input label="description" data="description">
            {{ $user->description }}
        </x-input>
        <x-input label="date" data="date" type="date" min="{{ date('Y-m-d') }}" value="{{ $user->date }}" />

        <x-button type="submit">Save speaker</x-button>
    </form>
</main>
