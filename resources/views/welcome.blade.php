<x-app-layout>
    <x-slot name="pageHeaderText">
        Welkom op onze website!
    </x-slot>

    <div class="relative">
        <!-- Yellow Background with Black Text -->
        <div class="absolute inset-0 flex flex-col justify-center items-center bg-yellow-400 text-black">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-center">Ontdek de smaak van vernieuwing</h1>
            <p class="max-w-7xl mx-auto py-4 text-lg text-center">Bij ons draait alles om jouw koffie-ervaring. Proef de perfectie en geniet van onze exclusieve selectie. Of je nu een koffieliefhebber bent of een bedrijfseigenaar die op zoek is naar hoogwaardige koffie, wij hebben wat je zoekt. Bekijk onze selectie hieronder.</p>
        </div>

        <!-- Large Image Spanning Left to Right -->
        <img src="{{ asset('images/coffee-background.png') }}" alt="Large Image" class="w-full h-72 md:h-96 lg:h-120 object-cover">
    </div>

    <div class="container mx-auto p-4">
        <section class="main-content">
            <form action="{{ route('welcome') }}" method="GET">
                <label for="category" class="block text-sm font-medium text-gray-700">Filter by Category:</label>
                <select name="category" id="category"
                    class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                    required>
                    <option value="" selected>All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="mt-2 p-2 bg-yellow-400 text-white rounded-md shadow-md hover:bg-yellow-500">Filter</button>
            </form>

            <div class="flex flex-wrap justify-center gap-4">
                @foreach($products as $product)
                    <div class="card-item md:w-1/3 sm:w-1/2">
                        <a href="{{ route('products.show', $product) }}" class="block bg-white border rounded-md overflow-hidden transition-transform duration-300 transform hover:scale-105 hover:shadow-md group">
                            <div class="machine-item__brand-image-holder">
                                <div class="machine-item__brand-image">
                                    @if ($product->image_path)
                                        <img src="{{ asset($product->image_path) }}" alt="Product Image" class="w-full h-auto">
                                    @else
                                        <img src="{{ asset('storage/images/placeholder.png') }}" alt="Placeholder Image" class="w-full h-auto">
                                    @endif
                                </div>
                            </div>
                            <div class="machine-item__detail-holder p-4">
                                <div class="machine-item__detail">
                                    <div class="machine-item__title text-xl font-bold mb-2">{{ $product->name }}</div>
                                    <div class="machine-item__description text-sm">{{ $product->description }}</div>
                                    @if ($product->category)
                                        <div class="machine-item__category text-sm mt-2">Category: {{ $product->category->name }}</div>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>
