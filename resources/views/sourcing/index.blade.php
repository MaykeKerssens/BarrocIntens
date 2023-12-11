<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product overzicht') }}
        </h2>
    </x-slot>

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-primary-button class="mb-4">
            <a href="{{ route('sourcing.create') }}">Product Toevoegen</a>
        </x-primary-button>
        <!-- Table with all products -->
        <x-table :columns="['Product', 'Beschrijving', 'Afbeelding', 'Prijs', 'Categorie', 'Acties']">
            <x-slot name="title">
                Producten overzicht:
            </x-slot>
            <x-slot name="paginationLinks">
                <!-- Display pagination links -->
                {{ $products->links() }}
            </x-slot>

            @foreach ($products as $product)
                <tr>
                    <x-table.td>{{ $product->name }}</x-table.td>
                    <x-table.td>{{ $product->description }}</x-table.td>
                    <x-table.td>
                        @if ($product->image_path)
                                <img style="max-width: 80px; max-height: 80px;" src="{{ asset($product->image_path) }}" alt="{{ $product->name }} afbeelding">
                            @else
                                <p>-</p>
                            @endif
                    </x-table.td>
                    <x-table.td>{{ $product->price }}</x-table.td>
                    <x-table.td>{{ $product->ProductCategory->name }}</x-table.td>
                    <x-table.td>
                        <!-- Add buttons for edit and delete actions -->
                        <a href="{{ route('sourcing.edit', $product->id) }}" class="text-blue-500 hover:underline">Bewerken</a>

                        <form action="{{ route('sourcing.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Weet je zeker dat je dit product wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Verwijderen</button>
                        </form>
                    </x-table.td>
                </tr>
            @endforeach
        </x-table>
    </div>
</div>
</x-app-layout>
