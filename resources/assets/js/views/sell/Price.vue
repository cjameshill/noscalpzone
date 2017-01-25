<template>
    <div class="columns center-column">
        <div class="column">
            <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
               Now, how much do you want to sell it for?
            </h1>
        </div>

        <div class="column">
            <p class="control">
                <input v-model="form.amount" type="text" name="amount" class="input is-large" placeholder="Price" autofocus>
            </p>
        </div>

        <div class="columns">
            <div class="column is-3 is-offset-9">
                <router-link to="/review" class="button is-large is-primary">Next: Review and List</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import sell from "../../data/sell";
    import data from "../../data/data";

    export default {
        props: [
            'event'
        ],

        data() {
            return {
                form: sell.default.form,
            }
        }
    }
</script>