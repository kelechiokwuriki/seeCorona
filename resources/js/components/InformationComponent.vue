<template>
    <div class="container mt-4">
        <h5>Sources: 
            <span>
                <a href="https://www.who.int/health-topics/coronavirus#tab=tab_1" target="__blank">World Health Organization</a>
                <a href="https://www.nhs.uk/conditions/coronavirus-covid-19/" target="__blank">National Health Service U.K</a>
            </span>
        </h5>
        <div class="card information-card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Prevention</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Symptoms</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <p>Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.</p>

                        <p>Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and 
                            recover without requiring special treatment.  
                            Older people, and those with underlying medical problems like cardiovascular disease, diabetes, 
                            chronic respiratory disease, and cancer are more likely to develop serious illness.</p>

                        <p>The best way to prevent and slow down transmission is be well informed about the COVID-19 virus, 
                            the disease it causes and how it spreads. Protect yourself and others from infection by washing 
                            your hands or using an alcohol based rub frequently and not touching your face.</p>

                        <p>The COVID-19 virus spreads primarily through droplets of saliva or discharge from the nose when an 
                            infected person coughs or sneezes, so it’s important that you also practice respiratory etiquette (for example, by coughing into a flexed elbow).
                            At this time, there are no specific vaccines or treatments for COVID-19. 
                            However, there are many ongoing clinical trials evaluating potential treatments. 
                            WHO will continue to provide updated information as soon as clinical findings become available.</p>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <p>To prevent infection and to slow transmission of COVID-19, do the following:</p>
                        
                        <ul>
                            <li>Wash your hands with soap and water often – do this for at least 20 seconds.</li>
                            <li>Maintain a distance of 2 metres from anyone outside of your household.</li>
                            <li>Wash your hands as soon as you get home.</li>
                            <li>Cover your mouth and nose with a tissue or your sleeve (not your hands) when you cough or sneeze.</li>  
                            <li>Put used tissues in the bin immediately and wash your hands afterwards.</li>
                            <li>Stay home if you feel unwell.</li>
                            <li>Refrain from smoking and other activities that weaken the lungs.</li>       
                        </ul>
                    </div>

                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <p>The COVID-19 virus affects different people in different ways.  COVID-19 is a respiratory disease and most 
                        infected people will develop mild to moderate symptoms and recover without requiring special treatment.  
                        People who have underlying medical conditions and those over 60 years old have a 
                        higher risk of developing severe disease and death.</p>

                        <ul>
                            <li>Fever.</li>
                            <li>Dry cough.</li>
                            <li>Tiredness.</li>
                        </ul>

                        <p>Other symptoms include:</p>

                        <ul>
                            <li>Shortness of breath.</li>
                            <li>Aches and pains.</li>
                            <li>Sore throat.</li>
                            <li>Very few people report diarrhoea, nausea or a runny nose.</li>
                        </ul>

                        <p class="text-danger">People with mild symptoms who are otherwise healthy should self-isolate and 
                        contact their medical provider or a COVID-19 information line for advice on testing and referral.</p>

                        <p class="text-danger">People with fever, cough or difficulty breathing should call their doctor and seek medical attention.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </transition> -->
</template>

<script>
    export default {
        data() {
            return {}
        }
    }
</script>

<style>

</style>
