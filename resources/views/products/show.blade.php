<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="main-content">
            <div class="product-details">
                @if ($product->image_path)
                    <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" class="w-full max-w-md h-auto">
                @else
                    <img src="{{ asset('storage/images/placeholder.png') }}" alt="Placeholder Image" class="w-full max-w-md h-auto">
                @endif
                
                <p class="text-lg mt-4">{{ $product->description }}</p>
                <p class="text-lg font-bold mt-2">Price: ${{ $product->price }}</p>

                <!-- Offerte Button -->
                <x-primary-button>
                    <a href="{{ route('contact-quotation', $product->id) }}">Offerte aanvragen</a>
                </x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>
