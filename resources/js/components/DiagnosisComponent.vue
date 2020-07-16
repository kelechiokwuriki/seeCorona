<template>
    <div class="container mt-4">
        <div class="card information-card">
            <div class="card-header">
                COVID-19 Diagnosis
            </div>
            <div class="card-body">
                <form>
                    <template v-if="currentStep === 1">

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label>What is your Gender?</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" v-model="person.sex" name="inlineRadioOptions" id="maleGender" value="male">
                                    <label class="form-check-label" for="maleGender">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" v-model="person.sex" name="inlineRadioOptions" id="femaleGender" value="female">
                                    <label class="form-check-label" for="femaleGender">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label>What is your Age?</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" v-model.number="person.age"/>
                            </div>
                        </div>

                    </template>
                    <template v-if="currentStep === 2">
                        <h4>{{ question.text }}</h4>
                        <div v-for="(item, index) in question.items" v-bind:key="index">
                            <div class="form-group mt-4 row">
                                <h6 class="col">{{ item.name }}</h6>
                                <div class="col">
                                    <template v-for="(choice, index) in item.choices">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" :name="item.id" :id="choice.id" :value="choice.id"
                                            @click="selectAnswer(choice.id, item.id)">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    {{ choice.label }}
                                                </label>
                                        </div>
                                    </template>
                                </div>

                            </div>
                        </div>

                    </template>

                    <button type="button" class="btn btn-success" @click="nextStep">Next</button>

                </form>
            </div>
        </div>


    </div>
    <!-- </transition> -->
</template>

<script>
    export default {
        data() {
            return {
                person: {
                    sex: null,
                    age: null,
                    evidence: []
                },
                question: [],
                currentStep: 1,
                api: 'https://api.infermedica.com/covid19/diagnosis',
                appId: '92b36903',
                appKey: 'aa20be635bc40b4b523c613ae5328038'

            }
        },
        watch: {
            question: {
                deep: true,
                handler(question) {
                    // console.log(question.items);

                }
            }
        },
        methods: {
            selectAnswer(choiceId, choiceAnswer) {
                let answer = {
                    'id': choiceId,
                    'choice_id': choiceAnswer
                };

                this.person.evidence.push(answer);
            },
            nextStep() {

                if(this.currentStep === 1) {
                    this.fireFirstRequest();
                }

                if(this.currentStep === 2) {
                    this.fireSecondRequest();
                }

            },

            fireFirstRequest() {
                axios.post(this.api, this.person, {
                    headers: {
                        'App-Id': this.appId,
                        'App-Key': this.appKey
                    }
                }).then(response => {
                    this.question = response.data.question;

                    this.currentStep++;

                    console.log(response.data);
                })
            },
            fireSecondRequest() {

                axios.post(this.api, this.person)
            }
        },
    }
</script>

<style>

</style>
