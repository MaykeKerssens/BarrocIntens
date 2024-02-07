<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BarrocIntens') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Existing Scripts (e.g., Vite, FullCalendar) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script src="{{ asset('js/calendar.js') }}" defer></script>

    <!-- Add the following lines for cookie consent directly in the head -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (!Cookies.get('cookieConsent')) {
                // Create the cookie consent popup
                const popup = document.createElement('div');
                popup.innerHTML = `
                    <div id="cookie-popup" style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: #f8f8f8; padding: 15px; text-align: center; box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);">
                        <p>This website uses cookies. Do you accept?</p>
                        <button style="margin-top: 10px; padding: 5px 10px; background-color: #ffd700; color: #fff; border: none; cursor: pointer; margin-right: 10px;" onclick="acceptCookies()">Yes</button>
                        <button style="margin-top: 10px; padding: 5px 10px; background-color: #ffd700; color: #fff; border: none; cursor: pointer;" onclick="rejectCookies()">No</button>
                    </div>
                `;

                // Append the popup to the body
                document.body.appendChild(popup);
            }
        });

        function acceptCookies() {
            // Set the 'cookieConsent' cookie
            Cookies.set('cookieConsent', 'true', { expires: 365 });

            // Hide the popup
            document.getElementById('cookie-popup').style.display = 'none';
        }

        function rejectCookies() {
            document.getElementById('cookie-popup').style.display = 'none';
        }
    </script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Page Heading -->
        <header class="bg-white shadow">
            @include('layouts.navigation')
        </header>

        <!-- Page Content -->
        <main>
            @if (isset($pageHeaderText))
                <div class="max-w-7xl mx-auto py-4">
                    <h2 class="font-semibold text-2xl text-gray-800 underline decoration-yellow decoration-2 underline-offset-8 leading-tight ">
                        {{ $pageHeaderText }}
                    </h2>
                </div>
            @endif

            {{ $slot }}
        </main>
        <footer class="bg-white shadow">
            @include('layouts.footer')
        </footer>
    </div>
</body>
</html>
