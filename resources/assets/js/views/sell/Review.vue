<template>
    <div class="columns center-column">
        <div class="column">
            <h1 class="subtitle is-3 is-sans-serif is-underlined" :class="'is-music'">
               Make sure everything is correct, then, just list
            </h1>
        </div>

        <div class="column">
            <p class="is-4">Event: <strong>{{ event.title }}</strong></p>
            <p class="is-4">Quantity: <strong>{{ form.quantity }}</strong></p>
            <p class="is-4">Section: <strong>{{ form.section }}</strong></p>
            <p class="is-4">Row: <strong>{{ form.row }}</strong></p>
            <p class="is-4">Seat: <strong>{{ form.seat }}</strong></p>
            <p class="is-4">Price: <strong>{{ form.amount }}</strong></p>
        </div>

        <div class="columns">
            <div class="column is-3 is-offset-9">
                <button @click="list" class="button is-large is-primary" :class="{ 'is-loading' : processing }">List Now for ${{ form.amount }}</button>
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
                processing: false,
                success: sell.default.success
            }
        },

        methods: {
            list: function (){
                this.processing = true;
                this.$http.post('/sell/' + this.event.slug + '/save', this.form)
                    .then((response) => {
                        this.success = true;
                        router.push('/success');
                    });
            }
        }
    }
</script>