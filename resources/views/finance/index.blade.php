<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Finance') }}
        </h2>
    </x-slot>

    <x-primary-button class="mb-4">
        <a href="{{ route('invoices.create') }}">Nieuwe Factuur Toevoegen</a>
    </x-primary-button>

    <!-- Tabel voor Facturen -->
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">Facturen</h2>
    <table class="table-auto w-full border-collapse border border-gray-400 mb-8">
        <thead>
            <tr class="bg-gray-200">
                <th>Datum</th>
                <th>Betaaldstatus</th>
                <th>Aansluitkosten</th>
                <th>Contract</th>
                <th>Aanpassen</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($invoices as $invoice)
                <tr class="hover:bg-gray-100">
                    <td>{{ $invoice->date }}</td>
                    <td>
                        @if ($invoice->paid)
                            <span class="text-green-500">Betaald</span>
                        @else
                            <span class="text-red-500">Niet betaald</span>
                        @endif
                    </td>
                    <td>{{ $invoice->costs }}</td>
                    <td>{{ $invoice->contract->company->name }}</td>
                    <td>
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="text-blue-500 hover:underline">Bewerken</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-primary-button class="mb-4">
        <a href="{{ route('contracts.create') }}">Nieuwe contract Toevoegen</a>
    </x-primary-button>

    <!-- Tabel voor Contracts -->
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">Contracten</h2>
    <table class="table-auto w-full border-collapse border border-gray-400">
        <thead>
            <tr class="bg-gray-200">
                <th>Bedrijf</th>
                <th>Startdatum</th>
                <th>Einddatum</th>
                <th>Ondertekend</th>
                <th>Factureringstype</th>
                <th>BKR Check</th>
                <th>Aanpassen</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($contracts as $contract)
                <tr class="hover:bg-gray-100">
                    <td>{{ $contract->company->name }}</td>
                    <td>{{ $contract->start_date }}</td>
                    <td>{{ $contract->end_date }}</td>
                    <td>
                        @if ($contract->is_sign)
                            Ja
                        @else
                            Nee
                        @endif
                    </td>
                    <td>{{ $contract->billing_type }}</td>
                    <td>
                        @if ($contract->company->bkr_checked_at)
                            {{ $contract->company->bkr_checked_at }}
                        @else
                            Geen BKR-check
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('contracts.edit', $contract->id) }}" class="text-blue-500 hover:underline">Bewerken</a>
                        <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
