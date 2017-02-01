<template>
    <div class="columns is-multiline center-column">
        <div class="columns center-column">
            <div class="column">
                <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
                   Upload your ticket
                </h1>
            </div>
            <div class="column">
                <p class="control">
                   <span class="is-4 is-sans-serif">Additional Seat</span>
                    <button @click="deleteSeat" class="button is-large is-primary" :class="{ 'is-disabled' : sell.tickets.length == 1}">-</button>
                    <button @click="addSeat" class="button is-large is-primary" :class="{ 'is-disabled' : sell.tickets.length == 6}">+</button>
                </p>
            </div>
        </div>

        <div class="columns is-multiline center-row">
                <div class="column is-4">

                    <dropzone id="upload-ticket" v-bind:use-custom-dropzone-options="true" v-bind:dropzone-options="options" :url="url" v-on:vdropzone-success="showSuccess"></dropzone>


                </div>

            <transition-group name="bounce-up" tag="div" class="column is-4 center-row">

                <div v-show="! sell.ticket.is_ga" v-for="(ticket, index) in sell.tickets" :key="index">
                        <p class="control has-addons">
                            <a class="button is-large is-primary is-sans-serif">Seat {{ index + 1}}</a>
                            <input v-model="ticket.seat" type="text" class="input is-large" placeholder="Seat">
                        </p>
                </div>


            </transition-group>

            <div class="column is-4 center-row">
                <button @click="[sell.stash(event.slug), sell.next('/list/price')]" class="button is-large is-primary">Next: Price</button>
            </div>

        </div>

    </div>
</template>

<script>
    import sell from "../../data/sell";
    import data from "../../data/data";

    import Dropzone from "vue2-dropzone";

    export default {
        props: [
            'event'
        ],

        components: {
            Dropzone
        },

        data() {
            return {
                sell,
                url: '/api/event/' + this.event.slug + '/list/upload',
                options: {
                    headers: {
                        "X-CSRF-TOKEN": data.csrfToken
                    },
                }
            }
        },

        created: function () {
            sell.resume(this.event.slug);
        },


        methods: {
            showSuccess: function (file) {
                console.log(file.xhr.response);
            },

            addSeat: function () {
                sell.tickets.push({ seat: ''})
            },

            deleteSeat: function () {
                sell.tickets.pop();
            }
        }
    }

</script>