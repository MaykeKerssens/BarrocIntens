<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Inkoop overzicht') }}
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 py-5 bg-white shadow overflow-hidden">
        
      @if(session('message'))
          <div class="bg-yellow text-gray-800 font-bold p-4">
              <p>{{ session('message') }}</p>
          </div>
      @endif
        <!-- Table with all products -->
        <x-table :columns="['Product', 'Beschrijving', 'Afbeelding', 'Prijs', 'Categorie', 'Acties']">
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

                            <!-- Verwijder knop (gebruik een formulier om de DELETE-methode te ondersteunen) -->
                            <form action="{{ route('sourcing.destroy', $product->id) }}" method="POST" class="inline" id="deleteForm{{ $product->id }}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete(event)">Verwijderen</button>
                          </form>

                          <script>
                              function confirmDelete(event) {
                                  event.preventDefault(); // Prevents the form from submitting immediately

                                  if (confirm('Weet je zeker dat je dit item wilt verwijderen?')) {
                                      document.getElementById('deleteForm{{ $product->id }}').submit(); // Submits the form if confirmed
                                  }
                              }
                          </script>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
