<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        {{-- If you're using react, please un comment the next line --}}
        {{-- @viteReactRefresh --}}

        {{-- Uncomment this if you're using JSX --}}
        {{-- @vite(['resources/css/app.css', 'resources/js/app.jsx']) --}}

        {{-- Comment this out if you're using JSX --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="">
        {{-- Your page built here --}}
        <div id="app">
            <h1 class="text-9xl font-bold underline text-center">
                Hello!
            </h1>
        </div>
    </body>
</html>
