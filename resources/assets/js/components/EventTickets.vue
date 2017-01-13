<template>
    <div class="container">

        <header class="center">
            <h1 class="title is-2">Tickets</h1>
            <div class="filter">
                <div class="sort-by">

                </div>
            </div>
        </header>

        <div class="tickets-list">
            <div class="columns">
                <div class="column">
                    <ticket-list-item></ticket-list-item>
                    <ticket-list-item></ticket-list-item>
                    <ticket-list-item></ticket-list-item>
                    <ticket-list-item></ticket-list-item>
                    <ticket-list-item></ticket-list-item>
                    <ticket-list-item></ticket-list-item>
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


    }

</script>