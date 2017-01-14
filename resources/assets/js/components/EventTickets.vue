<template>
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <img src="http://placehold.it/450x450" alt="">
            </div>

            <div class="column is-6">
                <header class="center tickets-list-header">
                    <h1 class="title is-2">Tickets</h1>
                    <div class="filter">
                        <div class="sort-by">

                        </div>
                    </div>
                </header>

                <div class="tickets-list">
                    <div class="columns is-multiline">
                        <div v-for="ticket in event.tickets" class="column is-12" :class="{ 'is-active' : this.selected }" @click="[select(ticket)]">

                            <ticket-list-item :type="'is-'+ticket.type[0].name"
                                              :event="event"
                                              :ticket="ticket"
                            >

                            </ticket-list-item>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>

    Vue.component('TicketListItem', require('./TicketListItem.vue'));

    export default {

        components: [
            'TicketListItem'
        ],

        props: [
            'event'
        ],

        methods: {
            select: function (ticket) {
                VueEvents.$emit('select-ticket', ticket);
            }
        }


    }

</script>