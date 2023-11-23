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

        @if ($product->orders()->exists())
            <p>Dit product kan niet worden verwijderd omdat het al is besteld.</p>
        @else
            <form action="{{ route('sourcing.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit">Verwijder product</button>
            </form>
        @endif
    </div>
</x-app-layout>

