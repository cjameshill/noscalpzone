<template>
    <div class="columns center-column">
        <div class="columns center-column">
            <div class="column">
                <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
                    Are they General Admission or Seating?
                </h1>
                <span class="control">
                        <button @click="sell.ticket.is_ga = true" class="button is-large is-sans-serif"
                                :class="{ 'is-primary' : sell.ticket.is_ga }">GA</button>
                        <button @click="sell.ticket.is_ga = false" class="button is-large is-sans-serif"
                                :class="{ 'is-primary' : ! sell.ticket.is_ga }">Seated</button>
                    </span>
            </div>
        </div>


        <transition name="slide" tag="div" class="columns center-column">
            <div v-show="! sell.ticket.is_ga" >
            <div class="column">
                <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
                    Where are the seats?
                </h1>
            </div>
            <div class="column">
                <p class="control center-column">
                <p class="control">
                    <input v-model="sell.ticket.section" type="text" name="section" class="input is-large"
                           placeholder="Section" autofocus>
                </p>
                <p class="control">
                    <input v-model="sell.ticket.row" type="text" name="row" class="input is-large"
                           placeholder="Row">
                </p>
                </p>
            </div>
            </div>
        </transition>

        <div class="columns">
            <div class="column is-3 is-offset-9">
                <button @click="[sell.stash(event.slug), sell.next('/list/ticket')]" class="button is-large is-primary">Next: Add Tickets</button>
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
                sell,
            }
        },

        created() {
            sell.resume(this.event.slug);
            console.log('page is ' + NoScalpZone.page);
        }
    }
</script>