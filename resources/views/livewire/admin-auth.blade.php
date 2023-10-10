<main
    class="mx-auto mt-8 max-w-xl rounded-xl border border-gray-200 px-4 py-10 text-center shadow-sm sm:px-6 lg:px-8 lg:py-14">

    @auth
        <section>
            <h1 class="mb-6 text-3xl font-bold text-gray-900">Would you like to leave?</h1>
            <x-button wire:click="logout">Log out</x-button>
        </section>
    @else
        <section>
            <form wire:submit="login" class="space-y-6">
                <x-input label="email" name="email" admin="true" />
                <x-input label="password" name="password" type="password" admin="true" />
                @error('login')
                    <p class="text-sm text-pink-600">{{ $message }}</p>
                @enderror
                <x-button type="submit">Log in</x-button>
            </form>
        </section>
    @endauth
</main>
