<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">CoronaVirusStats</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="#">Summary <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Countries</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                </div>
            </nav>

        <div class="container-fluid mt-4">
            <div class="row">
            <div class="col-sm-4">
                <!--start summary view-->
                    <Summary></Summary>
                <!--end summary view-->
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h5 class="card-title text-white">Countries</h5>
                        <h6 class="card-subtitle mb-2 text-white">Statistics by countries</h6>
                    </div>
                    <div class="card-body" v-for="stat in countryStatistics">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ stat.Country }}</h5>
                                <h6 class="card-subtitle">{{ stat.Date }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                stats: [],
                apiUrl: 'https://api.covid19api.com/summary'
            }
        },
        methods: {
            getStats() {
                axios.get(this.apiUrl)
                .then(response => {
                    this.stats = response.data;
                })
            },
        },
        computed: {
            countryStatistics: function() {
                return this.stats.Countries;
            }
        },
        mounted() {
            this.getStats();
        }
    }
</script>
