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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- FullCalender scripts-->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script src="{{ asset('js/calendar.js') }}" defer></script>
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
