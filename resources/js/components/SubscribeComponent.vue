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
                    <input type="email" v-model="subscribtion.email" :class="emailClass" 
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
                reg: /[a-z0-9]+([-+._][a-z0-9]+){0,2}@.*?(\.(a(?:[cdefgilmnoqrstuwxz]|ero|(?:rp|si)a)|b(?:[abdefghijmnorstvwyz]iz)|c(?:[acdfghiklmnoruvxyz]|at|o(?:m|op))|d[ejkmoz]|e(?:[ceghrstu]|du)|f[ijkmor]|g(?:[abdefghilmnpqrstuwy]|ov)|h[kmnrtu]|i(?:[delmnoqrst]|n(?:fo|t))|j(?:[emop]|obs)|k[eghimnprwyz]|l[abcikrstuvy]|m(?:[acdeghklmnopqrstuvwxyz]|il|obi|useum)|n(?:[acefgilopruz]|ame|et)|o(?:m|rg)|p(?:[aefghklmnrstwy]|ro)|qa|r[eosuw]|s[abcdeghijklmnortuvyz]|t(?:[cdfghjklmnoprtvwz]|(?:rav)?el)|u[agkmsyz]|v[aceginu]|w[fs]|y[etu]|z[amw])\b){1,2}/,
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
            emailClass() {
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
