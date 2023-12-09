<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Neem contact met ons op') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
            @if ($errors->any())
                <div class="bg-red-500 text-white font-bold p-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('message'))
                <div class="bg-blue-500 text-white font-bold p-4">
                    {{ session('message') }}
                </div>
            @endif



            <form action="{{ route('contact-send') }}" method="POST">
                @csrf
                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white">
                        <div class="grid grid-cols-6 gap-6">
                            {{-- Company name --}}
                            <div class="col-span-6">
                                <label for="company_name" class="block font-medium text-gray-700">Bedrijfs naam:</label>
                                <input type="text" name="company_name" id="company_name"
                                    value="{{ isset($user->company) ? $user->company->name : old('company_name') }}"
                                    class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                            {{-- Email --}}
                            <div class="col-span-6">
                                <label for="email" class="block font-medium text-gray-700">Email:</label>
                                <input type="email" name="email" id="email"
                                    value="{{ isset($user) ? $user->email : old('email') }}"
                                    class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                            {{-- subject --}}
                            <div class="col-span-6">
                                <label for="subject" class="block font-medium text-gray-700">Onderwerp:</label>
                                <input type="text" name="subject" id="subject"
                                    class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                            {{-- Description --}}
                            <div class="col-span-6">
                                <label for="description" class="block font-medium text-gray-700">Beschrijving:</label>
                                <textarea name="description" id="description" rows="4"
                                    class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md resize-none"></textarea>
                            </div>
                        </div>
                        <x-primary-button class="mt-6">
                            Verstuur
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
