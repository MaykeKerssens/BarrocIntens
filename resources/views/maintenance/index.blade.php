<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Onderhoud overzicht') }}
    </x-slot>

    @if (session('success'))
        <div class="max-w-7xl mx-auto my-8 bg-white shadow overflow-hidden">
            {{ session('success') }}
        </div>
    @endif

    <!-- Overview for all normal maintenance employees -->
    <div id="user-data" data-user-id="{{ auth()->user()->id }}"></div>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 py-5 bg-white shadow overflow-hidden">

            <!-- All buttons here -->
            <div class="pb-2 flex justify-end">
                <!-- Create workOrder -->
                <x-primary-button>
                    <a href="{{ route('workOrder.create') }}">Werkbonnen</a>
                </x-primary-button>
            </div>

            <div class="flex flex-col sm:flex-row gap-2">
                <!-- Calander with all maintenance appointments -->
                <div id='calendar' class="w-full sm:w-3/4 mb-4 sm:mb-0"></div>

                <!-- List of all appointments and repairment requests for today -->
                <div class="bg-gray-100 p-2 w-full sm:w-1/2 md:w-1/4">
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
                    <div id="appointment-details" class="hidden sm:block" style="display: none;">
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


</x-app-layout>
