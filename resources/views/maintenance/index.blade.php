<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Onderhoud overzicht') }}
    </x-slot>

    <!-- Overview for all normal maintenance employees -->
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 py-5 bg-white shadow overflow-hidden">

            <!-- Button 1: Storingsaanvraag -->
            <x-primary-button>
                Storingsaanvraag
            </x-primary-button>

            <!-- Button 2: Werkbezoek plannen -->
            <x-primary-button>
                Werkbezoek plannen
            </x-primary-button>

            <!-- Button 3: Werkbonnen -->
            <a href="{{ route('workOrder.create') }}" class="text-white bg-indigo-500 py-2 px-4 rounded-md hover:bg-indigo-600">
                Werkbonnen
            </a>

        </div>
    </div>
</x-app-layout>
