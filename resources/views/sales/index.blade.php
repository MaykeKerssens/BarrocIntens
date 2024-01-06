<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Sales overzicht') }}
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 py-5 bg-white shadow overflow-hidden">
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
                        <x-table.td>{{ isset($user->company->name) ? $user->company->name : '-' }}</x-table.td>
                        <x-table.td>{{ $user->name }}</x-table.td>
                        <x-table.td>{{ $user->email }}</x-table.td>
                        <x-table.td>-</x-table.td>
                        <x-table.td>-</x-table.td>
                    </tr>
                @endforeach
            </x-table>



            <x-table :columns="['Bedrijf', 'Beschrijving', 'Datum', 'BIT Medewerker', 'Acties']">
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
                        <td>
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline"
                                id="deleteForm{{ $note->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="text-red-500 hover:underline"
                                    onclick="confirmDelete(event)">Verwijderen</button>
                        </td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>
    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Prevents the form from submitting immediately

            if (confirm('Weet je zeker dat je dit item wilt verwijderen?')) {
                document.getElementById('deleteForm{{ $note->id }}').submit(); // Submits the form if confirmed
            }
        }
    </script>
</x-app-layout>
