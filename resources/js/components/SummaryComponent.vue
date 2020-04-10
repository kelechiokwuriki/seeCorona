<template>
    <!--start summary view-->
    <div class="card">
        <div class="card-header bg-dark">
            <h5 class="card-title text-white">Summary</h5>
            <h6 class="card-subtitle mb-2 text-white">Global statistics</h6>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <template v-if="summary">
                
                    <!--global confirmed cases-->
                    <label class="col-sm-6 col-form-label">
                        <p>Global Total Confirmed Cases</p>
                    </label>
                    <label class="col-sm-6 col-form-label">
                        {{summary.TotalConfirmed.toLocaleString()}}
                    </label>
                    <!--end global confirmed cases-->


                    <!--global deaths-->
                    <label class="col-sm-6 col-form-label">
                        <p>Global Total Deaths</p>
                    </label>
                    <label class="col-sm-6 col-form-label">
                        {{summary.TotalDeaths.toLocaleString()}}
                    </label>
                    <!--end global deaths-->


                    <!--global recovered-->
                    <label class="col-sm-6 col-form-label">
                        <p>Global Total Recovered</p>
                    </label>
                    <label class="col-sm-6 col-form-label">
                        {{summary.TotalRecovered.toLocaleString()}}
                    </label>
                    <!--end global recored-->


                    <!--progress bar-->
                        <label class="col-sm-6 col-form-label">
                            <p>Global recovered percentage</p>
                        </label>
                        <label class="col-sm-6 col-form-label">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" v-bind:style="{ width: percentage + '%'}" 
                                aria-valuemin="0" aria-valuemax="100" v-if="percentage">{{ percentage }}%</div>
                            </div>
                        </label>
                    <!--end progress bar-->

                </template>

                 <template v-else>
                    <p class="card-text">Loading data...</p>
                </template>
               
            </div>
        </div>
    </div>
    <!--end summary view-->
</template>

<script>
    export default {
        data() {
            return {}
        },
        props: {
            summary: {
                type: Object
            },
        },
        computed: {
            percentage() {
                //progress bar
                return Math.round((this.summary.TotalRecovered * 100) / this.summary.TotalConfirmed);                   
            }
        },
    }
</script>
