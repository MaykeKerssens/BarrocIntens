<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Sales overzicht') }}
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto">
                <x-table :columns="['Bedrijf', 'Naam', 'E-mail', 'Telefoonnummer', 'Klant sinds']">
                    <x-slot name="title">
                        Klanten:
                    </x-slot>
                    {{-- <x-slot name="button">
                        <a href="">-</a>
                    </x-slot> --}}
                    <x-slot name="paginationLinks">
                        <!-- Display pagination links -->
                        {{ $users->links() }}
                    </x-slot>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-200">
                                <x-table.td>{{ $user->company->name }}</x-table.td>
                                <x-table.td>{{ $user->name }}</x-table.td>
                                <x-table.td>{{ $user->email }}</x-table.td>
                                <x-table.td>-</x-table.td>
                                <x-table.td>-</x-table.td>
                            </tr>
                        @endforeach
                </x-table>



                <x-table :columns="['Bedrijf', 'Beschrijving', 'Datum', 'BIT Medewerker']">
                    <x-slot name="title">
                        Notities:
                    </x-slot>
                    <x-slot name="button">
                        <a href="{{ route('notes.create') }}">Notitie Toevoegen</a>
                    </x-slot>
                    <x-slot name="paginationLinks">
                        <!-- Display pagination links -->
                        {{ $users->links() }}
                    </x-slot>
                        @foreach ($notes as $note)
                            <tr class="hover:bg-gray-200">
                                <x-table.td>{{ $note->company->name }}</x-table.td>
                                <x-table.td>{{ $note->note }}</x-table.td>
                                <x-table.td>{{ $note->date }}</x-table.td>
                                <x-table.td>{{ $note->user->name }}</x-table.td>
                            </tr>
                        @endforeach
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
