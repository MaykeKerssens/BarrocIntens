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
                    {{ $repairRequests->links() }}
                </x-slot>
                <x-slot name="button">
                    <a href="{{ route('repairRequests.create') }}">Storing toevoegen</a>
                </x-slot>
                @foreach ($repairRequests as $repairRequest)
                    <tr>
                        <x-table.td>{{ $repairRequest->company->name }}</x-table.td>
                        <x-table.td>{{ $repairRequest->product->name }}</x-table.td>
                        <x-table.td>{{ $repairRequest->description }}</x-table.td>
                        <x-table.td>{{ $repairRequest->status->name }}</x-table.td>
                        <x-table.td>{{ $repairRequest->company->user->name }}</x-table.td>
                    </tr>
                @endforeach
            </x-table>

            <x-table :columns="['Bedrijf', 'Startdatum', 'Einddatum', 'Ondertekend', 'Factureringstype', 'BKR check']">
                <x-slot name="title">
                    Contracten:
                </x-slot>
                <x-slot name="paginationLinks">
                    <!-- Display pagination links -->
                    {{ $contracts->links() }}
                </x-slot>

                @foreach ($contracts as $contract)
                    <tr class="hover:bg-gray-200">
                        <x-table.td>{{ $contract->company->name }}</x-table.td>
                        <x-table.td>{{ $contract->start_date }}</x-table.td>
                        <x-table.td>{{ $contract->end_date }}</x-table.td>
                        <x-table.td>
                            @if ($contract->is_signed)
                                Ja
                            @else
                                Nee
                            @endif
                        </x-table.td>
                        <x-table.td>{{ $contract->billing_type }}</x-table.td>
                        <x-table.td>
                            @if ($contract->company->bkr_checked_at)
                                {{ $contract->company->bkr_checked_at }}
                            @else
                                Geen BKR-check
                            @endif
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table>
        </div>
        </div>
    </div>
</x-app-layout>
