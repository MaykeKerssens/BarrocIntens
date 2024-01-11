<h1>Offerte Details</h1>

<p><strong>Datum:</strong> {{ $offerDate }}</p>
<p><strong>Kosten:</strong> {{ $offerCosts }}</p>
<p><strong>Bedrijfsnaam:</strong> {{ $companyName }}</p>
<p><strong>Email van de gebruiker:</strong> {{ $userEmail }}</p>

<p><strong>Producten:</strong> {{ implode(', ', $productNames) }}</p>

<p>Bedankt voor het aanvragen van de offerte!</p>