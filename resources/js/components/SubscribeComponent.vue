<template>
<div class="mt-4 mb-4">
    <!--start summary view-->
    <div class="card">
        <div class="card-header bg-dark">
            <h5 class="card-title text-white">Subscribe for daily notification</h5>
            <h6 class="card-subtitle mb-2 text-white">
                <span class="text-primary app-font">
                    <i class="fas fa-bell"></i>                        
                </span> Select your country to get notified</h6>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Country</label>
                    <v-select
                    label="Country"
                    :options="countries"
                    :value="countries.country" required/>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" v-model="subscribtion.email" :class="isEmailInvalid" 
                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                    <div class="valid-feedback">
                        Looks good
                    </div>
                    <div class="invalid-feedback">
                        That doesn't look right
                    </div>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <!--end summary view-->
</template>

<script>
    export default {
        data() {
            return {
                reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
                subscribtion: {
                    country: '',
                    email: ''
                },
                emailInvalid: 'is-invalid',
                emailValid: 'is-valid',
            }
        },
        props:{
            countries: {
                type: Array
            },
        },
        methods: {
            checkEmail(emailString) {
                return (this.reg.test(emailString)) ? true : false;
            } 
        },
        computed: {
            isEmailInvalid() {
                if(this.subscribtion.email.length > 1) {
                    return this.checkEmail(this.subscribtion.email) ? this.emailValid : this.emailInvalid;
                }
            }
        },
        created() {
            this.checkEmail();
        },
    }
</script>
