<template>
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
                                <tr v-for="stat in countryStatistics">
                                    <td>{{ stat.Country }}</td>
                                    <td>{{ stat.TotalConfirmed }}</td>
                                    <td>{{ stat.TotalDeaths }}</td>
                                    <td>{{ stat.TotalRecovered }}</td>
                                    <td>{{ stat.Date }}</td>
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
                countryStatistics: [],
                apiUrl: 'https://api.covid19api.com/summary'
            }
        },
        methods: {
            getStats() {
                axios.get(this.apiUrl)
                .then(response => {
                    this.countryStatistics = response.data.Countries;
                }).finally(() => {
                    $(document).ready(function () {
                        var table = $('#countryTable').DataTable({
                            "ordering": true,
                            "aaSorting": [],
                            stateSave: true,
                            pageLength: 10,
                            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Everything']]
                        });
                    });
                })
            },
        },
        created() {
            this.getStats();
        }
    }
</script>