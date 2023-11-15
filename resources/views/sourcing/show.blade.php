<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div>
        <p><strong>Naam:</strong> {{ $product->name }}</p>
        <p><strong>Beschrijving:</strong> {{ $product->description }}</p>
        <p><strong>Afbeelding:</strong></p>
        @if (!empty($product->image_path))
            <img style="width: 150px" src="{{ asset('storage/' . str_replace('public/', '', $product->image_path)) }}" alt="{{ $product->name }} afbeelding">
        @endif
        <p><strong>Prijs:</strong> {{ $product->price }}</p>
        <p><strong>Product Categorie:</strong> {{ $product->product_category_id }}</p>
    </div>
</x-app-layout>
