<main
    class="mx-auto mt-8 max-w-xl rounded-xl border border-gray-200 px-4 py-10 text-center shadow-sm sm:px-6 lg:px-8 lg:py-14">

    <section x-show="$wire.get('login')">
        <x-input label="email" data="email" />
        <x-input label="password" data="password" type="password" />
        <x-button>Log in</x-button>
    </section>

    <section x-show="!$wire.get('login')">
        <h1 class="text-3xl font-bold text-gray-900">Would you like to leave?</h1>
        <x-button>Log out</x-button>
    </section>
</main>
