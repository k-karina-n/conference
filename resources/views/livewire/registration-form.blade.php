<main>
    <h1 class="mx-auto bg-white px-4 py-6 text-center text-3xl font-bold text-gray-900 shadow sm:px-6 lg:px-8">
        Register for conference
    </h1>

    <section class="mx-auto max-w-xl px-4 py-10 text-center sm:px-6 lg:px-8 lg:py-14">
        <form wire:submit="validateSecondStep" enctype="multipart/form-data" x-show="!$wire.get('registrationSuccess')">
            @csrf
            <div x-show="$wire.get('firstStepVisible')" class="space-y-6">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:gap-6">
                    <x-input label="first name" data="first_name" />
                    <x-input label="last name" data="last_name" />
                    <x-input label="phone" data="phone" type="phone" x-mask="+99 (999) 999-9999" />
                    <x-input label="email" data="email" type="email" />
                    <x-input label="country" data="country"></x-input>
                    <x-input label="profile photo" data="photo" type="file"></x-input>
                </div>

                <x-button wire:click="validateFirstStep">Next Step</x-button>
            </div>

            <div x-show="!$wire.get('firstStepVisible')" class="space-y-6">
                <x-input label="title" data="title" model="secondStep" />
                <x-input label="description" data="description" model="secondStep" />
                <x-input label="date" data="date" type="date" min="{{ date('Y-m-d') }}" model="secondStep" />

                <x-button wire:click="$set('firstStepVisible', 'false')">Previous Step</x-button>
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
    </section>
</main>
