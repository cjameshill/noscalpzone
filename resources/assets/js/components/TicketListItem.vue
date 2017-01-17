<template>
    <div class="ticket-list-item" :class="type">

        <div v-show="ticket.seats[0]" class="list-item-seats">
            <span>Qty. <strong>{{ ticket.quantity }}</strong></span>
            <span>Section <strong v-for="seat in ticket.seats">{{ seat.section }}</strong></span>
            <span>Row <strong v-for="seat in ticket.seats">{{ seat.row }}</strong></span>
            <span>Seats <strong v-for="seat in ticket.seats">{{ seat.number }}</strong></span>
            <span>Price <strong v-for="seat in ticket.seats">{{ ticket.amount }}</strong></span>
        </div>

        <div class="list-item-button">
            <button class="button buy-button is-medium">Select</button>
        </div>

    </div>

</template>

<script>

    export default {

        props: [
            'ticket',
            'type',
            'event'
        ],

        computed: {
            qty: function () {
                return this.ticket.seats.length;
            }
        }

    }

</script>