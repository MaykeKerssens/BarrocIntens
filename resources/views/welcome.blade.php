<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welkom op onze website!
        </h2>
    </x-slot>

    <div class="relative">
        <!-- Large Image Spanning Left to Right -->
        <img src="{{ asset('images/coffee-background.png') }}" alt="Large Image" class="w-full h-72 md:h-96 lg:h-120 object-cover">

        <!-- Text Overlay -->
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-center">Ontdek de smaak van vernieuwing</h1>
            <p class="text-lg md:text-xl lg:text-2xl text-center">Bij ons draait alles om jouw koffie-ervaring. Proef de perfectie en geniet van onze exclusieve selectie. Of je nu een koffieliefhebber bent of een bedrijfseigenaar die op zoek is naar hoogwaardige koffie, wij hebben wat je zoekt. Bekijk onze selectie hieronder.</p>
        </div>
    </div>

    <div class="container mx-auto p-4">
        <section class="main-content">
            <form action="{{ route('welcome') }}" method="GET">
                <label for="category">Filter by Category:</label>
                <select name="category" id="category">
                    <option value="" selected>All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit">Filter</button>
            </form>

            <div class="flex flex-wrap justify-center gap-4">
                <!-- ... existing code ... -->

    @foreach($products as $product)
    <div class="card-item md:w-1/3 sm:w-1/2">
        <a href="{{ route('products.show', $product) }}" class="block bg-white border rounded-md overflow-hidden transition-transform duration-300 transform hover:scale-105 hover:shadow-md group">
            <div class="machine-item__brand-image-holder">
                <div class="machine-item__brand-image">
                    <img src="{{ asset($product->image_path) }}" alt="Product Image" class="w-full h-auto">
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

<!-- ... existing code ... -->

            </div>
        </section>
    </div>
</x-app-layout>
