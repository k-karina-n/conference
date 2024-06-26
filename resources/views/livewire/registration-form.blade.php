<main class="mx-auto max-w-xl px-4 py-10 text-center sm:px-6 lg:px-8 lg:py-14">
    <h1 class="mb-4 mx-auto bg-white px-4 py-6 text-center text-3xl font-bold text-gray-900 sm:px-6 lg:px-8">
        Register for conference
    </h1>

    <form wire:submit="validateConferenceData" enctype="multipart/form-data" x-show="!$wire.get('registrationSuccess')">
        <div class="space-y-6" x-show="$wire.get('formUserDataVisible')">
            <x-form-user-data />
            <x-button wire:click="validateUserData">Next Step</x-button>
        </div>

        <div class="space-y-6" x-show="!$wire.get('formUserDataVisible')">
            <x-form-conference-data />
            <x-button wire:click="$set('formUserDataVisible', 'false')">Previous Step</x-button>
            <x-button type="submit">Submit</x-button>
        </div>
    </form>

    <div class="space-y-2" x-show="$wire.get('registrationSuccess')">
        <h3 class="text-xl font-bold text-gray-900">Share on social media if you want</h3>

        <p class="mt-2 text-sm font-medium text-gray-700">{{ $message }}</p>

        <div class="grid grid-cols-1 gap-x-4 sm:grid-cols-2 lg:gap-x-6">
            <x-button href="http://twitter.com/share?text=">Twitter</x-button>
            <x-button href="http://www.facebook.com/sharer.php?u=http://localhost:8888/list">Facebook</x-button>
        </div>

        <h3 class="text-xl font-bold text-gray-900">OR</h3>

        <x-button wire:click="showList">View the list of speakers</x-button>
    </div>
</main>
