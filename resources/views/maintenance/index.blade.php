<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Onderhoud overzicht') }}
    </x-slot>

    <div id="user-data" data-user-id="{{ auth()->user()->id }}"></div>
    <!--Overview for all normal maintenance employees -->
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 py-5 bg-white shadow overflow-hidden flex gap-2">

            <!-- Calander with all maintenance appointments -->
            <div id='calendar' class="w-3/4"></div>

            <!-- List of all appointments and repairment requests for today -->
            <div class="bg-gray-100 p-2 w-1/4">
                <h4 id="appointment-header"
                    class="font-semibold text-xl text-gray-800 underline decoration-yellow decoration-2 underline-offset-8 pb-2">
                    Reperaties vandaag:</h4>
                <div id="appointments-today">
                    <ul class="list-disc pl-4">
                        @if ($appointmentsToday != null)
                            @foreach ($appointmentsToday as $appointment)
                                <li class="pt-4">
                                    <p><b>{{ $appointment->title }} [{{ $appointment->start->format('H:i') }} -
                                            {{ $appointment->end->format('H:i') }}]</b></p>
                                    @foreach ($appointment->repairRequests as $repairRequest)
                                        <div class="flex">
                                            <p class="pr-1">-</p>
                                            <p>{{ $repairRequest->description }}</p>
                                        </div>
                                    @endforeach
                                </li>
                            @endforeach
                        @else
                            <p>Geen afspraken vandaag</p>
                        @endif
                    </ul>
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


</x-app-layout>
