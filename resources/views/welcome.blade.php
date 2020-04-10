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

        <title>Seecoronastats</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- scripts -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
    </head>
    <body>
    <header>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/">CoronaVirusStats</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="/">Data <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a class="btn btn-primary" role="button" target="__blank" href="https://www.linkedin.com/in/kelechi-okwuriki-5ab061129">
                        Follow me on <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                    </a>
                </span>
            </div>
        </nav>
    </header>

    <main role="main" class="main" id="main">
        <Home></Home>
    </main>

    <footer class="footer bg-dark text-white">
      <div class="container text-center p-2">
        {{-- <h5>Developed by 
            <span>
                <a href="https://www.linkedin.com/in/kelechi-okwuriki-5ab061129" target="__blank" style="text-decoration:none;">Kelechi Okwuriki</a>
            </span>
        </h5> --}}
        <p>seecoronastats is a free app to view COVID-19 stats Globally. As there are multiple sources of mutating information, 
        please perform verification of information gotten from this app. The developer will not be held responsible for 
        any misinterpretation of data. </p>
      </div>
    </footer>
    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
