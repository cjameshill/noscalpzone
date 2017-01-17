<template>
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <img src="https://s3.us-east-2.amazonaws.com/noscalpzone-assets/storage/maps/ny/madison-square-garden/madison-square-garden-end-stage-2171.gif" alt="">
            </div>

            <div class="column is-6">
                <header class="center tickets-list-header">
                       <nav class="level sort-by">
                           <div class="level-center">
                               <div class="level-item">
                                   <h1 class="title is-4">
                                       How many seats do you need
                                   </h1>
                               </div>
                               <div class="level-item">
                                   <span class="select is-large">
                                       <select v-model="filter">
                                           <option :value="{ quantity: 'all' }">Any</option>
                                           <option :value="{ quantity: 1 }">1</option>
                                           <option :value="{ quantity: 2 }">2</option>
                                           <option :value="{ quantity: 3 }">3</option>
                                           <option :value="{ quantity: 4 }">4</option>
                                           <option :value="{ quantity: 5 }">5</option>
                                           <option :value="{ greaterThan: 5 }">5+</option>
                                       </select>
                                   </span>
                               </div>
                           </div>
                       </nav>
                        <nav class="level sort-by">
                           <div class="level-center">
                               <div class="level-item">
                                   <h1 class="title is-5">Sort By</h1>
                               </div>
                               <div class="level-item" v-for="item in sortItems">
                                   <a class="button sort-button" @click="[ sortKey = item.key, asc = ! asc ]">
                                       <span class="icon">
                                           <i class="fa" :class="item.icon"></i>
                                       </span>
                                       <span>{{ item.name }}</span>
                                       <span class="icon">
                                           <i class="fa"></i>
                                       </span>
                                   </a>
                               </div>
                           </div>
                       </nav>
                </header>

                <div class="tickets-list">
                    <transition-group name="flip-list" tag="div" class="columns is-multiline">

                        <div v-for="ticket in filteredAndSortedTickets" class="column is-12" :class="{ 'is-active' : this.selected }" @click="[select(ticket)]" :key="ticket.id">

                            <ticket-list-item :type="'is-'+ticket.type[0].name"
                                              :event="event"
                                              :ticket="ticket"
                            >

                            </ticket-list-item>

                        </div>

                    </transition-group>
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

        data() {
            return {
                sortKey: '',
                asc: true,
                filter: {
                    quantity: 'all',
                    greaterThan: 5
                },
                sortItems: [
                    { name: 'Section', key: 'seats[0].section', icon: 'fa-check', active: false },
                    { name: 'Row', key: 'seats[0].row', icon: 'fa-check', active: false },
                    { name: 'Price', key: 'amount', icon: 'fa-check', active: false },
                ]
            }
        },

        props: [
            'event'
        ],

        computed: {
            sortOrder: function () {
                if(this.asc){
                    return 'asc';
                } else {
                    return 'desc'
                }
            },

            sortedTickets: function () {
                return _.orderBy(this.event.tickets, [this.sortKey], [this.sortOrder] );
            },

            filteredAndSortedTickets: function () {
                var self = this;
                if(this.filter.quantity == 'all') {
                    return this.sortedTickets;
                } else {
                    return _.filter(this.sortedTickets, function(ticket){
                        if(self.filter.quantity){
                            return ticket.quantity === self.filter.quantity;
                        } else {
                            return ticket.quantity > self.filter.greaterThan;
                        }
                    });
                }
            }
        },

        methods: {
            select: function (ticket) {
                VueEvents.$emit('select-ticket', ticket);
            }
        }


    }

</script>