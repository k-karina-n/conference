<main class="mx-auto my-8 max-w-[50rem] px-4">
    <form class="rounded-xl border border-gray-200 shadow-sm space-y-6 p-8" wire:submit="save">
        <x-form-step-one />
        <x-form-step-two />

        <x-button type="save">Save speaker</x-button>
    </form>
</main>
