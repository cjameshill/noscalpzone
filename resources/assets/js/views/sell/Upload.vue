<template>
    <div class="columns is-multiline center-row">
        <div class="column is-12">
            <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
               Upload your ticket
            </h1>
        </div>

        <div class="column is-6">

            <dropzone id="upload-ticket" v-bind:use-custom-dropzone-options="true" v-bind:dropzone-options="options" :url="uploadURI" v-on:vdropzone-success="showSuccess"></dropzone>

        </div>

        <div v-show="! tickets[0].is_ga" class="column is-6">
            <p class="control">
                <input v-model="tickets[0].section" type="text" name="section" class="input is-large" placeholder="Section" autofocus>
            </p>
            <p class="control">
                <input v-model="tickets[0].row" type="text" name="row" class="input is-large" placeholder="Row">
            </p>
        </div>
        <div class="column is-3">
            <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
                Seat {{ this.$route.params.seat_id }}
            </h1>

            <p class="control">
                <input v-model="tickets[0].seat" type="text" name="seat" class="input is-large" placeholder="Seat">
            </p>

        </div>

        <div class="column is-3 is-offset-9">
            <button @click="[save(), next('/price')]" class="button is-large is-primary">Next: Price</button>
        </div>
        <div class="column is-3 is-offset-9">
            <button @click="[save(), next('/upload/2')]" class="button is-large is-primary">Next Ticket</button>
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
                tickets: [
                    {
                        is_ga: false,
                        section: '',
                        row: '',
                        seat: ''
                    }
                ],
                uploadURI: '/sell/' + this.event.slug + '/upload/' + this.currentSeat,
                options: {
                    headers: {
                        "X-CSRF-TOKEN": data.default.csrfToken
                    },
                }
            }
        },

        created: function () {
            console.log('loaded component');
        },

        computed: {
            nextSeat: function () {
                if(this.$route.params.seat_id == '1'){ return 2 }
                if(this.$route.params.seat_id == '2'){ return 3 }
                if(this.$route.params.seat_id == '3'){ return 4 }
            },
            currentSeat: function () {
                return this.$route.params.seat_id;
            }
        },

        watch: {
            '$route' (to, from){
                console.log('watch component');
            }
        },

        methods: {
            showSuccess: function (file) {
                console.log(file.xhr.response);
            },

            save: function () {
                this.$http.post('/sell/' + this.event.slug + '/save/' + this.currentSeat, this.tickets)
                    .then((response) => {
                        console.log(response);
                    });
            },

            next: function (page) {
                router.push(page);
            }
        }
    }

</script>