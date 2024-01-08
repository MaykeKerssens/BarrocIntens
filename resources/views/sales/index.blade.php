<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Sales overzicht') }}
    </x-slot>

    <div class="max-w-7xl mx-auto my-8 bg-white shadow overflow-hidden">
        @if (session('message'))
            <div class="bg-yellow text-gray-800 font-bold p-4">
                <p>{{ session('message') }}</p>
            </div>
        @endif
        <div class="px-4 py-5">

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
                        <x-table.td>{{ $user->company ? $user->company->name : '-' }}</x-table.td>
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
                    {{ $notes->links() }}
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

            <x-table :columns="['Datum', 'Geaccepteerd', 'Aansluitkosten', 'Bedrijf', 'Producten', 'Acties']">
                <x-slot name="title">
                    Offertes:
                </x-slot>
                <x-slot name="button">
                    <a href="{{ route('offers.create') }}">Offerte Toevoegen</a>
                </x-slot>
                <x-slot name="paginationLinks">
                    <!-- Display pagination links -->
                    {{ $offers->links() }}
                </x-slot>
                @foreach ($offers as $offer)
                <tr class="hover:bg-gray-200">
                    <x-table.td>{{ $offer->date }}</x-table.td>
                    <x-table.td>
                        @if ($offer->accept !== null)
                        @if ($offer->accept)
                            <span class="text-green-500">Ja</span>
                        @else
                            <span class="text-red-500">Nee</span>
                        @endif
                    @else
                        Afwachting
                    @endif
                    </x-table.td>
                    <x-table.td>{{ $offer->costs }}</x-table.td>
                    <x-table.td>{{ $offer->company->name }}</x-table.td>
                    <x-table.td>
                        {{ implode(', ', $offer->products->pluck('name')->toArray()) }}
                    </x-table.td>
                    <x-table.td>
                        <a href="{{ route('offers.edit', $offer->id) }}"
                            class="text-blue-500 hover:underline">Bewerken</a>
                    </x-table.td>
                </tr>
                @endforeach
            </x-table>
        </div>
    </div>
</x-app-layout>
