<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maintenance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">

                @dd($requests)
                <!-- Table with all maintenance requests -->
                <table>
                    <thead>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</x-app-layout>
