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
            <x-primary-button>
                <a href="{{ route('workOrder.create') }}">
                    Werkbonnen
                </a>
            </x-primary-button>

        </div>
    </div>
</x-app-layout>
