@php
$buttonClass = "mt-6 w-full grid inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4"
@endphp

<div>
    <form wire:submit="save" enctype="multipart/form-data" x-show="!$wire.get('registrationSuccess')">
        @csrf
        <div x-show="$wire.get('firstStepVisible')" x-transition:enter="transition duration-200 transform ease-out" x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in" x-transition:leave-end="opacity-0 scale-90">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                <x-input label="first name" data="first_name" />
                <x-input label="last name" data="last_name" />
                <x-input label="phone" data="phone" type="phone" x-mask="+99 (999) 999-9999" />
                <x-input label="email" data="email" type="email" />
                <x-input label="country" data="country"></x-input>
                <x-input label="profile photo" data="photo" type="file"></x-input>
            </div>

            <button type="button" wire:click="validateFirstStep" class="{{ $buttonClass }}">Next Step</button>
        </div>

        <div x-show="!$wire.get('firstStepVisible')" x-transition:enter="transition duration-200 transform ease-out" x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in" x-transition:leave-end="opacity-0 scale-90">
            <x-input label="title" data="title" model="secondStep" />
            <x-input label="description" data="description" />
            <x-input label="date" data="date" type="date" min="{{ date('Y-m-d') }}" model="secondStep" />

            <button type="button" wire:click="$set('firstStepVisible', 'false')" class="{{ $buttonClass }}">Previous Step</button>
            <button type="submit" class="{{ $buttonClass }}">Submit</button>
        </div>
    </form>

    <div x-show="$wire.get('registrationSuccess')" class="space-y-2">
        <h3 class="text-xl font-bold text-gray-900">Share on social media if you want</h3>

        <p class="text-sm text-gray-700 font-medium">{{ $message }}</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 lg:gap-x-6">
            <a href="http://twitter.com/share?text={{ $message }}&hashtags=conference,speaker,mypublicspeech" target="_blank" class="{{ $buttonClass }}">
                Twitter
            </a>

            <a href="http://www.facebook.com/sharer.php?u=http://localhost:8888/list{{ $message }}" target="_blank" class="{{ $buttonClass }}">
                Facebook
            </a>
        </div>

        <h3 class="text-xl font-bold text-gray-900">OR</h3>

        <button type="button" class="{{ $buttonClass }}">View the list of speakers</button>
    </div>
</div>