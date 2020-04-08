<template>
    <div class="container-fluid m-4">
        <div class="row">
           <div class="col-sm-4">
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
               <summary-component></summary-component>
               <!--end summary view-->
           </div>
           <div class="col-sm-8">
               tables
           </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                stats: [],
                apiUrl: 'https://api.covid19api.com/'
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
        mounted() {
            this.getStats();
        }
    }
</script>
