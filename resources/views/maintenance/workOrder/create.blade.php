<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Create Work Order') }}
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 py-5 bg-white shadow overflow-hidden">
            <form action="{{ route('workOrders.store') }}" method="POST">
                @csrf

                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            {{-- Name --}}
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name" autocomplete="given-name"
                                       class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       required>
                            </div>

                            {{-- Description --}}
                            <div class="col-span-6 sm:col-span-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="3"
                                          class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm sm:text-sm border-gray-300 rounded-md resize-none"
                                          required></textarea>
                            </div>

                            {{-- Maintenance Appointment ID --}}
                            <div class="col-span-6 mt-4">
                                <label for="maintenanceApointment_id" class="block font-medium text-gray-700">Onderhoudsafspraak:</label>
                                <select name="maintenanceApointment_id" id="maintenanceApointment_id"
                                        class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                        required>
                                    @foreach ($maintenanceAppointments as $appointment)
                                        <option value="{{ $appointment->id }}">{{ $appointment->note }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Time Spent --}}
                            <div class="col-span-6 mt-4">
                                <label for="timeSpent" class="block font-medium text-gray-700">Tijd besteed:</label>
                                <div class="flex items-center">
                                    <div class="flex-1 mr-2">
                                        <input type="number" name="hours" id="hours" placeholder="Uren"
                                               class="p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                               required>
                                    </div>
                                    <span>uur</span>
                                    <div class="flex-1 mx-2">
                                        <input type="number" name="minutes" id="minutes" placeholder="Minuten"
                                               class="p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                               required>
                                    </div>
                                    <span>minuten</span>
                                </div>
                            </div>

                            {{-- Add more form fields as needed --}}
                        </div>
                    </div>

                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow">
                            Create Work Order
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
