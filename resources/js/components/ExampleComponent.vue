<template>
    <div class="container-fluid">
        <div class="row">
           <div class="col-sm-4">
               <div class="card">

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
                apiUrl: 'https://api.covid19api.com/'
            }
        },
        methods: {
            getStats() {
                axios.get(this.apiUrl)
                .then(response => {
                    this.stats = response.data;
                })
            }
        },

        mounted() {
            this.getStats();
        }
    }
</script>
