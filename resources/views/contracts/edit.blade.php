<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contract Bewerken') }}
        </h2>
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
            <form action="{{ route('contracts.update', $contract->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Startdatum</label>
                                <input type="date" name="start_date" id="start_date" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $contract->start_date }}" required>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="end_date" class="block text-sm font-medium text-gray-700">Einddatum</label>
                                <input type="date" name="end_date" id="end_date" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $contract->end_date }}" required>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="is_sign" class="block text-sm font-medium text-gray-700">Ondertekend</label>
                                <input type="checkbox" name="is_sign" id="is_sign" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md" {{ $contract->is_sign ? 'checked' : '' }}>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="billing_type" class="block text-sm font-medium text-gray-700">Factureringstype</label>
                                <select name="billing_type" id="billing_type" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="maandelijks" {{ $contract->billing_type === 'maandelijks' ? 'selected' : '' }}>Maandelijks</option>
                                    <option value="periodiek" {{ $contract->billing_type === 'periodiek' ? 'selected' : '' }}>Periodiek</option>
                                </select>
                            </div>
                        

                            <div class="col-span-6 sm:col-span-4">
                                <label for="bkr_checked_at" class="block text-sm font-medium text-gray-700">BKR Check Datum</label>
                                <input type="datetime-local" name="bkr_checked_at" id="bkr_checked_at" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $contract->company->bkr_checked_at ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Contract Bijwerken
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
