<template>
    <div class="container has-text-centered">

        <header>
            <nav class="nav dashboard-nav">
                <div v-show="! success" class="nav-center">
                    <span class="nav-item">
                        <router-link to="/" class="button is-medium is-secondary">Step One</router-link>
                        <span class="is-1">/</span>
                        <router-link to="/steptwo" class="button is-medium is-secondary">Step Two</router-link>
                        <span class="is-1">/</span>
                        <router-link to="/upload/1" class="button is-medium is-secondary">Upload</router-link>
                        <span class="is-1">/</span>
                        <router-link to="/price" class="button is-medium is-secondary">Price</router-link>
                        <span class="is-1">/</span>
                        <router-link to="/review" class="button is-medium is-secondary">Review and List</router-link>
                    </span>
                </div>
            </nav>
        </header>

        <transition name="slide" mode="out-in">

            <router-view :event="event"></router-view>

        </transition>

    </div>

</template>

<script>

    import sell from '../data/sell';

    export default {

        props: [
            'event'
        ],

        data() {
            return {
                form: sell.default.form,
                resume: sell.default.resume,
                success: sell.default.success
            }
        },

        methods: {
            getCurrentTicket: function (){
                this.$http.get('/sell/' + this.event.slug + '/resume')
                    .then((response) => {
                        this.resume = response.data;
                    });

            }
        },

        created() {
            this.getCurrentTicket();
        }

    }

</script>