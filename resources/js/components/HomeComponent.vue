<template>
    <div class="container-fluid mt-4">
        <div class="row">
           <div class="col-sm-4">
               <!--start summary view-->
               <summary-component></summary-component>
               <!--end summary view-->
           </div>
           <div class="col-sm-8">
               <div class="card">
                    <div class="card-header bg-dark">
                        <h5 class="card-title">Countries</h5>
                        <h6 class="card-subtitle mb-2 text-white">Statistics by countries</h6>
                    </div>
                   <div class="card-body">
                       <div class="card">
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
