<template>
    <div>
        <div class="container-fluid mt-4" v-if="statistics !== null && error === null">
            <div class="row">
                <div class="col-sm-4">
                    <!--start summary view-->
                    <Summary :summary="statistics.Global"></Summary>
                    <!--end summary view-->

                    <!-- news view-->
                    <Subscribe :countries="statistics.Countries"></Subscribe>
                    <!--end news view-->
                </div>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h5 class="card-title text-white">Countries</h5>
                            <h6 class="card-subtitle mb-2 text-white">
                            <span class="text-primary app-font pr-1">
                                <i class="fas fa-flag"></i>                        
                            </span>Statistics by countries</h6>
                        </div>
                        <div class="card-body">
                            <div id="data-table_wrapper" class="dataTables_wrapper no-footer">
                                <table id="countryTable" class="table display table-hover text-center" style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Country</th>
                                            <th scope="col">Cases</th>
                                            <th scope="col">Deaths</th>
                                            <th scope="col">Recovered</th>
                                            <th scope="col" class="d-none d-sm-none d-md-block d-sm-block">Updated</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="stat in statistics.Countries">
                                            <td><router-link :to="{ name:'countries', params:{ country: stat.Slug } }">{{ stat.Country }}</router-link></td>
                                            <td>{{ stat.TotalConfirmed.toLocaleString() }}</td>
                                            <td>{{ stat.TotalDeaths.toLocaleString() }}</td>
                                            <td>{{ stat.TotalRecovered.toLocaleString() }}</td>
                                            <td class="d-none d-sm-none d-md-block d-sm-block">{{ moment(stat.Date).format('MMMM Do YYYY, h:mm:ss a') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron jumbotron-fluid" v-if="error">
            <div class="container">
                <h1 class="display-4">Unable to retrieve data <i class="fas fa-times"></i></h1>
                <p class="lead"><button class="btn btn-primary btn-lg" @click="refresh">Refresh</button></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                statistics: null,
                error: null,
                cacheDataTimeToLiveInMinutes: 15, //15 minutes
                apiUrl: 'https://api.covid19api.com/summary'
            }
        },
        methods: {
            refresh() {
                this.error = null;
                this.getStats();
            },
            isStatisticsObjEmpty(obj) {
                 for(var i in obj); return !i; 
            },
            moment(date) {
                return moment(date);
            },
            getDataFromCache() {
                try {
                    let cacheObject = JSON.parse(localStorage.getItem("stats"));
                    let cacheTime = cacheObject.timeStamp;
                    let now = moment();
                    let minutesElapsed = moment(now.diff(cacheTime)).format("m")
                
                    //10 minutes elapsed, get new data
                    if(minutesElapsed >= this.cacheDataTimeToLiveInMinutes) {
                        localStorage.removeItem('stats');
                        this.getStats();
                    } else {
                        this.statistics = cacheObject.statsValue;
                        //best method to reactivate datatable
                        setTimeout(function(){
                            $('#countryTable').DataTable({
                                // "ordering": [[2, "desc"]],
                                // stateSave: true,
                                "aaSorting": [[1, "desc"]],
                                pageLength: 10,
                                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Everything']]
                            });
                        },);
                    }
                } catch(e) {
                    //assume data is corrupted so remove and get new one
                    localStorage.removeItem('stats');
                    this.getStats();
                }    
            },
            getStats() {
                axios.get(this.apiUrl)
                .then(response => {
                    this.statistics = response.data;
                    const object = {statsValue: this.statistics, timeStamp: moment()}
                    const parsed = JSON.stringify(object);
                    localStorage.setItem('stats', parsed);

                }).catch(error => {
                    this.error = error;
                }).finally(() => {
                    $('#countryTable').DataTable({
                        // "ordering": [[2, "desc"]],
                        // stateSave: true,
                        "aaSorting": [[1, "desc"]],
                        pageLength: 10,
                        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Everything']]
                    });
                })
            }
        },
        created() {
            // this.getStats();
            if (localStorage.getItem('stats')) {
                let data = JSON.parse(localStorage.getItem("stats"));
                if(data.statsValue === '') {
                    localStorage.removeItem('stats');
                    this.getStats();

                } else{
                    this.getDataFromCache();
                }
            } else{
                this.getStats();
            }
        }
    }
</script>
