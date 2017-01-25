<template>
    <div>

        <transition name="bounce-up">
            <div v-show="show" class="checkout has-drop-shadow" @click="open = ! open" :class="{'is-open': open}">
                        <nav class="level">

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