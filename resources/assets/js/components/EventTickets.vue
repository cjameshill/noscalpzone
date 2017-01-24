<template>
    <div class="container">
        <div class="columns is-multiline">

            <div class="column is-12">
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
            </div>

            <div class="column is-6">
                <img src="https://s3.us-east-2.amazonaws.com/noscalpzone-assets/storage/maps/ny/madison-square-garden/madison-square-garden-end-stage-2171.gif" alt="">
            </div>

            <div class="column is-6">
                <div class="tickets-list">
                    <transition-group name="flip-list" tag="div" class="columns is-multiline">

                        <div v-for="set in filteredAndSortedSets" class="column is-12" :class="{ 'is-active' : this.selected }" @click="[select(set)]" :key="set.id">

                            <ticket-set-list-item :type="'is-music'"
                                              :event="event"
                                              :set="set"
                            >

                            </ticket-set-list-item>

                        </div>

                    </transition-group>

                    <div v-show="filteredAndSortedSets = []" class="column is-12">
                        <h1 class="title is-3">
                            Sorry, there is no tickets at the moment
                        </h1>
                        <a href="/sell" class="button is-large is-primary">List your ticket now</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>

    Vue.component('TicketSetListItem', require('./TicketSetListItem.vue'));

    export default {

        components: [
            'TicketSetListItem'
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
                    { name: 'Section', key: 'tickets[0].section', icon: 'fa-check', active: false },
                    { name: 'Row', key: 'tickets[0].row', icon: 'fa-check', active: false },
                    { name: 'Price', key: 'tickets[0].amount', icon: 'fa-check', active: false },
                ]
            }
        },

        props: [
            'event',
            'sets'
        ],

        computed: {

            sortOrder: function () {
                if(this.asc){
                    return 'asc';
                } else {
                    return 'desc'
                }
            },

            sortedSets: function () {
                return _.orderBy(this.sets, [this.sortKey], [this.sortOrder] );
            },

            filteredAndSortedSets: function () {
                var self = this;
                if(this.filter.quantity == 'all') {
                    return this.sortedSets;
                } else {
                    return _.filter(this.sortedSets, function(set){
                        if(self.filter.quantity){
                            return _.size(set.tickets) === self.filter.quantity;
                        } else {
                            return _.size(set.tickets) > self.filter.greaterThan;
                        }
                    });
                }
            }
        },

        methods: {
            select: function (set) {
                VueEvents.$emit('select-ticket', set);
            }
        }


    }

</script>