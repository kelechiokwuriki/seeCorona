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
                            <label class="col-sm-6 col-form-label" v-if="countrySummaryStatistics.TotalConfirmed">
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
                            <label class="col-sm-6 col-form-label" v-if="countrySummaryStatistics.TotalDeaths">
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
                            <label class="col-sm-6 col-form-label" v-if="countrySummaryStatistics.TotalRecovered">
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
                <!--start chart-->
                <line-chart :data="chartData" />
                <!--end chart-->
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
                chartData: [],
                countryApiUrl: 'https://api.covid19api.com/total/country/',
                allDataUrl: 'https://api.covid19api.com/summary'
            }
        },
        methods: {
            moment(date) {
                return moment(date);
            },
            getCountryData() {
                axios.get(this.countryApiUrl + this.country).then(response => {
                    this.countryTotalStatistics = response.data;

                    this.transformDataForChart();

                })
            },
            getAllStatisticsData() {
                axios.get(this.allDataUrl).then(response => {
                    //get the country object matching the slug from the url
                    this.countrySummaryStatistics = response.data.Countries.find( ({ Slug }) => Slug === this.country );
                });
            },
            //country total stats data is an array of objects
            //using forEeach inbuilt method to loop an array
            //each item is an object so loop through each object as well,
            //perform data formatting for chart, format below
            // {name: '', data: {'2017-01-01 00:00:00 -0800': 3}}
            transformDataForChart() {
                let confirmedObj = {};
                let deathsObj = {};
                let recoveredObj = {};

                let tempArr = this.countryTotalStatistics;

                tempArr.forEach(function (countryObject) {
                    for(const key in countryObject) {
                        if(countryObject.hasOwnProperty(key)) {
                            let dateFormatted = moment(countryObject['Date']).format('YYYY-MM-DD');

                            if(key === 'Confirmed') {
                                confirmedObj[dateFormatted] = countryObject[key];
                            }
                            if(key === 'Deaths') {
                                deathsObj[dateFormatted] = countryObject[key];
                            }
                            if(key === 'Recovered') {
                                recoveredObj[dateFormatted] = countryObject[key];
                            }
                        }
                    }
                });

                this.chartData.push( {name:'Cases', data: confirmedObj} );
                this.chartData.push( {name: 'Deaths', data: deathsObj} );
                this.chartData.push( {name: 'Recovered', data: recoveredObj} );
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
