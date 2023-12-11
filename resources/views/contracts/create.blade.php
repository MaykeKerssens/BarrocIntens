<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Nieuw contract toevoegen') }}
    </x-slot>

    <div class="container mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
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

                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <!-- Bedrijf -->
                            <div class="col-span-6 sm:col-span-4">
                                <label for="company_id" class="block text-sm font-medium text-gray-700">Bedrijf</label>
                                <select name="company_id" id="company_id" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                    <option value="">Selecteer een bedrijf</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Startdatum</label>
                                <input type="date" name="start_date" id="start_date" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="end_date" class="block text-sm font-medium text-gray-700">Einddatum</label>
                                <input type="date" name="end_date" id="end_date" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="is_sign" class="block text-sm font-medium text-gray-700">Ondertekend</label>
                                <input type="checkbox" name="is_sign" id="is_sign" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="billing_type" class="block text-sm font-medium text-gray-700">Factureringstype</label>
                                <select name="billing_type" id="billing_type" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="maandelijks">Maandelijks</option>
                                    <option value="periodiek">Periodiek</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-primary-button>
                            Contract Toevoegen
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
