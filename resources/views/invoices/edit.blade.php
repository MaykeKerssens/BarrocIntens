<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Factuur bewerken') }}
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

            <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white flex flex-col gap-6">
                            <!-- Contract name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Contract</label>
                                <p>{{ $invoice->contract->id . ' - ' . $invoice->contract->company->name . ' - ' . $invoice->contract->created_at->format('d/m/Y H:i') }}</p>
                            </div>

                            <!-- Date -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Datum</label>
                                <p>{{ $invoice->date->format('d/m/Y H:i') }}</p>
                            </div>

                            <!-- Paid -->
                            <div>
                                <label for="is_paid" class="block text-sm font-medium text-gray-700">Betaald</label>
                                <input type="checkbox" name="is_paid" id="is_paid" value="1" {{ $invoice->is_paid ? 'checked' : '' }} class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <x-primary-button>
                                    Factuur Bijwerken
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
