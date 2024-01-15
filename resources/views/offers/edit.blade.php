<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Offerte bewerken') }}
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

            <form action="{{ route('offers.update', $offer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white flex flex-col gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Geaccepteerd</label>
                            <div class="flex items-center">
                                <input type="checkbox" name="accept" id="accept_yes" value="1" {{ $offer->accept == 1 ? 'checked' : '' }} class="mt-1 p-3 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <label for="accept_yes" class="ml-2">Ja</label>
                            </div>
                            
                            <div class="flex items-center mt-2">
                                <input type="checkbox" name="accept" id="accept_no" value="0" {{ $offer->accept == 0 ? 'checked' : '' }} class="mt-1 p-3 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <label for="accept_no" class="ml-2">Nee</label>
                            </div>
                        </div>
                        
                        <div>
                            <x-primary-button class="p-4">
                                Offerte Bijwerken
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
