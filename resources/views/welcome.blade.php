<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163348996-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-163348996-1');
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="See Coronavirus CoronaVirus COVID-19 Covid-19 statistics data live in countries and worldwide">
        <meta name="keywords" content="Covid-19 COVID-19 Coronavirus CoronaVirus Corona virus Corona Virus statistics worldwide health">
        <meta name="author" content="Kelechi Matthew Okwuriki">


        <title>{{ env('APP_NAME') }}</title>

        <link rel="shortcut icon" type="image/jpg" href="/img/favicon.ico"/>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->

        <link href="{{ mix('css/app.css') }}" rel="stylesheet" media="screen">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" media="screen">
          <link href="{{ asset('css/all.css') }}" rel="stylesheet"> <!--load all styles -->

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="screen">


        <!-- Scripts -->
        <script src="{{ asset('js/all.js') }}" async></script>

    </head>
    <body>

        <main role="main" class="main" id="main">
            <App></App>
        </main>

    <script src="{{ mix('js/app.js') }}" async></script>

    </body>
</html>
