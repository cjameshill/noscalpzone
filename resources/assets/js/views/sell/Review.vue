<template>
    <div class="columns center-column">
        <div class="column">
            <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
               Make sure everything is correct, then, just list
            </h1>
        </div>

        <div class="column">
            <p class="is-4">Event: <strong>{{ event.title }}</strong></p>
            <p class="is-4">Quantity: <strong>{{ qty }}</strong></p>
            <p class="is-4">Section: <strong>{{ sell.ticket.section }}</strong></p>
            <p class="is-4">Row: <strong>{{ sell.ticket.row }}</strong></p>
            <p class="is-4">Seat: <strong v-for="ticket in sell.tickets">{{ ticket.seat }} |</strong></p>
            <p class="is-4">Price: <strong>{{ sell.ticket.amount }}</strong></p>
        </div>

        <div class="columns">
            <div class="column is-3 is-offset-9">
                <button @click.once="[sell.submit(event.slug), sell.next('/list/success')]"
                        class="button is-large is-primary"
                        :class="{ 'is-loading' : processing }">
                    List Now for ${{ sell.ticket.amount }}
                </button>
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
                sell,
                processing: false,
            }
        },

        computed: {
            qty: function () {
                return _.size(sell.tickets);
            }
        },

        created() {
            sell.resume(this.event.slug);
        }
    }
</script>