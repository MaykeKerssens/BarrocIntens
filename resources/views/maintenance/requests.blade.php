<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Head of Maintenance overzicht') }}
    </x-slot>

    <!--Overview only for Head of maintenance employee -->

    <div class="py-8">
        <div class="max-w-7xl mx-auto">
            @if (session('message'))
                <div class="bg-yellow text-gray-800 font-bold p-4">
                    {{ session('message') }}
                </div>
            @endif
            <div class="px-4 py-5 bg-white shadow overflow-hidden flex gap-2">

                <!-- Calendar with all apppointments -->
                <div id='calendar' class="w-3/4"></div>

                <div class="bg-gray-100 p-2 w-1/4">

                    <div id="info-box">
                        <h4 id="appointment-header" class="font-semibold text-xl text-gray-800 underline decoration-yellow decoration-2 underline-offset-8 pb-2">Noodgevallen:</h4>
                        @if ($emergencyRepairRequests)
                            <ul class="list-disc pl-4 overflow-y-auto">
                                @foreach ($emergencyRepairRequests as $repairRequest)
                                    <li class="mt-4">
                                        <p><b>{{ $repairRequest->company->name }}</b></p>
                                        <p class="text-gray-500 text-sm">{{ $repairRequest->description }}</p>
                                        {{-- <x-secondary-button class="mt-2">
                                            <a href="{{ route('appointment.create') }}">Inplannen</a>
                                        </x-secondary-button> --}}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Momenteel geen noodgevallen</p>
                        @endif
                    </div>
                    <div id="appointment-details" style="display: none;">
                        <!-- Show company data -->
                        <div class="pt-1 text-sm text-gray-500">
                            <div class="flex">
                                <p id="appointment-street">Data onbeschikbaar</p>
                                <p class="text-yellow px-1"><b> | </b></p>
                                <p id="appointment-zip-city">Data onbeschikbaar</p>
                            </div>
                            <div class="flex">
                                <p id="appointment-phone">Data onbeschikbaar</p>
                                <p class="text-yellow px-1"><b> | </b></p>
                                <p id="appointment-email">Data onbeschikbaar</p>
                            </div>
                        </div>

                        <!-- Show appointment data-->
                        <div class="pt-10">
                            <p id="appointment-title" class="font-semibold text-lg text-gray-800">-</p>
                            <p id="appointment-date-times" class="text-gray-500 text-sm">-</p>
                            <p id="appointment-description" class="text-sm pt-2"></p>
                        </div>
                    </div>
                </div>
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
                <x-slot name="button">
                    <a href="{{ route('appointment.create') }}">Afspraak aanmaken</a>
                </x-slot>
                <x-slot name="paginationLinks">
                    <!-- Display pagination links -->
                    {{ $repairRequests->links() }}
                </x-slot>

                @foreach ($repairRequests as $repairRequest)
                    <tr>
                        <x-table.td>{{ $repairRequest->company->name }}</x-table.td>
                        <x-table.td>{{ $repairRequest->product->name }}</x-table.td>
                        <x-table.td>{{ $repairRequest->description }}</x-table.td>

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
