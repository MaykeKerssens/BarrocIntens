<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Head of Maintenance overzicht') }}
    </x-slot>

    <!--Overview only for Head of maintenance employee -->
    <div class="py-8">
        <div class="max-w-7xl mx-auto">
            <!-- Table with all maintenance requests -->
            <x-table :columns="['Klant', 'Product', 'Beschrijving', 'Status', 'Toegewezen aan']">
                <x-slot name="title">
                    Onderhoud verzoeken:
                </x-slot>
                {{-- <x-slot name="button">
                    <a href="">-</a>
                </x-slot> --}}
                <x-slot name="paginationLinks">
                    <!-- Display pagination links -->
                    {{ $requests->links() }}
                </x-slot>

                @foreach ($requests as $request)
                    <tr>
                        <x-table.td>{{ $request->company->name }}</x-table.td>
                        <x-table.td>{{ $request->product->name }}</x-table.td>
                        <x-table.td>{{ $request->note }}</x-table.td>

                        <!-- Determine what color the status should have -->
                        <x-table.td
                            class="{{ $request->status->color == 'green' ? 'text-green-500' : ($request->status->color == 'yellow' ? 'text-yellow-500' : ($request->status->color == 'blue' ? 'text-blue-500' : 'text-red-500')) }}">
                            {{ $request->status->name }}
                        </x-table.td>
                        <x-table.td>
                            <!-- Show all the people that have been assigned to resolve this request-->
                            @php
                                $appointmentRequests = $requests->find($request->id)->appointmentRequests;
                            @endphp

                            @foreach ($appointmentRequests as $appointmentRequest)
                                <p>{{ $appointmentRequest->maintenanceAppointment->user->name ? $appointmentRequest->maintenanceAppointment->user->name : '-' }}
                                </p>
                            @endforeach
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>
</x-app-layout>
