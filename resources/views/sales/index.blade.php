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
                <x-slot name="button">
                    <a href="{{ route('users.create') }}">Klant aanmaken</a>
                </x-slot>
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

            <div class="col-md-6">
                <div class="form-group">
                    <form method="get" action="/search">
                        <div class="flex items-center">
                            <input class="border border-gray-300 rounded-md p-2 mr-2" name="search" placeholder="Search..."
                                value="{{ isset($search) ? $search : '' }}">
                            <x-primary-button>
                                Zoek
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>            

            <x-table :columns="['Bedrijf', 'Beschrijving', 'Datum', 'BIT Medewerker', 'Acties']">
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
                        <td>
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" id="deleteForm{{ $note->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('{{ $note->id }}')" class="text-red-500 hover:underline">Verwijderen</button>
                            </form>
                            <script>
                                function confirmDelete(noteId) {
                                    if (confirm('Weet je zeker dat je dit item wilt verwijderen?')) {
                                        document.getElementById('deleteForm' + noteId).submit();
                                    }
                                }
                            </script>
                        </td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>
</x-app-layout>