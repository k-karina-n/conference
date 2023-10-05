@php
    $buttonClass = 'mt-6 w-full grid inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4';
@endphp

<main>
    <h1 class="mx-auto bg-white px-4 py-6 text-center text-3xl font-bold text-gray-900 shadow sm:px-6 lg:px-8">
        Register for conference
    </h1>

    <section class="mx-auto max-w-xl px-4 py-10 text-center sm:px-6 lg:px-8 lg:py-14">
        <form wire:submit="validateSecondStep" enctype="multipart/form-data" x-show="!$wire.get('registrationSuccess')">
            @csrf
            <div x-show="$wire.get('firstStepVisible')" x-transition:enter="transition duration-200 transform ease-out"
                x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in"
                x-transition:leave-end="opacity-0 scale-90">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:gap-6">
                    <x-input label="first name" data="first_name" />
                    <x-input label="last name" data="last_name" />
                    <x-input label="phone" data="phone" type="phone" x-mask="+99 (999) 999-9999" />
                    <x-input label="email" data="email" type="email" />
                    <x-input label="country" data="country"></x-input>
                    <x-input label="profile photo" data="photo" type="file"></x-input>
                </div>

                <button class="{{ $buttonClass }}" type="button" wire:click="validateFirstStep">Next Step</button>
            </div>

            <div x-show="!$wire.get('firstStepVisible')" x-transition:enter="transition duration-200 transform ease-out"
                x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in"
                x-transition:leave-end="opacity-0 scale-90">
                <x-input label="title" data="title" model="secondStep" />
                <x-input label="description" data="description" />
                <x-input label="date" data="date" type="date" min="{{ date('Y-m-d') }}" model="secondStep" />

                <button class="{{ $buttonClass }}" type="button"
                    wire:click="$set('firstStepVisible', 'false')">Previous
                    Step</button>
                <button class="{{ $buttonClass }}" type="submit">Submit</button>
            </div>
        </form>

        <div class="space-y-2" x-show="$wire.get('registrationSuccess')">
            <h3 class="text-xl font-bold text-gray-900">Share on social media if you want</h3>

            <p class="text-sm font-medium text-gray-700">{{ $message }}</p>

            <div class="grid grid-cols-1 gap-x-4 sm:grid-cols-2 lg:gap-x-6">
                <a class="{{ $buttonClass }}"
                    href="http://twitter.com/share?text={{ $message }}&hashtags=conference,speaker,mypublicspeech"
                    target="_blank">
                    Twitter
                </a>

                <a class="{{ $buttonClass }}"
                    href="http://www.facebook.com/sharer.php?u=http://localhost:8888/list{{ $message }}"
                    target="_blank">
                    Facebook
                </a>
            </div>

            <h3 class="text-xl font-bold text-gray-900">OR</h3>

            <button class="{{ $buttonClass }}" type="button" wire:click="showList">View the list of speakers</button>
        </div>
    </section>
</main>
