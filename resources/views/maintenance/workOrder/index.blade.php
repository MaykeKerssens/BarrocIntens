<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Alle werkbonnen') }}
    </x-slot>

    <div class="max-w-7xl mx-auto my-8 bg-white shadow overflow-hidden">
        @if (session('message'))
            <div class="bg-yellow text-gray-800 font-bold p-4">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <div class="px-4 py-5">
            <!-- Table for Work Orders -->
            <x-table :columns="['Naam', 'Beschrijving', 'Duur (minuten)', 'Producten']">
                <x-slot name="title">
                    @if (auth()->user()->role->name == "HeadOfMaintenance")
                        Alle werkbonnen:
                    @else
                        Mijn werkbonnen:
                    @endif

                </x-slot>

                <x-slot name="paginationLinks">
                    <!-- Display pagination links -->
                    {{ $workOrders->links() }}
                </x-slot>

                @foreach ($workOrders as $workOrder)
                    <tr class="hover:bg-gray-200">
                        <x-table.td>{{ $workOrder->name }}</x-table.td>
                        <x-table.td>{{ $workOrder->description }}</x-table.td>
                        <x-table.td>{{ $workOrder->timeSpent }}</x-table.td>
                        <x-table.td>
                            @if ($workOrder->products->count() > 0)
                                {{ implode(', ', $workOrder->products->pluck('name')->toArray()) }}
                            @else
                                <em>No products selected</em>
                            @endif
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>
</x-app-layout>
