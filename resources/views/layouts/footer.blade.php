<nav class="flex justify-start py-4 px-10 text-xs gap-20">
    <!-- Logo -->
    <a href="{{ route('welcome') }}">
        <img src="/images/Logo4_groot.png" alt="BarrocIntens - Bizar goede koffie" width="130">
    </a>

    <div>
        <h4><b>Contact</b></h4>
        <p class="text-gray-500">+31(0)76-5733444</p>
        <p class="text-gray-500">info@barrocintens.nl</p>
    </div>
    <div>
        <h4><b>Locatie</b></h4>
        <p class="text-gray-500">Terheijdenseweg 350</p>
        <p class="text-gray-500">4826 AA Breda</p>
    </div>
    <div>
        <h4><b>Algemeen</b></h4>
        <x-footer-link :href="route('privacy-verklaring')" :active="request()->routeIs('privacy-verklaring')">
            {{ __('Privacy verklaring') }}
        </x-footer-link>
    </div>
</nav>
