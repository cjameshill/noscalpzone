<template>
    <div class="ticket-list-item" :class="type">

        <div class="list-item-seats">
            <span>Qty. <strong>{{ qty }}</strong></span>
            <span>Section <strong>{{ set.tickets[0].section }}</strong></span>
            <span>Row <strong>{{ set.tickets[0].row }}</strong></span>
            <span>Seats <strong v-for="ticket in set.tickets">{{ ticket.seat }}-</strong></span>
            <span>Price <strong>{{ set.tickets[0].amount }}</strong></span>
        </div>

        <div class="list-item-button">
            <button class="button buy-button is-medium">Select</button>
        </div>

    </div>

</template>

<script>

    export default {

        props: [
            'set',
            'type',
            'event'
        ],

        computed: {
            qty: function () {
                return _.size(this.set.tickets);
            }
        }

    }

</script>