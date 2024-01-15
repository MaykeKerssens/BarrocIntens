<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Nieuwe Offerte Toevoegen') }}
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
            <form action="{{ route('offers.store') }}" method="POST">
                @csrf

                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white flex flex-col gap-6">
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700">Datum</label>
                            <input type="datetime-local" name="date" id="date"
                                class="mt-1 p-3 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <div>
                            <label for="costs" class="block text-sm font-medium text-gray-700">Aansluitkosten</label>
                            <input type="number" name="costs" id="costs"
                                class="mt-1 p-3 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <div>
                            <label for="company_id" class="block text-sm font-medium text-gray-700">Bedrijf</label>
                            <select name="company_id" id="company_id"
                                class="mt-1 p-3 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                                <option value="">Selecteer een bedrijf</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="product_ids" class="block text-sm font-medium text-gray-700">Selecteer Producten</label>
                            <select name="product_ids[]" id="product_ids"
                                class="mt-1 p-3 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required multiple>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-primary-button class="p-4">
                                Offerte Toevoegen
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
