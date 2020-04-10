<template>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-sm-4">
                <!--start summary view-->
                    <Summary :summary="statistics.Global"></Summary>
                <!--end summary view-->
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h5 class="card-title text-white">Countries</h5>
                        <h6 class="card-subtitle mb-2 text-white">Statistics by countries</h6>
                    </div>
                    <div id="data-table_wrapper" class="dataTables_wrapper p-3 no-footer">
                        <table id="countryTable" class="table display table-hover" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Country</th>
                                    <th scope="col">Total Confirmed Cases</th>
                                    <th scope="col">Total Deaths</th>
                                    <th scope="col">Total Recovered</th>
                                    <th scope="col">Date Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="stat in statistics.Countries">
                                    <td>{{ stat.Country }}</td>
                                    <td>{{ stat.TotalConfirmed.toLocaleString() }}</td>
                                    <td>{{ stat.TotalDeaths.toLocaleString() }}</td>
                                    <td>{{ stat.TotalRecovered.toLocaleString() }}</td>
                                    <td>{{ moment(stat.Date).format('MMMM Do YYYY, h:mm:ss a') }}</td>
                                </tr>
                            </tbody>
                        </table>
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
                statistics: [],
                timeForCacheDataToExpire: 10, //5 minutes
                apiUrl: 'https://api.covid19api.com/summary'
            }
        },
        methods: {
            moment(date) {
                return moment(date);
            },
            getStats() {
                axios.get(this.apiUrl)
                .then(response => {
                    this.statistics = response.data;
                    const object = {statsValue: this.statistics, timeStamp: moment()}
                    const parsed = JSON.stringify(object);
                    localStorage.setItem('stats', parsed);

                }).finally(() => {
                        $('#countryTable').DataTable({
                            "ordering": true,
                            "aaSorting": [],
                            stateSave: true,
                            pageLength: 10,
                            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Everything']]
                        });
                })
            },
        },
        created() {
            // this.getStats();
            if (!localStorage.getItem('stats')) {
                this.getStats();
            }
            try {
                let cacheObject = JSON.parse(localStorage.getItem("stats"));
                let cacheTime = cacheObject.timeStamp;
                let now = moment();
                let tell = moment(now.diff(cacheTime)).format("m")
            
                //10 minutes elapsed, get new data
                if(tell >= this.timeForCacheDataToExpire) {
                    console.log('new');
                    localStorage.removeItem('stats');
                    this.getStats();
                } else {
                    console.log('old');
                    this.statistics = cacheObject.statsValue;
                    //best method to reactivate datatable
                    setTimeout(function(){
                        $('#countryTable').DataTable({
                            "ordering": true,
                            "aaSorting": [],
                            stateSave: true,
                            pageLength: 10,
                            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Everything']]
                        });
                    },);
                }
            } catch(e) {
                localStorage.removeItem('stats');
            }    
        }
    }
</script>
