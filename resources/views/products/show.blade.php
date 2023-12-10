<!-- resources/views/products/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="main-content">
            <div class="product-details">
                <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" class="w-full h-auto">
                <p class="text-lg mt-4">{{ $product->description }}</p>
                <p class="text-lg font-bold mt-2">Price: ${{ $product->price }}</p>
                
                <!-- Offerte Button -->
                <a class="bg-blue-500 text-white py-2 px-4 rounded-full mt-4 inline-block">Offerte aanvragen</a>
            </div>
        </div>
    </div>
</x-app-layout>
