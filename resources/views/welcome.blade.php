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
            <div class="flex flex-wrap justify-center gap-4">
                <div class="card-item md:w-1/3 sm:w-1/2">
                    <a href="#" class="block bg-white border rounded-md overflow-hidden transition-transform duration-300 transform hover:scale-105 hover:shadow-md group">
                        <div class="machine-item__brand-image-holder">
                            <div class="machine-item__brand-image">
                                <img src="{{ asset('images/products/machine-bit-deluxe.png') }}" alt="Product Image" class="w-full h-auto">
                            </div>
                        </div>
                        <div class="machine-item__detail-holder p-4">
                            <div class="machine-item__detail">
                                <div class="machine-item__title text-xl font-bold mb-2">Machine Bit Deluxe</div>
                                <div class="machine-item__description text-sm">Aantal groepen: 2-3</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="card-item md:w-1/3 sm:w-1/2">
                    <a href="#" class="block bg-white border rounded-md overflow-hidden transition-transform duration-300 transform hover:scale-105 hover:shadow-md group">
                        <div class="machine-item__brand-image-holder">
                            <div class="machine-item__brand-image">
                                <img src="{{ asset('images/products/machine-bit-light.png') }}" alt="Product Image" class="w-full h-auto">
                            </div>
                        </div>
                        <div class="machine-item__detail-holder p-4">
                            <div class="machine-item__detail">
                                <div class="machine-item__title text-xl font-bold mb-2">Machine Bit Light</div>
                                <div class="machine-item__description text-sm">Aantal groepen: 2-3</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
