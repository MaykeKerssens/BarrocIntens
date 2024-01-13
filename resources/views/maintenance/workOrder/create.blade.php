<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Create Work Order') }}
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 py-5 bg-white shadow overflow-hidden">
            <form action="{{ route('workOrders.store') }}" method="POST" class="mt-6">
                @csrf
                <div class="shadow overflow-hidden bg-white p-4">
                    <div class="flex flex-col gap-6">
                        {{-- Name --}}
                        <div>
                            <label for="name" class="block font-medium text-gray-700">Naam:</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                        </div>
                        {{-- Description --}}
                        <div>
                            <label for="description" class="block font-medium text-gray-700">Omschrijving:</label>
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md resize-none"
                                required></textarea>
                        </div>
                        {{-- Maintenance Appointment --}}
                        <div>
                            <label for="maintenance_appointment_id" class="block font-medium text-gray-700">Onderhouds Afspraak:</label>
                            <select name="maintenance_appointment_id"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                                @foreach ($maintenanceAppointments as $maintenanceAppointment)
                                    <option value="{{ $maintenanceAppointment->id }}">{{ $maintenanceAppointment->note }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Time Spent --}}
                        <div>
                            <label for="timeSpent" class="block font-medium text-gray-700">Geduurde tijd (minuten):</label>
                            <input type="number" name="timeSpent"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                        </div>
                        {{-- Products --}}
                        <div>
                            <label for="products" class="block font-medium text-gray-700">Gebruikte producten:</label>
                            <select name="products[]" multiple
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    <x-primary-button>
                        Creëer werkbon
                    </x-primary-button>
                </div>
            </form>            
        </div>
    </div>
</x-app-layout>
