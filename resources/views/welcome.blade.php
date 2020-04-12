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


        <title>Seecoronastats</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->

        <link href="{{ mix('css/app.css') }}" rel="stylesheet" media="screen">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" media="screen">
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" media="screen"> --}}
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="screen">


        <!-- Scripts -->

    </head>
    <body>
    <header>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/">CovidNineteenStats</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/information">Information <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a class="btn btn-primary" role="button" target="__blank" href="https://twitter.com/KellzGuy">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                    <a class="btn btn-primary" role="button" target="__blank" href="https://www.linkedin.com/in/kelechi-okwuriki-5ab061129">
                         <i class="fab fa-linkedin"></i> Linkedin
                    </a>
                </span>
            </div>
        </nav>
    </header>

    <main role="main" class="main" id="main">
        <router-view></router-view>
    </main>

    <footer class="footer bg-dark text-white">
      <div class="container text-center p-2">
        <p>seecoronastats is a free app to view COVID-19 stats Globally. As there are multiple sources of mutating information, 
        please perform verification of information gotten from this app. The developer will not be held responsible for 
        any misinterpretation of data.</p>
      </div>
    </footer>
    <script src="{{ mix('js/app.js') }}" async></script>
    <script src="https://kit.fontawesome.com/9f7685b59f.js" SameSite=None;Secure crossorigin="anonymous" defer></script>
    </body>
</html>
