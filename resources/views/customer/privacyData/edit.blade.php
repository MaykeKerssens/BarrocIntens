<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Gegevens aanpassen') }}
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto">
            @if (session('message'))
                <div class="bg-yellow text-gray-800 font-bold p-4">
                    <p>{{ session('message') }}</p>
                </div>
            @endif

            <form action="{{ route('privacyData.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white flex flex-col gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Bedrijf</label>
                            <p class="mt-1">{{ $user->company ? $user->company->name : '-' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Naam</label>
                            <p class="mt-1">{{ $user->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">E-mail</label>
                            <p class="mt-1">{{ $user->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Telefoonnummer</label>
                            <input type="text" name="phone" value="{{ $user->company ? $user->company->phone : '-' }}" class="mt-1 p-2 focus:ring-yellow focus:border-yellow block shadow-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Adres</label>
                            <input type="text" name="street" value="{{ $user->company ? $user->company->street : '-' }}" class="mt-1 p-2 focus:ring-yellow focus:border-yellow block shadow-sm border-gray-300 rounded-md">
                            <input type="text" name="zip" value="{{ $user->company ? $user->company->zip : '-' }}" class="mt-1 p-2 focus:ring-yellow focus:border-yellow block shadow-sm border-gray-300 rounded-md">
                            <input type="text" name="city" value="{{ $user->company ? $user->company->city : '-' }}" class="mt-1 p-2 focus:ring-yellow focus:border-yellow block shadow-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Klant sinds</label>
                            <p class="mt-1">{{ $user->created_at->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <x-primary-button class="p-4">
                                Gegevens Bijwerken
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
