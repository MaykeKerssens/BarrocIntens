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
        <!-- Check authentication to show login/register/logout links -->
        @guest
            {{-- Display login link if user is not authenticated --}}
            <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Login') }}
            </x-nav-link>
            
            {{-- Display register link if user is not authenticated --}}
            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                {{ __('Register') }}
            </x-nav-link>
        @else
            {{-- Check if the user is authenticated --}}
            @auth
                {{-- Display links for all authenticated users --}}
                {{-- Customer --}}
                <x-nav-link :href="route('customer.index')" :active="request()->routeIs('customer.index')">
                    {{ __('Customer Dashboard') }}
                </x-nav-link>
                {{-- Finance --}}
                <x-nav-link :href="route('finance.index')" :active="request()->routeIs('finance.index')">
                    {{ __('Financiën Dashboard') }}
                </x-nav-link>
                {{-- Onderhoud --}}
                <x-nav-link :href="route('maintenance.index')" :active="request()->routeIs('maintenance.index')">
                    {{ __('Onderhoud Dashboard') }}
                </x-nav-link>
                {{-- Verkoop --}}
                <x-nav-link :href="route('sales.index')" :active="request()->routeIs('sales.index')">
                    {{ __('Verkoop Dashboard') }}
                </x-nav-link>
                {{-- Inkoop --}}
                <x-nav-link :href="route('sourcing.index')" :active="request()->routeIs('sourcing.index')">
                    {{ __('Inkoop Dashboard') }}
                </x-nav-link>
                {{-- Overziende Onderhoud --}}
                <x-nav-link :href="route('headOfMaintenance.request')" :active="request()->routeIs('headOfMaintenance.request')">
                    {{ __('Overziende Onderhoud Dashboard') }}
                </x-nav-link>
            @endauth

            <!-- Always show logout link -->
            <x-nav-link :href="route('logout')" class="cursor-pointer"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </x-nav-link>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
        @endguest

    
        <!-- Other navigation links -->
        <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
            {{ __('Producten') }}
        </x-nav-link>
        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
            {{ __('Contact') }}
        </x-nav-link>
    </div>
</nav>
