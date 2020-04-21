<template>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Are you lost? <i class="fas fa-meh-rolling-eyes"></i></h1>
                <p class="lead"><button class="btn btn-primary btn-lg" @click="goToHome">Please help me</button></p>
            </div>
        </div>

</template>

<script>
    export default {
        data() {
            return{
         
            }
        },
        methods: {
            goToHome() {
                window.location.replace('/');
            }
        }
    }
</script>
