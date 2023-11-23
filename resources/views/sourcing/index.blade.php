<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Overzicht') }}
        </h2>
    </x-slot>

    <!-- Add a button to navigate to the create page -->
    <a href="{{ route('sourcing.create') }}" class="btn btn-primary mb-2">Nieuw Product Toevoegen</a>

    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Beschrijving</th>
                <th>Afbeelding</th>
                <th>Prijs</th>
                <th>Product Categorie</th>
                <th>Acties</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @if ($product->image_path)
                            <img style="width: 100px" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }} afbeelding">
                        @else
                            <span>Geen afbeelding beschikbaar</span>
                        @endif
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->product_category_id }}</td>
                    <td>
                        <!-- Add buttons for edit and delete actions -->
                        <a href="{{ route('sourcing.edit', $product->id) }}" class="btn btn-warning btn-sm">Bewerken</a>

                        <!-- Verwijder knop (gebruik een formulier om de DELETE-methode te ondersteunen) -->
                        <form action="{{ route('sourcing.show', $product->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
