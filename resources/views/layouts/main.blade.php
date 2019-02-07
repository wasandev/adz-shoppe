<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#0C60A1"/>
        <title>SISAHY GO</title>

      
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        
        <!-- Scripts -->
        

        <script src="{{ mix('/js/app.js') }}" defer></script>
        @if (App::environment('production', 'staging'))
            <script>
                if ('serviceWorker' in navigator) {
                    window.addEventListener('load', function() {
                        navigator.serviceWorker.register('/sw.js').then(function(registration) {
                        // Registration was successful
                        console.log('ServiceWorker registration successful with scope: ', registration.scope);
                        }, function(err) {
                        // registration failed :(
                        console.log('ServiceWorker registration failed: ', err);
                        });
                    });
                    }
            </script>
        @endif

       
        <link rel ="manifest" href ="/manifest.json">
    
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-indigo-lightest font-nunito text-base text-grey-darker leading-loose">
        <div id="app">
            @yield('nav')
            @yield('content')
        </div>    
    </body>
</html>
