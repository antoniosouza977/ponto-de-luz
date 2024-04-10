<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title inertia>{{ env('APP_NAME') }}</title>
        <link rel="icon" type="image/x-icon" href="/favicon_io/favicon.ico">

        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @vite('resources/css/app.css')

        @routes
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>

{{--    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>--}}

</html>
