<template>
    <div class="columns is-multiline center-column">
        <div class="column is-8">
            <h1 class="title is-2" :class="'is-music'">
               Awesome!
            </h1>
            <h1 class="subtitle is-2 is-sans-serif" :class="'is-music'">
                Your Ticket has been polished by our ticket polishers<br>
                and ready to give someone else an amazing experience!
            </h1>
        </div>

        <div class="columns">
            <div class="column center">
                <span class="control">
                    <button @click="reset" class="button is-large">List Another for this Event</button>
                    <a :href="eventURI" class="button is-large is-primary">View your ticket listing</a>
                </span>
            </div>
        </div>
    </div>
</template>

<script>

    import sell from '../../data/sell';

    export default {
        props: [
            'event'
        ],

        data() {
            return {
                sell,
                eventURI: '/events/' + this.event.slug
            }
        },

        methods: {
            reset: function () {
                this.$http.post('/api/event/' + this.event.slug + '/list/reset')
                    .then((response) => {
                        sell.success = false;
                        window.location = '/sell/' + this.event.slug + '/list';
                    });

            }
        },
    }
</script>