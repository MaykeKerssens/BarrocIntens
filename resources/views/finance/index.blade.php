<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Factuur pagina') }}
        </h2>
    </x-slot>

    <div class="mb-4">
        <a href="{{ route('invoices.create') }}" class="text-blue-500 hover:underline">Nieuwe Factuur Toevoegen</a>
    </div>

    <table class="table-auto w-full border-collapse border border-gray-400">
        <thead>
            <tr class="bg-gray-200">
                <th>Datum</th>
                <th>Paid</th>
                <th>Contract</th>
            </tr>
        </thead>
        <tbody>
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
                    <td>{{ $invoice->contract->company->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>