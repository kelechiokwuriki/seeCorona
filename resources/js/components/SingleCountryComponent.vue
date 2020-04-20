<template>
    <div class="container mt-4">

    </div>
</template>

<script>
    export default {
        data() {
            return {
                country: this.$route.params.country,
                statistics: [],
                apiUrl: 'https://api.covid19api.com/total/country/'
            }
        },
        methods: {
            getCountryData() {
                axios.get(this.apiUrl + this.country).then(response => {
                    console.log(response.data);
                })
            }
        },
        created() {

        }
    }
</script>
