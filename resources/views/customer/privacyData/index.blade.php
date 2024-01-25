<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Klanten overzicht') }}
    </x-slot>

    <div class="max-w-7xl mx-auto my-8 bg-white shadow overflow-hidden">
        @if (session('message'))
            <div class="bg-yellow text-gray-800 font-bold p-4">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <div class="px-4 py-5">
            <x-table :columns="['Bedrijf', 'Naam', 'E-mail', 'Telefoonnummer', 'Adres', 'Klant sinds']">
                <x-slot name="title">
                    Persoonlijke gegevens:
                </x-slot>
                <x-slot name="paginationLinks">
                    <!-- Display pagination links -->
                    {{ $users->links() }}
                </x-slot>
                @foreach ($users as $user)
                    <tr>
                        <x-table.td>{{ $user->company ? $user->company->name : '-' }}</x-table.td>
                        <x-table.td>{{ $user->name }}</x-table.td>
                        <x-table.td>{{ $user->email }}</x-table.td>
                        <x-table.td>{{ $user->company ? $user->company->phone : '-'}}</x-table.td>
                        <x-table.td>
                            @if($user->company)
                                {{ $user->company->street }}, {{ $user->company->zip }} {{ $user->company->city }}
                            @else
                                -
                            @endif
                        </x-table.td>
                        <x-table.td>{{ $user->created_at->format('d/m/Y') }}</x-table.td>
                    </tr>
                @endforeach
            </x-table>
        </div>
        </div>
    </div>
</x-app-layout>
