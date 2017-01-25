<template>
    <div class="columns center-column">
        <div class="column">
            <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
               Upload your ticket
            </h1>
        </div>

        <div class="column is-6">

            <form :action="uploadURI" class="dropzone upload-ticket" id="ticketUpload">
                <input type="hidden" name="_token" :value="csrfToken">
            </form>

        </div>

        <div v-show="! form.is_ga" class="column is-6">
            <h1 class="subtitle is-4 is-sans-serif is-underlined" class="is-music">
                Seat One
            </h1>
            <p class="control">
                <input v-model="form.section" type="text" name="section" class="input is-large" placeholder="Section" autofocus>
            </p>
            <p class="control">
                <input v-model="form.row" type="text" name="row" class="input is-large" placeholder="Row">
            </p>
            <p class="control">
                <input v-model="form.seat" type="text" name="seat" class="input is-large" placeholder="Seat">
            </p>
        </div>

        <div class="columns">
            <div class="column is-3 is-offset-9">
                <router-link to="/price" class="button is-large is-primary">Next: Price</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import sell from "../../data/sell";
    import data from "../../data/data";

    export default {
        props: [
            'event'
        ],

        data() {
            return {
                form: sell.default.form,
                csrfToken: data.default.csrfToken,
                uploadURI: '/sell/' + this.event.slug + '/upload'
            }
        }
    }

    dropzone.options.ticketUpload = {
        paramName: "ticket",
        maxFilesize: 10,
        uploadMultiple: false,

    };
</script>