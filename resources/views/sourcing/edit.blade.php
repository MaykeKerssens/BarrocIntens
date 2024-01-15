<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Product bewerken') }}
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

            <form method="POST" action="{{ route('sourcing.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white flex flex-col gap-6">

                        {{-- Name input --}}
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Naam:</label>
                            <input type="text" name="name" value="{{ $product->name }}" required class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md">
                        </div>

                        {{-- Description input --}}
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving:</label>
                            <textarea name="description" required class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md">{{ $product->description }}</textarea>
                        </div>

                        {{-- Image input --}}
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Afbeelding:</label>
                            <input type="file" name="image" id="imageInput" onchange="previewImage(event)" class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 border rounded-md">
                            @if ($product->image_path)
                                <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}"
                                    style="max-width: 200px; margin-top: 5px;">
                            @endif
                        </div>

                        {{-- Price input --}}
                        <div>
                            {{-- Change in future, when pricing is done differently --}}
                            <label for="price" class="block text-sm font-medium text-gray-700">Prijs (€):</label>
                            <input type="number" name="price" value="{{ $product->price }}" class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md" required>
                        </div>

                        {{-- Category select --}}
                        <div>
                            <label for="product_category_id" class="block text-sm font-medium text-gray-700">Product Categorie:</label>
                            <select name="product_category_id" class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md">
                                {{-- Dynamically populate options based on your categories --}}
                                @foreach ($productCategories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->product_category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-primary-button>
                                Product aanpassen
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
