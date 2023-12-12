<nav class="flex justify-between px-5">
    <!-- Name + Slogan -->
    <div class="flex items-center p-5 text-4xl">
        <a href="{{ route('welcome') }}" class="flex gap-x-1 font-bigShouldersDisplay">
            <h1 class="">Barroc</h1>
            <h1 class="font-bigShouldersDisplayBold">Intens</h1>
            <h2>- vl</h2>
            <h2 class="text-yellow font-bigShouldersDisplayBlack">/</h2>
            <h2>mmend lekkere koffie</h2>
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

        {{-- Check if the user is authenticated --}}
        @auth
            {{-- Check if the user has a role --}}
            @if (auth()->user()->role_id)
                {{-- Display role-specific links --}}
                @if (auth()->user()->role_id == 1)
                    {{-- Customer --}}
                    <x-nav-link :href="route('customer.index')" :active="request()->routeIs('customer.index')">
                        {{ __('Customer Dashboard') }}
                    </x-nav-link>
                @elseif(auth()->user()->role_id == 2)
                    {{-- Finance --}}
                    <x-nav-link :href="route('finance.index')" :active="request()->routeIs('finance.index')">
                        {{ __('Financiën Dashboard') }}
                    </x-nav-link>
                @elseif (auth()->user()->role_id == 3)
                    <x-nav-link :href="route('maintenance.index')" :active="request()->routeIs('maintenance.index')">
                        {{ __('Onderhoud Dashboard') }}
                    </x-nav-link>
                @elseif (auth()->user()->role_id == 4)
                    <x-nav-link :href="route('sales.index')" :active="request()->is('sales.index')">
                        {{ __('Verkoop Dashboard') }}
                    </x-nav-link>
                @elseif (auth()->user()->role_id == 5)
                    <x-nav-link :href="route('sourcing.index')" :active="request()->is('sourcing.index')">
                        {{ __('Inkoop Dashboard') }}
                    </x-nav-link>
                @elseif (auth()->user()->role_id == 6)
                    <x-nav-link :href="route('headOfMaintenance.index')" :active="request()->routeIs('headOfMaintenance.index')">
                        {{ __('Overziende Onderhoud Dashboard') }}
                    </x-nav-link>
                @endif
            @endif
        @endauth


        <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
            {{ __('Producten') }}
        </x-nav-link>
        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
            {{ __('Contact') }}
        </x-nav-link>

        {{-- Display login link --}}
        <x-nav-link>
            {{ __('Login') }}
        </x-nav-link>
    </div>
</nav>
