<template>
    <div class="columns center-column">
        <div class="columns center-column">
            <div class="column">
                <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
                   Upload your ticket: {{ $route.params.list }}
                </h1>
            </div>
        </div>

        <div class="columns center-row">
            <div class="column">

                <dropzone id="upload-ticket" :key="$route.params.list" v-bind:use-custom-dropzone-options="true" v-bind:dropzone-options="options" :url="uploadURI" v-on:vdropzone-success="showSuccess"></dropzone>

            </div>

            <div v-show="! sell.default.ticket.is_ga" class="column">
                <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
                    Seat {{ this.$route.params.list }}
                </h1>

                <p class="control">
                    <input v-model="sell.default.ticket.seat" type="text" class="input is-large" placeholder="Seat">
                </p>
            </div>
        </div>

        <div class="column">
            <button @click="[save()]" class="button is-large">Save</button>
        </div>
        <div class="column">
            <button @click="[next('/list/price')]" class="button is-large">Next: Price</button>
        </div>
        <div class="column">
            <button @click="[next('upload', nextList)]" class="button is-large is-primary">Add another Ticket</button>
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

        computed: {
            listID: function () {
                return this.$route.params.list;
            },
            nextList: function () {
                return this.listID + 1;
            }
        },

        data() {
            return {
                sell,
                uploadURI: '/api/' + this.event.slug + '/list/' + this.$route.params.list,
                options: {
                    headers: {
                        "X-CSRF-TOKEN": data.default.csrfToken
                    },
                }
            }
        },

        watch: {
            '$route' (to, from){
                this.uploadURI = '/api/' + this.event.slug + '/list/' + this.listID;
            }
        },

        created: function () {
            console.log('loaded component');
        },

        methods: {
            showSuccess: function (file) {
                console.log(file.xhr.response);
            },

            save: function () {
                sell.default.add(this.event.slug, this.listID);
            },

            next: function (page, list = null) {
                if(list == null){
                    router.push(page);
                } else {
                    router.push({ name: page, params: { list: list }});
                }
            }
        }
    }

</script>