<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SISAHY GO</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Prompt:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        
        <!-- Scripts -->
        <script src="{{ mix('/js/manifest.js') }}" defer></script>
        <script src="{{ mix('/js/vendor.js') }}" defer></script>
        <script src="{{ mix('/js/app.js') }}" defer></script>
        @if (App::environment('production', 'staging'))
            <script>
                // Check that service workers are registered
                if ('serviceWorker' in navigator) {
                // Use the window load event to keep the page load performant
                window.addEventListener('load', () => {
                    navigator.serviceWorker.register('/sw.js');
                });
                }
            </script>
        @endif

        <link rel="manifest" href="/manifest.json">

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body class="font-prompt" ">
        <div id="app">
            @yield('nav')
            @yield('content')
        </div>    
    </body>
</html>
