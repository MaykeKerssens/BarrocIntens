<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Nieuwe notitie toevoegen') }}
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
            <form action="{{ route('notes.store') }}" method="POST">
                @csrf

                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <!-- Notitie -->
                            <div class="col-span-6 sm:col-span-4">
                                <label for="note" class="block text-sm font-medium text-gray-700">Beschrijving</label>
                                <textarea name="note" id="note" rows="3" class="form-input rounded-md shadow-sm mt-1 block w-full" required></textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="date" class="block text-sm font-medium text-gray-700">Datum</label>
                                <input type="datetime-local" name="date" id="date" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>

                            <!-- Bedrijf ID -->
                            <div class="col-span-6 sm:col-span-4">
                                <label for="company_id" class="block text-sm font-medium text-gray-700">Kies het bedrijf van de klant</label>
                                <select name="company_id" id="company_id" class="form-select mt-1 block w-full">
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-primary-button>
                            Notitie Toevoegen
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
