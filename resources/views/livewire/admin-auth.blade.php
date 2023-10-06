<main
    class="mx-auto mt-8 max-w-xl rounded-xl border border-gray-200 px-4 py-10 text-center shadow-sm sm:px-6 lg:px-8 lg:py-14">

    <section x-show="!$wire.get('admin')">
        <form wire:submit="login">
            <x-input label="email" data="email" model="form" />
            <x-input label="password" data="password" type="password" model="form" />
            @error('login')<p class="text-pink-600 text-sm">{{ $message }}</p>@enderror
            <x-button type="submit">Log in</x-button>
        </form>
    </section>

    <section x-show="$wire.get('admin')">
        <h1 class="text-3xl font-bold text-gray-900">Would you like to leave?</h1>
        <x-button wire:click="logout">Log out</x-button>
    </section>
</main>
