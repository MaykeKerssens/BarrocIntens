<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('Neem contact met ons op') }}
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

            @if (session('message'))
                <div class="bg-yellow text-gray-800 font-bold p-4">
                    {{ session('message') }}
                </div>
            @endif

            <form action="{{ route('contact-send') }}" method="POST">
                @csrf
                <div class="shadow overflow-hidden">
                    <div class="px-4 py-5 bg-white">
                        <div class="flex flex-col gap-6">
                            {{-- Company name --}}
                            <div>
                                <label for="company_name" class="block font-medium text-gray-700">Bedrijfs naam:</label>
                            <input type="text" name="company_name" id="company_name"
                                value="{{ isset($user->company) ? $user->company->name : old('company_name') }}"
                                class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                required>
                            </div>
                            {{-- Email --}}
                            <div>
                                <label for="email" class="block font-medium text-gray-700">Email:</label>
                                <input type="email" name="email" id="email"
                                    value="{{ isset($user) ? $user->email : old('email') }}"
                                    class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                            {{-- subject --}}
                            <div>
                                <label for="subject" class="block font-medium text-gray-700">Onderwerp:</label>
                                <input type="text" name="subject" id="subject" value="{{ isset($subject) ? $subject : old('subject') }}"
                                    class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                            {{-- Description --}}
                            <div>
                                <label for="description" class="block font-medium text-gray-700">Beschrijving:</label>
                                <textarea name="description" id="description" rows="4"
                                    class="mt-1 p-2 focus:ring-yellow focus:border-yellow block w-full shadow-sm border-gray-300 rounded-md resize-none"></textarea>
                            </div>
                        </div>
                        <x-primary-button class="mt-6">
                            Versturen
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
