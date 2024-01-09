<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Contract Bewerken') }}
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
            <form action="{{ route('contracts.update', $contract->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white flex flex-col gap-6">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Startdatum</label>
                            <input type="date" name="start_date" id="start_date"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                value="{{ $contract->start_date }}" required>
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">Einddatum</label>
                            <input type="date" name="end_date" id="end_date"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                value="{{ $contract->end_date }}" required>
                        </div>

                        <div>
                            <label for="is_sign" class="block text-sm font-medium text-gray-700">Ondertekend</label>
                            <input type="checkbox" name="is_sign" id="is_sign"
                            class="mt-1 p-2 focus:ring-yellow focus:border-yellow block shadow-sm border-gray-300 rounded-md"
                                {{ $contract->is_signed ? 'checked' : '' }}>
                        </div>

                        <div>
                            <label for="billing_type"
                                class="block text-sm font-medium text-gray-700">Factureringstype</label>
                            <select name="billing_type" id="billing_type"
                            class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md">
                                <option value="maandelijks"
                                    {{ $contract->billing_type === 'maandelijks' ? 'selected' : '' }}>Maandelijks
                                </option>
                                <option value="periodiek"
                                    {{ $contract->billing_type === 'periodiek' ? 'selected' : '' }}>Periodiek</option>
                            </select>
                        </div>


                        <div>
                            <label for="bkr_checked_at" class="block text-sm font-medium text-gray-700">BKR Check
                                Datum</label>
                            <input type="datetime-local" name="bkr_checked_at" id="bkr_checked_at"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                value="{{ $contract->company->bkr_checked_at ?? '' }}">
                        </div>
                        <div>
                            <x-primary-button>
                                Contract Bijwerken
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
