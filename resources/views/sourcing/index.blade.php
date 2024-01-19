<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Inkoop overzicht') }}
    </x-slot>

    <div class="max-w-7xl mx-auto my-8 bg-white shadow overflow-hidden">
        @if (session('message'))
            <div class="bg-yellow text-gray-800 font-bold p-4">
                <p>{{ session('message') }}</p>
            </div>
        @endif
        <div class="px-4 py-5">

            <!-- Table with all products -->
            <x-table :columns="['Product', 'Beschrijving', 'Afbeelding', 'Prijs', 'Categorie', 'Producten voorraad', 'Acties']">
                <x-slot name="title">
                    Producten overzicht:
                </x-slot>
                <x-slot name="button">
                    <a href="{{ route('sourcing.create') }}">Product Toevoegen</a>
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
                                <img style="max-width: 80px; max-height: 80px;"
                                    src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                            @else
                                <p>-</p>
                            @endif
                        </x-table.td>
                        <x-table.td>{{ $product->price }}</x-table.td>
                        <x-table.td>{{ $product->ProductCategory->name }}</x-table.td>
                        <x-table.td>{{ $product->units_in_stock }}</x-table.td>
                        <x-table.td>
                            <a href="{{ route('sourcing.edit', $product->id) }}"
                                class="text-blue-500 hover:underline">Bewerken</a>

                            <form action="{{ route('sourcing.destroy', $product->id) }}" method="POST"
                                class="inline" id="deleteForm{{ $product->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline"
                                    onclick="confirmDelete(event)">Verwijderen</button>
                            </form>

                            <script>
                                function confirmDelete(event) {
                                    event.preventDefault(); // Prevents the form from submitting immediately

                                    if (confirm('Weet je zeker dat je dit item wilt verwijderen?')) {
                                        document.getElementById('deleteForm{{ $product->id }}').submit();
                                    }
                                }
                            </script>
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>
</x-app-layout>
