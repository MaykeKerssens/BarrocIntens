<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Nieuw product toevoegen') }}
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
            <form method="POST" action="{{ route('sourcing.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="shadow overflow-hidden">
                <div class="px-4 py-5 bg-white flex flex-col gap-6">

                    {{-- Name input --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mt-2">Naam:</label>
                        <input type="text" name="name"
                            class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                            required>
                    </div>

                    {{-- Description input --}}
                    <div>
                        <label for="description"
                            class="block text-sm font-medium text-gray-700 mt-2">Beschrijving:</label>
                        <textarea name="description"
                            class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md" required></textarea>
                    </div>

                    {{-- Image input --}}
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mt-2">Afbeelding:</label>
                        <input type="file" name="image"
                            class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md">
                    </div>

                    {{-- Price input --}}
                    <div>
                        {{-- Change in future, when pricing is done differently --}}
                        <label for="price" class="block text-sm font-medium text-gray-700 mt-2">Prijs (€):</label>
                        <input type="number" name="price" step="0.01"
                            class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                            required>
                    </div>

                    {{-- Category select --}}
                    <div>
                        <label for="product_category_id" class="block text-sm font-medium text-gray-700 mt-2">Product
                            Categorie:</label>
                        <select name="product_category_id"
                            class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                            required>

                            <option value="">Selecteer een categorie</option>
                            @foreach ($productCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-primary-button>
                            Product toevoegen
                        </x-primary-button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</x-app-layout>
