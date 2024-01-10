<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Nieuw contract toevoegen') }}
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
            <form action="{{ route('contracts.store') }}" method="POST">
                @csrf

                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white flex flex-col gap-6">
                        <!-- Company -->
                        <div>
                            <label for="company_id" class="block text-sm font-medium text-gray-700">Bedrijf</label>
                            <select name="company_id" id="company_id"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                                <option value="">Selecteer een bedrijf</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Start date-->
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Startdatum</label>
                            <input type="date" name="start_date" id="start_date"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <!-- End date-->
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">Einddatum</label>
                            <input type="date" name="end_date" id="end_date"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <div class="flex gap-x-10">
                            <!-- Billing type-->
                            <div>
                                <label for="billing_type"
                                    class="block text-sm font-medium text-gray-700">Factureringstype</label>
                                <select name="billing_type" id="billing_type"
                                    class="mt-1 p-2 focus:ring-yellow focus:border-yellow block shadow-sm border-gray-300 rounded-md">
                                    <option value="maandelijks">Maandelijks</option>
                                    <option value="periodiek">Periodiek</option>
                                </select>
                            </div>

                            <!-- Is signed-->
                            <div>
                                <label for="is_signed"
                                    class="block text-sm font-medium text-gray-700">Ondertekend</label>
                                <input type="checkbox" name="is_signed" id="is_signed"
                                    class="mt-1 p-2 focus:ring-yellow focus:border-yellow block shadow-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div>
                            <x-primary-button>
                                Contract Toevoegen
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
