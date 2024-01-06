<x-app-layout>
    <x-slot name="pageHeaderText">
        Change password
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto">
            <h1>Barroc intens</h1>
            <br>
            <p>Hi, bedankt voor het kiezen van Barroc intens voor jullie koffie!</p>
            <p>Er is een account aangemaakt op de Barroc intens website met het onderstaande e-mailadres:</p>
            <p>{{ $email }}</p>
            <p>U moet eerst uw wachtwoord veranderen voordat u kunt inloggen.</p>
            <br>
            <a href="http://barroc-intens.test/forgot-password">Verander uw wachtwoord via deze link</a>
        </div>
    </div>
</x-app-layout>
