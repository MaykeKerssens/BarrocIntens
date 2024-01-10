<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Onderhoud overzicht') }}
    </x-slot>

    <!--Overview for all normal maintenance employees -->
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 py-5 bg-white shadow overflow-hidden">
            <div id='calendar'></div>
        </div>
    </div>
</x-app-layout>
