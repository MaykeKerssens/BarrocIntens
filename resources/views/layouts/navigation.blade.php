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
            {{-- Check if the user has a role --}}
            @if (auth()->user()->role_id)
                {{-- Display role-specific links --}}
                @if (auth()->user()->role_id == 1)
                    {{-- Customer --}}
                    <x-nav-link :href="route('customer.index')" :active="request()->routeIs('customer.index')">
                        {{ __('Customer Dashboard') }}
                    </x-nav-link>
                    <!-- Add other role-specific links similarly -->
                    {{-- ... --}}
                @endif
            @endif
            
            <!-- Always show logout link -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    {{ __('Logout') }}
                </x-nav-link>
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
