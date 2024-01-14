<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Head of Maintenance overzicht') }}
    </x-slot>

    <!--Overview only for Head of maintenance employee -->

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 py-5 bg-white shadow overflow-hidden flex gap-2">
            <div id='calendar' class="w-3/4"></div>
            <div class="bg-gray-100 p-2 w-1/4">
                <h4 class="font-semibold text-xl text-gray-800 underline decoration-yellow decoration-2 underline-offset-8 pb-2">Reperaties vandaag:</h4>

            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto">
            <!-- Table with all repair requests -->
            <x-table :columns="['Klant', 'Product', 'Beschrijving', 'Status']">
                <x-slot name="title">
                    Onderhoud verzoeken:
                </x-slot>
                {{-- <x-slot name="button">
                    <a href="">-</a>
                </x-slot> --}}
                <x-slot name="paginationLinks">
                    <!-- Display pagination links -->
                    {{ $repairRequests->links() }}
                </x-slot>

                @foreach ($repairRequests as $repairRequest)
                    <tr>
                        <x-table.td>{{ $repairRequest->company->name }}</x-table.td>
                        <x-table.td>{{ $repairRequest->product->name }}</x-table.td>
                        <x-table.td>{{ $repairRequest->note }}</x-table.td>

                        <!-- Determine what color the status should have -->
                        <x-table.td
                            class="{{ $repairRequest->status->color == 'green' ? 'text-green-500' : ($repairRequest->status->color == 'yellow' ? 'text-yellow-500' : ($repairRequest->status->color == 'blue' ? 'text-blue-500' : 'text-red-500')) }}">
                            {{ $repairRequest->status->name }}
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>
</x-app-layout>
