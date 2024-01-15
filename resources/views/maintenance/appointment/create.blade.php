<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Nieuwe Afspraak inplannen') }}
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
            <form action="" method="POST">
                @csrf

                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white flex flex-col gap-6">


                        <!-- Appointment title-->
                        <div>
                            <label for="title" class="block font-medium text-gray-700">Afspraak titel:</label>
                            <input type="text" name="title" id="title"class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md" required>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="note" class="block font-medium text-gray-700">Notities:</label>
                            <textarea name="note" id="note" rows="4"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md resize-none"></textarea>
                        </div>

                        <!-- Date -->
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700">Datum</label>
                            <input type="datetime-local" name="date" id="date"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <!-- Repair Requests -->
                        <div>
                            <label for="repairRequests" class="block font-medium text-gray-700">Bijbehorende reparatie aanvragen selecteren:</label>
                            <select name="repairRequests[]" multiple
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                                @foreach ($newRepairRequests as $repairRequest)
                                    <option value="{{ $repairRequest->id }}">[{{ $repairRequest->id }} - {{ $repairRequest->company->name }}] {{ $repairRequest->description }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Assign maintenance worker -->
                        <div>
                            <label for="maintenanceWorkers" class="block font-medium text-gray-700">Medewerker(s) selecteren:</label>
                            <select name="maintenanceWorkers[]" multiple
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>

                                @foreach ($maintenanceWorkers as $maintenanceWorker)
                                    <option value="{{ $maintenanceWorker->id }}">{{ $maintenanceWorker->name }}</option>
                                @endforeach
                            </select>
                        </div>





                        <!-- IsPaid -->
                        {{-- <div>
                            <label for="is_paid" class="block text-sm font-medium text-gray-700">Betaald</label>
                            <input type="checkbox" name="is_paid" id="is_paid" value="1"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block shadow-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Sign-up costs -->
                        <div>
                            <label for="costs" class="block text-sm font-medium text-gray-700">Aansluitkosten</label>
                            <input type="number"name="costs" id="costs"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <!-- Contract -->
                        <div>
                            <label for="contract_id" class="block text-sm font-medium text-gray-700">Contract</label>
                            <select name="contract_id" id="contract_id"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                                <option value="">Selecteer een contract</option>
                                @foreach ($contracts as $contract)
                                <option value="{{ $contract->id }}">{{ $contract->id . ' - ' . $contract->company->name . ' - ' . $contract->created_at->format('d/m/Y H:i') }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="product_ids" class="block text-sm font-medium text-gray-700">Selecteer Producten</label>
                            <select name="product_ids[]" id="product_ids"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required multiple>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}

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
