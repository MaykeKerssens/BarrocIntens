<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maintenance - Head of Maintenance') }}
        </h2>
    </x-slot>

    <!--Overview only for Head of maintenance employee -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">


                <!-- Table with all maintenance requests -->
                <h3>Maintenance Requests:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Bedrijf</th>
                            <th>Product</th>
                            <th>Bescrhijving</th>
                            <th>Status</th>
                            <th>Assigned to</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr>
                                <td>{{ $request->company->name }}</td>
                                <td>{{ $request->product->name }}</td>
                                <td>{{ $request->note }}</td>
                                <td>{{ $request->status }}</td>
                                <td>
                                    <!-- Show all the people that have been assigned to resolve this request-->
                                    @php
                                        $appointmentRequests = $requests->find($request->id)->appointmentRequests;
                                    @endphp

                                    @foreach ($appointmentRequests as $appointmentRequest)
                                        <p>{{ $appointmentRequest->maintenanceAppointment->user->name ? $appointmentRequest->maintenanceAppointment->user->name : '-' }}</p>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
