<template>
    <div class="container mt-4">
        <div class="card information-card">
            <div class="card-header text-white bg-dark">
                <h5 class="card-title">COVID-19 Diagnosis</h5>
                <h6 class="card-subtitle mb-2">Powered by <a href="https://developer.infermedica.com/" target="_blank">Infermedica</a></h6>
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
                        <div v-for="(item, index) in questions" v-bind:key="index">

                            <h4>{{ item.text }}</h4>

                            <div class="form-group mt-4 row" v-for="(itemToSee, index) in item.items" v-bind:key="index">
                                <h6 class="col">{{ itemToSee.name }}</h6>

                                <div class="col">
                                    <div class="form-check form-check-inline" v-for="(choice, index) in itemToSee.choices" v-bind:key="index">

                                        <!--render if not group_single-->
                                        <template v-if="item.type === 'group_multiple' || item.type === 'single'">
                                            <input class="form-check-input" type="radio" :name="itemToSee.id" :id="choice.id" :value="choice.id"
                                            @click="selectAnswer(itemToSee.id, choice.id)">

                                            <label class="form-check-label" for="defaultCheck1">
                                                {{ choice.label }}
                                            </label>
                                        </template>
                                        <!--end render if not group single-->

                                        <!--render for single selection-->
                                        <template v-if="item.type === 'group_single'">
                                            <input class="form-check-input" type="radio" name="singleRadio" :id="choice.id" :value="choice.id"
                                            @click="selectAnswer(itemToSee.id, choice.id, item.type)">

                                            <label class="form-check-label" for="defaultCheck1">
                                                {{ choice.label }}
                                            </label>
                                        </template>
                                        <!--end render for single selection-->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </template>

                    <template v-if="currentStep === 3">
                        <h4 v-bind:key="0">{{ triageResponse.description }}</h4>
                        <h5 v-bind:key="1">{{ triageResponse.label }}</h5>

                        <table class="table table-hover" v-bind:key="2">
                            <thead>
                                <tr>
                                <th scope="col">Symptom</th>
                                <th scope="col">Seriousness</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in triageResponse.serious" v-bind:key="index">
                                    <td :class="{ 'text-danger': item.is_emergency }">{{ item.name }}</td>
                                    <td>
                                        <span class="text-danger" v-if="item.is_emergency">Emergency</span>
                                        <span v-if="!item.is_emergency">Not an emergency</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </template>
                </form>

                <button type="button" class="btn btn-secondary" @click="nextStep" v-if="currentStep !== 3">Next</button>
                <button type="button" class="btn btn-success" @click="reloadPage" v-if="currentStep === 3">Redo diagnosis</button>

            </div>
        </div>


    </div>
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
                triageResponse: {},
                questions: [],
                currentStep: 1,
                api: 'https://api.infermedica.com/covid19/',
                diagnosisEndPoint: 'diagnosis',
                triageEndPoint: 'triage',
                appId: '92b36903',
                appKey: 'aa20be635bc40b4b523c613ae5328038'

            }
        },
        watch: {
            questions: {
                deep: true,
                handler(questions) {
                    // console.log(question.items);

                }
            }
        },
        methods: {
            reloadPage() {
                location.reload();
            },
            selectAnswer(choiceId, choiceAnswer, questionType) {
                let answer = {
                    'id': choiceId,
                    'choice_id': choiceAnswer
                };

                if(questionType === 'group_single') {
                    this.person.evidence = [];
                    return this.person.evidence.push(answer);
                }

                return this.person.evidence.push(answer);
            },
            nextStep() {

                if(this.currentStep === 1) {
                    this.fireFirstRequest();
                }

                if(this.currentStep === 2) {
                    this.fireSecondRequest();
                }

            },
            triageRequest() {
                axios.post(this.api + this.triageEndPoint, this.person, {
                    headers: {
                        'App-Id': this.appId,
                        'App-Key': this.appKey
                    }
                }).then(response => {
                    this.triageResponse = response.data;
                    console.log(response.data);
                })
            },
            fireFirstRequest() {
                axios.post(this.api + this.diagnosisEndPoint, this.person, {
                    headers: {
                        'App-Id': this.appId,
                        'App-Key': this.appKey
                    }
                }).then(response => {
                    this.questions.push(response.data.question);

                    this.currentStep++;

                    console.log(response.data);
                })
            },
            fireSecondRequest() {
                axios.post(this.api + this.diagnosisEndPoint, this.person, {
                    headers: {
                        'App-Id': this.appId,
                        'App-Key': this.appKey
                    }
                }).then(response => {
                    console.log(response.data);

                    if(response.data.should_stop === true) {
                        this.triageRequest();

                        return this.currentStep = 3;
                    }

                    this.questions.push(response.data.question);

                    this.currentStep = 2;

                })
            }
        },
    }
</script>

<style scoped>

</style>
