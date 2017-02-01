<template>
    <div class="columns center-column">
        <div class="column">
            <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
               How would you like to be payed?
            </h1>
        </div>

        <div class="column">
            <p class="is-3 control has-addons has-text-right">
                Bank Transfer
            </p>
        </div>

        <div class="columns">
            <div class="column is-3 is-offset-9">
                <button @click="[sell.stash(event.slug), sell.next('/list/review')]"
                        class="button is-large is-primary">
                    Next: Review and List
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
            }
        },

        created() {
            sell.resume(this.event.slug);
        }
    }
</script>