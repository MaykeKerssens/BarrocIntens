<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Finance') }}
    </x-slot>
    

    <div class="max-w-7xl mx-auto my-8 bg-white shadow overflow-hidden">
        @if (session('message'))
            <div class="bg-yellow text-gray-800 font-bold p-4">
                <p>{{ session('message') }}</p>
            </div>
        @endif
        <div class="px-4 py-5">
            <!-- Tabel for Invoices -->
            <x-table :columns="['Datum', 'Betaalstatus', 'Aansluitkosten', 'Contract', 'Acties']">
                <x-slot name="title">
                    Facturen:
                </x-slot>
                <x-slot name="button">
                    <a href="{{ route('invoices.create') }}">Factuur toevoegen</a>
                </x-slot>
                <x-slot name="paginationLinks">
                    <!-- Display pagination links -->
                    {{ $invoices->links() }}
                </x-slot>
                @foreach ($invoices as $invoice)
                    <tr class="hover:bg-gray-200">
                        <x-table.td>{{ $invoice->date }}</x-table.td>
                        <x-table.td>
                            @if ($invoice->is_paid)
                                <span class="text-green-500">Betaald</span>
                            @else
                                <span class="text-red-500">Niet betaald</span>
                            @endif
                        </x-table.td>
                        <x-table.td>{{ $invoice->costs }}</x-table.td>
                        <x-table.td>{{ $invoice->contract->company->name }}</x-table.td>
                        <x-table.td>
                            <a href="{{ route('invoices.edit', $invoice->id) }}" class="text-blue-500 hover:underline">Bewerken</a>
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table>

            <!-- Table for Contracts -->
            <x-table :columns="['Bedrijf', 'Startdatum', 'Einddatum', 'Ondertekend', 'Factureringstype', 'BKR check', 'Acties']">
                <x-slot name="title">
                    Contracten:
                </x-slot>
                <x-slot name="button">
                    <a href="{{ route('contracts.create') }}">Contract Toevoegen</a>
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
                        <x-table.td>
                            <a href="{{ route('contracts.edit', $contract->id) }}" class="text-blue-500 hover:underline">Bewerken</a>
                            <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" class="inline"
                                id="deleteForm{{ $contract->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="text-red-500 hover:underline"
                                    onclick="confirmDelete(event)">Verwijderen</button>
                            </form>
                        </x-table.td>

                    </tr>
                @endforeach
            </x-table>
        </div>
        </div>
    </div>

    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Prevents the form from submitting immediately

            if (confirm('Weet je zeker dat je dit item wilt verwijderen?')) {
                document.getElementById('deleteForm{{ $contract->id }}').submit(); // Submits the form if confirmed
            }
        }
    </script>
</x-app-layout>
