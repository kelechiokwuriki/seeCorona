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
                    :class="errors.subscriptionCountryClass"
                    :options="countries"
                    @input="country => updateSubscriptionCountry(country)"
                    :value="countries.Country" required/>

                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Did you forget to select your country?
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" v-model="subscription.email" :class="[emailClass, errors.subscriptionEmailClass]" 
                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        That doesn't look right...
                    </div>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" @click="submitSubscription">Subscribe</button>
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
                subscribed: false,
                subscriptionApiUrl: '/api/subscription',
                reg: /[a-z0-9]+([-+._][a-z0-9]+){0,2}@.*?(\.(a(?:[cdefgilmnoqrstuwxz]|ero|(?:rp|si)a)|b(?:[abdefghijmnorstvwyz]iz)|c(?:[acdfghiklmnoruvxyz]|at|o(?:m|op))|d[ejkmoz]|e(?:[ceghrstu]|du)|f[ijkmor]|g(?:[abdefghilmnpqrstuwy]|ov)|h[kmnrtu]|i(?:[delmnoqrst]|n(?:fo|t))|j(?:[emop]|obs)|k[eghimnprwyz]|l[abcikrstuvy]|m(?:[acdeghklmnopqrstuvwxyz]|il|obi|useum)|n(?:[acefgilopruz]|ame|et)|o(?:m|rg)|p(?:[aefghklmnrstwy]|ro)|qa|r[eosuw]|s[abcdeghijklmnortuvyz]|t(?:[cdfghjklmnoprtvwz]|(?:rav)?el)|u[agkmsyz]|v[aceginu]|w[fs]|y[etu]|z[amw])\b){1,2}/,
                subscription: {
                    country: '',
                    email: ''
                },
                errors: {
                    subscriptionEmailClass: '',
                    subscriptionCountryClass: ''
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
            updateSubscriptionCountry(country) {
                this.errors.subscriptionCountryClass = this.emailValid;
                let obj = JSON.stringify(country);
                this.subscription.country = country.Country;
            },
            checkEmail(emailString) {
                return (this.reg.test(emailString)) ? true : false;
            },
            isSubscriptionDataValid(subObject) {
                //adding a break causes only the first case to be evaluated
                //weird
                switch (true) {
                    case (subObject.country === ''):
                        this.errors.subscriptionCountryClass = this.emailInvalid;

                    case (subObject.email === ''):
                        this.errors.subscriptionEmailClass = this.emailInvalid;

                    default:
                        break;
                }

                //if there's any error between them, just return false
                if(this.errors.subscriptionCountryClass === '' || this.errors.subscriptionEmailClass === '') return true ?? false;
            },
            submitSubscription(e) {
                e.preventDefault();

                if(!this.isSubscriptionDataValid(this.subscription)) return;

                axios.post(this.subscriptionApiUrl, this.subscription).then(response => {
                    console.log(response);
                })
            }
        },
        computed: {
            emailClass() {
                if(this.subscription.email.length > 1) {
                    this.errors.subscriptionEmailClass = ''; 
                    return this.checkEmail(this.subscription.email) ? this.emailValid : this.emailInvalid;
                }
            }
        },
        created() {
            this.checkEmail();
        },
    }
</script>
