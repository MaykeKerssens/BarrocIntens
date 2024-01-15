<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Onderhoud overzicht') }}
    </x-slot>

    @if(session('success'))
        <div class="max-w-7xl mx-auto my-8 bg-white shadow overflow-hidden">
            {{ session('success') }}
        </div>
    @endif

    <!-- Overview for all normal maintenance employees -->
    <div id="user-data" data-user-id="{{ auth()->user()->id }}"></div>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 py-5 bg-white shadow overflow-hidden flex gap-2">
            <div id='calendar' class="w-3/4"></div>
            <div class="bg-gray-100 p-2 w-1/4">
                <h4 class="font-semibold text-xl text-gray-800 underline decoration-yellow decoration-2 underline-offset-8 pb-2">Reperaties vandaag:</h4>
                <ul class="list-disc pl-4">
                    @if ($appointmentsToday != null)
                        @foreach ($appointmentsToday as $appointment)
                            <li>
                                <p><b>{{ $appointment->title }}  [{{ $appointment->start->format('H:i')}} - {{ $appointment->end->format('H:i')}}]</b></p>
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
            <!-- Button 1: Storingsaanvraag -->
            <x-primary-button>
                Storingsaanvraag
            </x-primary-button>

            <!-- Button 2: Werkbezoek plannen -->
            <x-primary-button>
                Werkbezoek plannen
            </x-primary-button>

            <!-- Button 3: Werkbonnen -->
            <x-primary-button>
                <a href="{{ route('workOrder.create') }}">
                    Werkbonnen
                </a>
            </x-primary-button>
        </div>
    </div>
</x-app-layout>
