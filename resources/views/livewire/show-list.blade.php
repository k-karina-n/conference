<main class="mx-auto my-8 flex max-w-[85rem] flex-col px-4">
    <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">

        <div class="border-b border-gray-200 px-6 py-4 md:flex md:items-center md:justify-between">
            <h2 class="text-xl font-semibold text-gray-800">List of Speakers</h2>

            @auth
                <div>
                    <x-button wire:click="addUser">Add Speaker</x-button>
                </div>
            @endauth
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <tr class="bg-gray-50">
                <x-table-head titel="Photo" />
                <x-table-head titel="Name" />
                <x-table-head titel="Conference titel" />
                <x-table-head titel="Date" />
            </tr>

            <tbody class="divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                        <x-table-item>
                            <img class="h-12 w-12 rounded-md" src="/photos/{{ $user->photo }}" alt="photo">
                        </x-table-item>

                        <x-table-item>
                            <span class="font-normal">
                                {{ $user->first_name }}
                                {{ $user->last_name }}
                            </span>
                        </x-table-item>

                        <x-table-item>
                            {{ $user->title }}
                        </x-table-item>

                        <x-table-item>
                            <span class="font-normal text-gray-500">
                                {{ $user->date }}
                            </span>
                        </x-table-item>

                        @auth
                            <x-table-item>
                                <button wire:click="editUser({{ $user->id }})">Edit</button>
                            </x-table-item>

                            <x-table-item>
                                <button wire:click="deleteUser({{ $user->id }})">Delete</button>
                            </x-table-item>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if (session('status'))
            <div class="fixed bottom-3 right-3 rounded-xl bg-blue-500 px-4 py-2 text-sm text-white"
                x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show">
                {{ session('status') }}
            </div>
        @endif

        <div class="px-6 py-4">
            {{ $users->links() }}
        </div>
    </div>
</main>
