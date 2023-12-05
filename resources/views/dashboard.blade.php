<x-app-layout>
    <x-slot name="pageHeaderText">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-primary-button>
        Hello
    </x-primary-button>

    <x-primary-button>
        Dit is een lange tekst
    </x-primary-button>

    <x-secondary-button>
        Hello
    </x-secondary-button>

    <x-secondary-button>
        Dit is een lange tekst
    </x-secondary-button>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
