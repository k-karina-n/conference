<main class="mx-auto my-8 flex max-w-[85rem] flex-col px-4">
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        <div class="grid gap-3 border-b border-gray-200 px-6 py-4 md:flex md:items-center md:justify-between">
            <h2 class="text-xl font-semibold text-gray-800">List of Speakers</h2>
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
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="px-6 py-4">
            {{ $users->links() }}
        </div>
    </div>
</main>
