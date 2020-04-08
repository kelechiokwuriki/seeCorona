<template>
    <!--start summary view-->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Summary</h5>
            <h6 class="card-subtitle">Global statistics</h6>
            <div class="form-group row">
                <div class="col-sm-6 col-form-label">
                    <p>Global Total Confirmed Cases</p>
                </div>
                <div class="col-sm-6 col-form-label">
                    {{summary.Global.TotalConfirmed}}
                </div>

                <div class="col-sm-6 col-form-label">
                    <p>Global Total Deaths</p>
                </div>
                <div class="col-sm-6 col-form-label">
                    {{summary.Global.TotalDeaths}}
                </div>

                <div class="col-sm-6 col-form-label">
                    <p>Global Total Recovered</p>
                </div>
                <div class="col-sm-6 col-form-label">
                    {{summary.Global.TotalRecovered}}
                </div>

            </div>
        </div>
    </div>
    <!--end summary view-->
</template>

<script>
    export default {
        data() {
            return{
                summary: [],
                apiUrl: 'https://api.covid19api.com/summary'
            }
        },
        methods: {
            getSummaryOfCovid19Stats() {
                axios.get(this.apiUrl + 'summary')
                .then(response => {
                    this.summary = response.data;
                })
            }
        },
        mounted() {
            this.getSummaryOfCovid19Stats();
        }
    }
</script>
