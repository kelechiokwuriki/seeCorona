<template>
<div class="mt-4 mb-4">
    <!--start summary view-->
    <div class="card">
        <div class="card-header bg-dark">
            <h5 class="card-title text-white">Top COVID-19 news headlines</h5>
            <h6 class="card-subtitle mb-2 text-white">
            Powered by
            <a href="https://newsapi.org/">NewsApi.org</a></h6>
        </div>
        <div class="card-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://www.investors.com/wp-content/uploads/2017/06/SMT_Nasdaq_061917.jpg" 
                        width="500" height="300" alt="First slide">

                        <div class="carousel-caption d-none d-md-block">
                            <h5>News header</h5>
                            <p>News news news talk</p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" 
                        src="https://i.guim.co.uk/img/media/0fc570ecb9060b34f7d506f6669a45776748c0a9/0_54_3500_2100/master/3500.jpg?width=1200&height=630&quality=85&auto=format&fit=crop&overlay-align=bottom%2Cleft&overlay-width=100p&overlay-base64=L2ltZy9zdGF0aWMvb3ZlcmxheXMvdGctZGVmYXVsdC5wbmc&enable=upscale&s=4f738f8150ae1b713b4c488acd2bd434" 
                        width="500" height="300"
                        alt="Second slide">

                        <div class="carousel-caption d-none d-md-block">
                            <h5>News header</h5>
                            <p>News news news talk</p>
                        </div>
                    </div>

                    <div class="carousel-item">
                       <img class="d-block w-100" 
                        src="https://cnet4.cbsistatic.com/img/M6zvwkuDNEd3Ci-CctKGf0spZ6s=/756x567/2020/04/10/17e5f10a-7257-4ce9-ab1a-4924331dbd7c/20200410-152005.jpg" 
                        width="500" height="300"
                        alt="Third slide">

                        <div class="carousel-caption d-none d-md-block">
                            <h5>News header</h5>
                            <p>News news news talk</p>
                        </div>
                    </div>
                    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>    
        </div>
    </div>
</div>
    <!--end summary view-->
</template>

<script>
    export default {
        data() {
            return {
                country: 'us',
                url: 'https://newsapi.org/v2/top-headlines?country=us&q=covid-19&apiKey=4c0d7485378847aa8e2ad83b259e452f'
            }
        },
        methods: {
           getTopNewsHeadlines() {
               axios.get(this.url, {mode:'no-cors'}).then(response => {
                   console.log(response);
               })
           } 
        },
        created() {
            this.getTopNewsHeadlines();
        },
    }
</script>
