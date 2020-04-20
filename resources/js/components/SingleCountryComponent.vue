<template>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h5 class="card-title text-white">{{ countrySummaryStatistics.Country }}</h5>
                        <h6 class="card-subtitle mb-2 text-white">Total statistics</h6>

                        <!-- <span class="text-primary app-font pr-1">
                            <i class="fas fa-globe"></i>            
                        </span> -->
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <!--global confirmed cases-->
                        <label class="col-sm-6 col-form-label">   
                            <span class="text-danger app-font">
                                <i class="fas fa-head-side-mask"></i>            
                            </span> 
                            Total Confirmed Cases
                        </label>
                        <label class="col-sm-6 col-form-label">
                            {{countrySummaryStatistics.TotalConfirmed.toLocaleString()}}
                        </label>
                        <!--end global confirmed cases-->


                        <!--global deaths-->
                        <label class="col-sm-6 col-form-label">
                            <span class="text-dark app-font">
                                <i class="fas fa-skull-crossbones"></i>            
                            </span>
                            Total Deaths
                        </label>
                        <label class="col-sm-6 col-form-label">
                            {{countrySummaryStatistics.TotalDeaths.toLocaleString()}}
                        </label>
                        <!--end global deaths-->


                        <!--global recovered-->
                        <label class="col-sm-6 col-form-label">
                            <span class="text-success app-font">
                                <i class="fas fa-heartbeat"></i>            
                            </span>
                            Total Recovered
                        </label>
                        <label class="col-sm-6 col-form-label">
                            {{countrySummaryStatistics.TotalRecovered.toLocaleString()}}
                        </label>
                        <!--end global recored-->

                        <!--progress bar-->
                        <label class="col-sm-6 col-form-label">
                            Percentage recovered
                        </label>
                        <label class="col-sm-6 col-form-label">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" v-bind:style="{ width: percentage + '%'}" 
                                aria-valuemin="0" aria-valuemax="100" v-if="percentage">{{ percentage }}%</div>
                            </div>
                        </label>
                        <!--end progress bar-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                country: this.$route.params.country,
                countryTotalStatistics: [],
                countrySummaryStatistics: {},
                countryApiUrl: 'https://api.covid19api.com/total/country/',
                allDataUrl: 'https://api.covid19api.com/summary'
            }
        },
        methods: {
            getCountryData() {
                axios.get(this.countryApiUrl + this.country).then(response => {
                    this.countryTotalStatistics = response.data;
                })
            },
            getAllStatisticsData() {
                axios.get(this.allDataUrl).then(response => {
                    this.countrySummaryStatistics = response.data.Countries.find( ({ Slug }) => Slug === this.country );
                });
            }
        },
        created() {
            this.getCountryData();
            this.getAllStatisticsData();
        },
        computed: {
            percentage() {
                //progress bar
                return Math.round((this.countrySummaryStatistics.TotalRecovered * 100) / this.countrySummaryStatistics.TotalConfirmed);                   
            }
        },
    }
</script>
