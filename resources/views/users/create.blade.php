<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Nieuwe klant aanmaken') }}
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
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white flex flex-col gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                            <input type="text" name="name"  class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md" id="name">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">email</label>
                            <input type="email" name="email" class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md" id="email">
                        </div>
                        <div>
                            <label for="role_id" class="block text-sm font-medium text-gray-700">Rol</label>
                            <input type="text" name="role_id" id="role_id" value="customer" readonly class="mt-1 p-2 focus:ring-yellow focus:border-yellow block shadow-sm border-gray-300 rounded-md w-full">
                        </div>                                                        
                        <div>
                            <x-primary-button>
                                Klant aanmaken
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
