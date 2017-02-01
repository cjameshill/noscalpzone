<template>
    <div class="columns center-column">
        <div class="columns center-column">
            <div class="column">
                <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
                    Where are the seats?
                </h1>
            </div>
        </div>
        <div class="column">
            <p class="control center-column">
                <p class="control">
                    <input v-model="sell.ticket.section" type="text" name="section" class="input is-large" placeholder="Section" autofocus>
                </p>
                <p class="control">
                    <input v-model="sell.ticket.row" type="text" name="row" class="input is-large" placeholder="Row">
                </p>
            </p>
        </div>
        <div class="columns">
            <div class="column is-4 is-offset-8">
                <button @click="[sell.stash(event.slug), sell.next('/list/ticket')]" class="button is-large is-primary">Next: Add Ticket</button>
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
                sell
            }
        },

        created() {
            sell.resume(this.event.slug);
        }
    }
</script>