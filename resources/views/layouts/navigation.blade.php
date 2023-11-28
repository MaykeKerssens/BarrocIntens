<nav class="flex justify-between px-5">
    <!-- Name + Slogan -->
    <div class="flex items-center p-5 text-4xl">
        <a href="{{ route('dashboard') }}" class="flex gap-x-1 font-bigShouldersDisplay">
            <h1 class="">Barroc</h1>
            <h1 class="font-bigShouldersDisplayBold">Intens</h1>
            <h2>- vl</h2>
            <h2 class="text-yellow font-bigShouldersDisplayBlack">/</h2>
            <h2>mmend lekkere koffie</h2>
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Producten') }}
        </x-nav-link>
        <x-nav-link>
            {{ __('Contact') }}
        </x-nav-link>

        {{-- Check if the user is authenticated --}}
        @auth
            {{-- Check if the user has a role --}}
            @if(auth()->user()->role_id)
                {{-- Display role-specific links --}}
                @if(auth()->user()->role_id == 1) {{-- Customer --}}
                    <x-nav-link :href="route('customer.dashboard')" :active="request()->routeIs('customer.dashboard')">
                        {{ __('Customer Dashboard') }}
                    </x-nav-link>
                @elseif(auth()->user()->role_id == 2) {{-- Finance --}}
                    <x-nav-link :href="route('finance.dashboard')" :active="request()->routeIs('finance.dashboard')">
                        {{ __('Finance Dashboard') }}
                    </x-nav-link>
                @elseif (auth()->user()->role_id == 3)
                    <x-nav-link :href="route('maintenance.dashboard')" :active="request()->is('maintenance.dashboard')">
                        {{ __('Maintenance Dashboard') }}
                    </x-nav-link>
                @elseif (auth()->user()->role_id == 4)
                    <x-nav-link :href="route('sales.dashboard')" :active="request()->is('sales.dashboard')">
                        {{ __('Sales Dashboard') }}
                    </x-nav-link>
                @elseif (auth()->user()->role_id == 5)
                    <x-nav-link :href="route('sourcing.dashboard')" :active="request()->is('sourcing.dashboard')">
                        {{ __('Sourcing Dashboard') }}
                    </x-nav-link>
                {{-- Add similar checks for other roles --}}
                @endif
            @endif

            {{-- Add your custom links based on user roles --}}
            @if(auth()->user()->is_admin)
                <x-nav-link :href="route('create')" :active="request()->routeIs('create')">
                    {{ __('Upload') }}
                </x-nav-link>
            @endif
        @endauth

        {{-- Display login link --}}
        <x-nav-link>
            {{ __('Login') }}
        </x-nav-link>
    </div>
</nav>
