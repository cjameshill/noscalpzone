<template>
        <div class="checkout has-drop-shadow">
                <div class="review">
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
                            <p class="is-4">Price: <strong>$100</strong></p>
                        </div>
                        <div class="level-item is-music">
                            <button @click="openCheckout" class="button buy-button is-primary is-medium is-sans-serif">Checkout</button>
                        </div>
                        <div class="level-item is-music">
                            <button @click="cancel" class="button is-medium is-sans-serif">Cancel</button>
                        </div>
                    </nav>
                </div>
        </div>
</template>

<script>

    import Checkout from "../data/Checkout";

    export default {

        data() {
            return {
                Checkout,
            }
        },

        methods: {
            openCheckout: function () {
                router.push('/checkout');
            },
            cancel: function () {
                console.log('cancel');
                Checkout.selected = [];
            }
        },

        created() {
            console.log('selected review');
        }


    }

</script>