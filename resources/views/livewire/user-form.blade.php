<main class="mx-auto my-8 max-w-[50rem] px-4">
    <form class="space-y-6 rounded-xl border border-gray-200 p-8 shadow-sm" wire:submit="save">
        <x-form-step-one />
        <x-form-step-two />
        <x-button type="submit">Save speaker</x-button>
    </form>
</main>