<template>
    <div class="container has-text-centered">

        <header>
            <nav class="level dashboard-nav">
                <!--<div class="level-center">-->
                    <!--<div v-for="r in routes.options.routes" class="level-item has-text-centered">-->
                        <!--<div>-->
                            <!--<router-link to="/" class="button is-medium is-secondary" :class="{ 'is-disabled' : sell.success }">{{ r.name }}</router-link>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->

                <div class="level-center">
                    <div class="level-item has-text-centered">
                        <div>
                            <router-link to="/list/" class="button is-medium is-secondary" :class="{ 'is-disabled' : sell.success }">Seated and Section</router-link>
                            <p v-show="sell.ticket.is_ga" class="is-5 is-sans-serif is-primary">Is General Admission</p>
                            <p v-show="! sell.ticket.is_ga && sell.ticket.section != ''" class="is-5 is-sans-serif is-primary">Section: <strong>{{ sell.ticket.section }}</strong></p>
                            <p v-show="! sell.ticket.is_ga && sell.ticket.row != ''" class="is-5 is-sans-serif is-primary">Row: <strong>{{ sell.ticket.row }}</strong></p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <router-link to="/list/ticket" class="button is-medium is-secondary" :class="{ 'is-disabled' : sell.success }">Tickets and Seats
                            </router-link>
                            <p v-show="sell.tickets[0].seat != ''" class="is-5 is-sans-serif is-primary">Seats</p>
                            <span v-show="sell.tickets[0].seat != ''" v-for="t in sell.tickets" class="is-5 is-sans-serif is-primary"> | <strong>{{ t.seat }}</strong> | </span>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <router-link to="/list/price" class="button is-medium is-secondary" :class="{ 'is-disabled' : sell.success }">Price</router-link>
                            <p v-show="sell.ticket.amount != ''" class="is-5 is-sans-serif is-primary">$<strong>{{ sell.ticket.amount }}</strong></p>

                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <router-link to="/list/payment" class="button is-medium is-secondary" :class="{ 'is-disabled' : sell.success }">Payment</router-link>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <router-link to="/list/review" class="button is-medium is-secondary" :class="{ 'is-disabled' : sell.success }">Review and List
                            </router-link>
                        </div>
                    </div>
                </div>

            </nav>
        </header>

        <transition name="slide" mode="out-in">

            <router-view :event="event"></router-view>

        </transition>

    </div>

</template>

<script>

    import sell from '../data/sell';

    export default {

        props: [
            'event'
        ],

        data() {
            return {
                sell
            }
        },

        created() {
            console.log('Vue Loaded');
        },


    }
</script>