<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Afspraak aanpassen') }}
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto">
            @if ($errors->any())
                <div class="bg-red-500 text-white font-bold p-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('appointment.update', $appointment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white flex flex-col gap-6">

                        <!-- Appointment title-->
                        <div>
                            <label for="title" class="block font-medium text-gray-700">Afspraak titel:</label>
                            <input type="text" name="title" value="{{ $appointment->title }}"
                                id="title"class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <!-- Notes -->
                        <div>
                            <label for="note" class="block font-medium text-gray-700">Notities:</label>
                            <textarea name="note" id="note" rows="4"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md resize-none">{{ $appointment->note }}</textarea>
                        </div>

                        <!-- Dates -->
                        <div>
                            <label for="start" class="block text-sm font-medium text-gray-700">Start:</label>
                            <input type="datetime-local" name="start" id="start" value="{{ $appointment->start }}"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <div>
                            <label for="end" class="block text-sm font-medium text-gray-700">Eind:</label>
                            <input type="datetime-local" name="end" id="end" value="{{ $appointment->end }}"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <!-- Choose company -->
                        <div>
                            <label for="company" class="block font-medium text-gray-700">Bedrijf
                                selecteren:</label>
                            <select name="company"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Repair Requests -->
                        <div>
                            <label for="repairRequests" class="block font-medium text-gray-700">Bijbehorende reparatie
                                aanvragen selecteren:</label>
                            <select name="repairRequests[]" multiple
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                                <option value="0">Geen bijbehorende storingsaanvraag (routine afspraak)</option>
                                @foreach ($repairRequests as $repairRequest)
                                    <option value="{{ $repairRequest->id }}" {{ $appointment->repairRequests->contains($repairRequest->id) ? 'selected' : '' }}>
                                        [{{ $repairRequest->id . ' - ' . $repairRequest->company->name . ' - ' . $repairRequest->created_at->format('d/m/Y') }}]
                                        {{ $repairRequest->description }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Assign maintenance worker -->
                        <div>
                            <label for="maintenanceWorker" class="block font-medium text-gray-700">Medewerker
                                selecteren:</label>
                            <select name="maintenanceWorker"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                                @foreach ($maintenanceWorkers as $maintenanceWorker)
                                    <option value="{{ $maintenanceWorker->id }}" {{ $appointment->user_id == $maintenanceWorker->id ? 'selected' : '' }}>{{ $maintenanceWorker->name }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div>
                            <x-primary-button>
                                Afspraak toevoegen
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
