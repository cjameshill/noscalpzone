<template>
    <div class="columns center-column">
        <div class="column">
            <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
               Now, how much do you want to sell it for?
            </h1>
        </div>

        <div class="column">
            <p class="control has-addons has-text-right">
                <a class="button is-large has-sans-serif">$</a>
                <input v-model="sell.ticket.amount"
                       size="5" type="text"
                       name="amount"
                       class="input is-large"
                       placeholder="Price"
                       autofocus>
            </p>
        </div>

        <div class="columns">
            <div class="column is-3 is-offset-9">
                <button @click="[sell.stash(event.slug), sell.next('/list/review')]"
                        class="button is-large is-primary">
                    Next: Payment
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import sell from "../../data/sell";
    import data from "../../data/data";

    Vue.component('MaskedInput', require('vue-masked-input'));

    export default {
        components: [
            'MaskedInput'
        ],

        props: [
            'event'
        ],

        data() {
            return {
                sell,
                price: 0
            }
        },

        created() {
            sell.resume(this.event.slug);
        }
    }
</script>