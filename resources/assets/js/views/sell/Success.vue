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
                <a :href="eventURI" class="button is-large is-primary">View your ticket listing</a>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: [
            'event'
        ],

        data() {
            return {
                eventURI: '/events/' + this.event.slug
            }
        }
    }
</script>