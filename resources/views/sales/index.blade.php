<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales pagina') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">Klanten</h2>
                <table class="table-auto w-full border-collapse border border-gray-400 mb-8">
                    <thead>
                        <tr class="bg-gray-200">
                            <th>Naam</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">Notities</h2>
                <div class="mb-4">
                    <a href="{{ route('notes.create') }}" class="text-blue-500 hover:underline">Nieuwe notitie Toevoegen</a>
                </div>
                <table class="table-auto w-full border-collapse border border-gray-400 mb-8">
                    <thead>
                        <tr class="bg-gray-200">
                            <th>Beschrijving</th>
                            <th>Datum</th>
                            <th>Bedrijf</th>
                            <th>Medewerker</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($notes as $note)
                            <tr class="hover:bg-gray-100">
                                <td>{{ $note->note }}</td>
                                <td>{{ $note->date }}</td>
                                <td>{{ $note->company->name }}</td>
                                <td>{{ $note->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
