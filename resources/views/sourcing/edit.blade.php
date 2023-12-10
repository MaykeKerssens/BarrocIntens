<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Bewerken') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('sourcing.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Naam:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>

        <label for="description">Beschrijving:</label>
        <textarea name="description" required>{{ $product->description }}</textarea>

        <label for="image">Afbeelding:</label>
        <input type="file" name="image" id="imageInput" onchange="previewImage(event)">
        @if($product->image_path)
            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name . 'picutre'}}" style="max-width: 200px; margin-top: 5px;">
        @endif

        <label for="price">Prijs:</label>
        <input type="number" name="price" value="{{ $product->price }}" required>

        <label for="product_category_id">Product Categorie:</label>
        <select name="product_category_id" required>
            {{-- Dynamically populate options based on your categories --}}
            @foreach ($productCategories as $category)
                <option value="{{ $category->id }}" {{ $product->product_category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Opslaan</button>
    </form>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.querySelector('img');
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>

