<template>
    <div class="columns center-column">
        <div class="column">
            <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
                How many tickets do you need to get rid of?
            </h1>
            <p class="control center-row">
                <!--<span>-->
                <!--<button @click="sell.default.quantity -= 1" class="button is-large is-primary" :class="{ 'is-disabled' : sell.default.quantity < 2 }">-</button>-->
                <!--</span>-->
                <span>
                <input v-model="sell.default.quantity" type="number" class="input is-large is-auto-width has-text-centered" maxlength="2" size="3">
                </span>
                <!--<span>-->
                <!--<button @click="sell.default.quantity += 1" class="button is-large is-primary" :class="{ 'is-disabled' : sell.default.quantity > 6 }">+</button>-->
                <!--</span>-->
            </p>
        </div>
        <div class="columns">
            <div class="column is-4 is-offset-8">
                <router-link to="/steptwo" class="button is-large is-primary">Next: Are they seated?</router-link>
            </div>
        </div>
    </div>
</template>

<script>

    import sell from "../../data/sell";

    export default {

        props: [
            'event'
        ],

        data() {
            return {
                sell
            }
        }
    }
</script>