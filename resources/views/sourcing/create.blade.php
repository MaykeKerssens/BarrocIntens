<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Nieuw product toevoegen') }}
    </x-slot>
    @if ($errors->any())
        <div class="bg-red-500 text-white font-bold p-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('sourcing.store') }}" enctype="multipart/form-data"
        class="mt-5 md:mt-0 md:col-span-2">
        @csrf

        <label for="name" class="block text-sm font-medium text-gray-700 mt-2">Naam:</label>
        <input type="text" name="name"
            class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            required>

        <label for="description" class="block text-sm font-medium text-gray-700 mt-2">Beschrijving:</label>
        <textarea name="description"
            class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            required></textarea>

        <label for="image" class="block text-sm font-medium text-gray-700 mt-2">Afbeelding:</label>
        <input type="file" name="image"
            class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

        <label for="price" class="block text-sm font-medium text-gray-700 mt-2">Prijs:</label>
        <input type="number" name="price" step="0.01"
            class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            required>

        <label for="product_category_id" class="block text-sm font-medium text-gray-700 mt-2">Product Categorie:</label>
        <select name="product_category_id"
            class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            required>
            <option value="">Selecteer een categorie</option>
            @foreach ($productCategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <x-primary-button>
            Product toevoegen
        </x-primary-button>
    </form>
</x-app-layout>
