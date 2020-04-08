<template>
    <div class="container-fluid">
        <div class="row">
           <div class="col-sm-4">
               <div class="card">
                   <div class="card-body">
                       <h5 class="card-title">Summary</h5>
                       <h6 class="card-subtitle">Global statistics</h6>
                       <div class="form-group row">
                           <div class="col-sm-6 col-form-label">
                               <p>New Global Confirmed Cases</p>
                           </div>
                           <div class="col-sm-6 col-form-label">
                               {{summary.Global.NewConfirmed}}
                           </div>

                       </div>
                   </div>
               </div>
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
                summary: [],
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
            getSummaryOfCovid19Stats() {
                axios.get(this.apiUrl + 'summary')
                .then(response => {
                    this.summary = response.data;
                })
            }
        },
        mounted() {
            this.getStats();
            this.getSummaryOfCovid19Stats();
        }
    }
</script>
