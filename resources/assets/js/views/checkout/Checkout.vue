<template>
    <div class="checkout is-open">
        <nav class="nav nav-dashboard">

            <div class="nav-left">
                <div class="nav-item">
                    <span class="icon is-3 is-sans-serif">
                        <i class="fa fa-user-circle"></i>
                        Checkout
                    </span>
                </div>
            </div>

            <div class="nav-center">
                <div class="nav-item">
                </div>
            </div>

            <div class="nav-right">
                <div class="nav-item">

                </div>
            </div>

        </nav>


        <div v-show="! Checkout.paymentSuccess" class="container is-full">
            <div class="columns is-full">
                <div class="column has-text-centered">

                    <div class="columns center-column is-multiline">
                        <div class="column">
                            <h1 class="subtitle is-3 is-sans-serif is-underlined">
                                Selected Ticket
                            </h1>
                        </div>
                    </div>

                </div>
                <div class="column has-text-centered">

                    <div class="columns center-column is-multiline">
                        <div class="column">
                            <h1 class="subtitle is-3 is-sans-serif is-underlined">
                                Payment Information
                            </h1>
                        </div>

                        <div class="column">

                            <form id="checkout-form" class="form" method="post" action="/api/payment">

                                <input type="hidden" name="_token" :value="data.csrfToken">

                                <p class="control has-icon has-icon-right">
                                    <input
                                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                                            v-model="form.number" type="text" maxlength="16" name="number" class="input is-medium" placeholder="Card Number"
                                            data-stripe="number"
                                            :class="{ 'is-danger' : ! $v.form.number.minLength, 'is-success' : $v.form.number.minLength, 'is-disabled' : Checkout.paymentProcessing }"
                                    >
                                    <i v-show="! $v.form.number.minLength" class="fa fa-warning"></i>
                                    <i v-show="! $v.form.number.$invalid" class="fa fa-check-circle-o fa-2x"></i>
                                    <span v-show="! $v.form.number.minLength" class="help is-danger">Please enter your 16-digit card number</span>
                                </p>

                                <p class="control has-addons has-addons-fullwidth">

                                    <input
                                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                                            v-model="form.exp.month" maxlength="2" size="2" class="input is-inline is-medium" type="text" name="month" placeholder="Month"
                                            data-stripe="exp_month"
                                            :class="{ 'is-danger' : ! $v.form.exp.month.minLength, 'is-disabled' : Checkout.paymentProcessing }"
                                    >
                                    <!--<span v-show="! $v.form.exp.month.minLength" class="help is-danger">and your expiration date, please</span>-->


                                    <input
                                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                                            v-model="form.exp.year" maxlength="2" size="2" class="input is-inline is-medium" type="text" name="year" placeholder="Yr"
                                            data-stripe="exp_year"
                                            :class="{ 'is-danger' : ! $v.form.exp.year.minLength, 'is-disabled' : Checkout.paymentProcessing }"
                                    >
                                    <!--<span v-show="! $v.form.exp.year.minLength" class="help is-danger">and your expiration date, please</span>-->


                                    <input
                                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                                            v-model="form.cvc" maxlength="3" size="3" class="input is-inline is-medium" type="text" name="cvc" placeholder="CVC"
                                            data-stripe="cvc"
                                            :class="{ 'is-danger' : ! $v.form.cvc.minLength, 'is-disabled' : Checkout.paymentProcessing }"
                                    >
                                    <!--<span v-show="! $v.form.cvc.minLength" class="help is-danger">and your CVC code on the back, please</span>-->
                                </p>
                                <p class="control">
                                    <input
                                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                                            v-model="form.zip" type="text" name="zip" size="9" maxlength="5" class="input is-inline is-medium" placeholder="Zip Code"
                                            data-stripe="address_zip"
                                            :class="{ 'is-danger' : ! $v.form.zip.minLength, 'is-disabled' : Checkout.paymentProcessing }"
                                    >
                                    <span v-show="! $v.form.zip.minLength" class="help is-danger">Please enter your billing Zip Code</span>
                                </p>
                                <p class="control center">
                                    <button @click.prevent="buy()" class="button is-primary is-large submit" :class="{ 'is-disabled' : $v.form.$invalid, 'is-loading' : Checkout.paymentProcessing }">
                                        <span class="icon"><i class="fa fa-lock"></i></span>
                                        <span>Buy</span>
                                    </button>
                                </p>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <transition name="bounce-up">
            <div v-show="Checkout.paymentSuccess" class="container is-full">
                <div class="columns is-full center-column">
                    <div class="column has-text-centered">
                        <h1 class="title is-3 is-sans-serif">
                            Payment Success!
                        </h1>
                        <button class="button is-large is-primary is-sans-serif">
                            Go to ticket
                        </button>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    import Checkout from "../../data/Checkout";
    import data from "../../data/data";

    import { required, email, minLength } from 'vuelidate/lib/validators'

    export default {

        data() {
            return {
                data,
                Checkout,
                form: {
                    email: 'cjameshill@gmail.com',
                    number: '',
                    exp: {
                        month: '',
                        year: ''
                    },
                    cvc: '',
                    zip: ''
                },
                stripe: {
                    stripeToken: '',
                    stripeEmail: ''
                },
            }
        },

        validations: {
            form: {
                email: {
                    email
                },
                number: {
                    required,
                    minLength: minLength(16)
                },
                exp: {
                    month: {
                        required,
                        minLength: minLength(2)
                    },
                    year: {
                        required,
                        minLength: minLength(2)
                    }
                },
                cvc: {
                    required,
                    minLength: minLength(3)
                },
                zip: {
                    required,
                    minLength: minLength(5)
                }
            }
        },

        methods: {
            buy() {
                let $form = document.querySelector('#checkout-form');

                Checkout.paymentProcessing = true;

                Stripe.card.createToken($form, this.stripeResponseHandler);
            },

            stripeResponseHandler(status, response) {
                this.stripe.stripeToken = response.id;

                this.$http.post('/api/stripe', this.$data)
                    .then((response) => {
                            Checkout.paymentSuccess = response.data.paymentSuccess;
                            Checkout.status = response.data.status;
                            Checkout.paymentProcessing = false;
                        }
                    ).catch((error) => {
                    console.log(error);
                });
            }
        }

    }

</script>