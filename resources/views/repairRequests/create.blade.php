<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Storing toevoegen') }}
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
            <form action="{{ route('repairRequests.store') }}" method="POST">
                @csrf

                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white flex flex-col gap-6">
                        <!-- Company -->
                        <div>
                            <label for="company_id" class="block text-sm font-medium text-gray-700">Bedrijf:</label>
                            <select name="company_id" id="company_id" class="mt-1 p-2 focus:ring-yellow focus:border-yellow block shadow-sm border-gray-300 rounded-md w-full">

                                @if (auth()->user()->role->name == 'Customer')
                                    <option value="{{ auth()->user()->company->id }}">{{ auth()->user()->company->name }}</option>
                                @elseif (auth()->user()->role->name == 'HeadOfMaintenance')
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>


                        <!-- Product -->
                        <div>
                            <label for="product_id" class="block text-sm font-medium text-gray-700">Product:</label>
                            <select name="product_id" id="product_id"
                            class="mt-1 p-2 focus:ring-yellow focus:border-yellow block shadow-sm border-gray-300 rounded-md w-full">
                            <option value="" disabled selected>Selecteer een product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving:</label>
                            <textarea name="description" id="description"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block shadow-sm border-gray-300 rounded-md w-full"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="emergency" class="block text-gray-700 text-sm font-bold mb-2">Noodgeval:</label>
                            <input type="checkbox" name="emergency" id="emergency" class="mr-2"> Is dit een noodgeval?
                        </div>
                        <div>
                            <x-primary-button>
                                Storing Toevoegen
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
