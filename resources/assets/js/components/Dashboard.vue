<template>
    <div class="wrapper dashboard">
        <nav class="nav nav-dashboard">

            <div class="nav-left">
                <div class="nav-item">
                    <span class="icon is-3 is-sans-serif">
                        <i class="fa fa-user-circle"></i>
                        {{ user.name }}
                    </span>
                </div>
            </div>

            <div class="nav-center">
                <div class="nav-item">
                    <router-link to="/dash/payment" tag="a" class="button is-medium is-sans-serif is-secondary">
                        <span class="icon">
                            <i class="fa fa-credit-card"></i>
                            <span>Payment Settings</span>
                        </span>
                    </router-link>
                </div>
            </div>

            <div class="nav-right">
                <div class="nav-item"></div>
            </div>
        </nav>

        <transition name="fade" mode="out-in">

            <router-view :user="user"></router-view>

        </transition>

    </div>
</template>

<script>

    export default {

        props: [
            'user'
        ],

    }

</script>