<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welkom op onze website!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-4">Ontdek de smaak van vernieuwing</h1>
                    <p class="text-lg">Bij ons draait alles om jouw koffie-ervaring. Proef de perfectie en geniet van onze exclusieve selectie. Of je nu een koffieliefhebber bent of een bedrijfseigenaar die op zoek is naar hoogwaardige koffie, wij hebben wat je zoekt. Bekijk onze selectie hieronder.</p>
                </div>
            </div>
        </div>

        <a href="{{ route( 'contact-quotation', 1) }}">test</a>
    </div>
</x-app-layout>
