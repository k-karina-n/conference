@php
$buttonClass = "mt-6 w-full grid inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4"
@endphp

<form method="POST" action="/" enctype="multipart/form-data">
    @csrf
    <div x-data="{
            form: {
                firstName: $persist(''),
                lastName: $persist(''),
                phone: $persist(''),
                email: $persist(''),
                country: $persist(''),
                title: $persist(''),
                description: $persist(''),
                date: $persist(''),
            }
        }">
        <div x-data="{ currentStep: $persist('first') }">
            <div x-show="currentStep === 'first'" x-transition:enter="transition duration-200 transform ease-out" x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in" x-transition:leave-end="opacity-0 scale-90">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                    <x-input label="first Name" data="firstName" />
                    <x-input label="last Name" data="lastName" />
                    <x-input label="phone" data="phone" type="phone" />
                    <x-input label="email" data="email" type="email" />
                    <x-input label="country" data="country"></x-input>
                    <x-input label="profile photo" data="file" type="file"></x-input>
                </div>

                <button type="button" @click="currentStep = 'second'" class="{{ $buttonClass }}">
                    Next Step
                </button>
            </div>

            <div x-show="currentStep === 'second'" x-transition:enter="transition duration-200 transform ease-out" x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in" x-transition:leave-end="opacity-0 scale-90">
                <x-input label="conference title" data="title" />
                <x-input label="conference description" data="description" />
                <x-input label="date" data="date" type="date" />

                <button type="button" @click="currentStep = 'first'" class="{{ $buttonClass }}">Previous Step</button>
                <button type="submit" class="{{ $buttonClass }}">Submit</button>
            </div>
        </div>
    </div>
</form>