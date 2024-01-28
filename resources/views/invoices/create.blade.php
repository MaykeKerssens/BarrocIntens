<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Nieuwe Factuur Toevoegen') }}
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
            <form action="{{ route('invoices.store') }}" method="POST">
                @csrf

                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white flex flex-col gap-6">
                        <!-- Date -->
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700">Datum</label>
                            <input type="datetime-local" name="date" id="date"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <!-- IsPaid -->
                        <div>
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
                                    <option value="{{ $product->id }}" data-stock="{{ $product->units_in_stock }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <x-primary-button>
                                Factuur Toevoegen
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
