<template>
    <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <router-link to="/" class="navbar-brand">CovidNineteenStats</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <router-link to="/" class="nav-link"><i class="fas fa-tachometer-alt pr-1"></i>Dashboard</router-link>
                        </li>
                        <li class="nav-item active">
                            <router-link to="/diagnosis" class="nav-link"><i class="fas fa-stethoscope pr-1"></i>Diagnosis</router-link>
                        </li>
                        <li class="nav-item active">
                            <router-link to="/information" class="nav-link"><i class="fas fa-info-circle pr-1"></i>Information</router-link>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <a class="btn btn-primary" role="button" target="__blank" href="https://www.linkedin.com/in/kelechi-okwuriki-5ab061129">
                            <i class="fab fa-linkedin"></i> Linkedin
                        </a>
                    </span>
                </div>
            </nav>
        </header>
</template>
