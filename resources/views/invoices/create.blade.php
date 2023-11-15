<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nieuwe Factuur Toevoegen') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('invoices.store') }}" method="POST">
                @csrf

                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <!-- Datum -->
                            <div class="col-span-6 sm:col-span-4">
                                <label for="date" class="block text-sm font-medium text-gray-700">Datum</label>
                                <input type="datetime-local" name="date" id="date" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>

                            <!-- Betaald -->
                            <div class="col-span-6 sm:col-span-4">
                                <label for="paid" class="block text-sm font-medium text-gray-700">Betaald</label>
                                <input type="checkbox" name="paid" id="paid" value="1" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!-- Contract ID -->
                            <div class="col-span-6 sm:col-span-4">
                                <label for="contract_id" class="block text-sm font-medium text-gray-700">Contract</label>
                                <select name="contract_id" id="contract_id" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                    <option value="">Selecteer een contract</option>
                                    @foreach ($contracts as $contract)
                                        <option value="{{ $contract->id }}">{{ $contract->company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Factuur Toevoegen
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
