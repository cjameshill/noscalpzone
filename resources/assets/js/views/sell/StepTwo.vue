<template>
    <div class="columns center-column">
        <div class="column ">
            <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
                Are they General Admission or Seating?
            </h1>
                <button @click="sell.default.form.is_ga = true" class="button is-large">GA</button>
                <button @click="sell.default.form.is_ga = false" class="button is-large">Seated</button>
        </div>
        <div class="columns">
            <div class="column is-3 is-offset-9">
                <router-link to="/upload/1" class="button is-large is-primary">Next: Upload your tickets</router-link>
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