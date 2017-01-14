<template>
    <div>

        <transition name="bounce-up">
            <div v-show="show" class="checkout has-drop-shadow" @click="open = ! open" :class="{'is-open': open}">
                        <nav class="level">
                            <div class="level-item has-text-centered hide-on-mobile">
                                <p class="is-4">Qty: <strong>1</strong></p>
                            </div>
                            <div class="level-item has-text-centered hide-on-mobile">
                                <p class="is-4">Section: <strong>1</strong></p>
                            </div>
                            <div class="level-item has-text-centered hide-on-mobile">
                                <p class="is-4">Row: <strong>4</strong></p>
                            </div>
                            <div class="level-item has-text-centered hide-on-mobile">
                                <p class="is-4">Seat: <strong>23</strong></p>
                            </div>
                            <div class="level-item has-text-centered">
                                <p class="is-4">Price: <strong>{{ this.selected.amount }}</strong></p>
                            </div>
                            <div class="level-item is-music">
                                <button class="button buy-button is-primary is-medium is-sans-serif">Checkout</button>
                            </div>
                        </nav>
            </div>
        </transition>

        <transition name="fade">
            <cover-background v-show="open"></cover-background>
        </transition>

    </div>
</template>

<script>

    Vue.component('CoverBackground', require('./CoverBackground.vue'));

    export default {

        components: 'CoverBackground',

        created() {
            VueEvents.$on('select-ticket', (ticket) => {
                this.select(ticket);
            });
        },

        methods: {
            select: function (ticket) {
                this.show = true;
                this.selected = ticket;
            }
        },

        data() {
            return {
                open: false,
                show: false,
                selected: []
            }
        },

        watch: {
            open: function () {
                var open = this.open;
                setTimeout(function () {
                    document.querySelector('body').classList.toggle('no-scroll', open);
                }, 200);

            }
        }


    }

</script>