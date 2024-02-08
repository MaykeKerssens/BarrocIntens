<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
    <h1>FACTUUR</h1>
    <!-- Insert logo image here -->
    <img src="{{ asset('path/to/logo.png') }}" alt="Company Logo">
    <p>Barroc Intens<br>Terhijdenseweg 350<br>4826 AA Breda</p>
    <strong>{{ $invoice->contract->company->name }}</strong><br>
    {{ $invoice->contract->company->street }}<br>
    
    <!-- Display invoice details -->
    <p>Periode: {{ $invoice->date }}</p>
    <p>Klantnr: {{ $invoice->contract->company->id }}</p>
    <p>Contractnr: {{ $invoice->contract->id }}</p>
    <p>Factuurnr: {{ $invoice->id }}</p>
    
    <!-- Yellow line -->
    <hr style="border-top: 2px solid yellow;">

    <!-- Table with columns -->
    <table>
        <thead>
            <tr>
                <th>Aantal</th>
                <th>Nummer</th>
                <th>Omschrijving</th>
                <th>Prijs</th>
                <th>Subtotaal</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through invoice products and display them -->
            @php
                $total = 0; // Initialize total variable
            @endphp
            @foreach ($invoice->products as $product)
                <tr>
                    <td>1</td> <!-- Assuming quantity is always 1 -->
                    <td>{{ $product->id }}</td> <!-- Change as per your product ID -->
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->price }}</td> <!-- Assuming subtotal is same as price -->
                </tr>
                <!-- Calculate subtotal for the current product and add it to the total -->
                @php
                    $total += $product->price;
                @endphp
            @endforeach
        </tbody>
    </table>
    
    <!-- Display total -->
    <p>Totaal: {{ $total }}</p>

</body>
</html>
