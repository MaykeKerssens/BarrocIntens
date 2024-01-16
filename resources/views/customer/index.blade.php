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
            <x-table :columns="['Bedrijf', 'Product', 'Beschrijving', 'Status', 'Klant']">
                <x-slot name="title">
                    Storingaanvraag:
                </x-slot>
                <x-slot name="paginationLinks">
                    <!-- Display pagination links -->
                    {{ $requests->links() }}
                </x-slot>
                <x-slot name="button">
                    <a href="{{ route('repairRequests.create') }}">Storing toevoegen</a>
                </x-slot>
                @foreach ($requests as $request)
                    @if (auth()->user()->company && auth()->user()->company->id === $request->company->id)
                        <tr>
                            <x-table.td>{{ $request->company->name }}</x-table.td>
                            <x-table.td>{{ $request->product->name }}</x-table.td>
                            <x-table.td>{{ $request->description }}</x-table.td>
                            <x-table.td>{{ $request->status->name }}</x-table.td>
                            <x-table.td>{{ $request->company->user->name }}</x-table.td>
                        </tr>
                    @endif
                @endforeach
            </x-table>
        </div>
        </div>
    </div>
</x-app-layout>
