<template>
    <div class="nav-center nav-main-menu">
           <span class="nav-item">
               <span v-for="item in menu"  class="has-dropdown" :class="item.menu.type">


                   <a href="" class="button is-secondary is-medium">{{ item.menu.title }}</a>


                   <div class="main-menu-dropdown animated slideInUp">
                       <div class="box">

                           <header>
                               <h1 class="title is-3">{{ item.menu.title }}</h1>
                           </header>

                           <div class="columns is-fullheight is-multiline">
                               <div class="column is-6-desktop is-12-tablet">
                                   <h1 class="title is-4">Events</h1>

                                    <event-item v-for="event in item.data.events" :type="item.menu.type" :event="event"></event-item>

                               </div>

                               <div class="column is-6-desktop is-12-tablet">
                                   <h1 class="title is-4">Performers</h1>
                                   <div class="columns is-multiline">

                                       <div v-for="performer in item.data.performers" class="column performer-list-item" :class="item.menu.type">
                                           <div class="event-name">
                                                <div class="profile-photo is-small" style="background-image: url('https://s3.us-east-2.amazonaws.com/noscalpzone-assets/storage/images/msg.jpg');"></div>
                                                <span>{{ performer.title }}</span>
                                           </div>
                                       </div>

                                   </div>
                               </div>

                           </div>
                       </div>
                   </div>
               </span>
           </span>
    </div>

</template>

<script>

    Vue.component('EventItem', require('./EventItem.vue'));

    export default {

        components: [
            'EventItem'
        ],

        data() {
            return {
                menu: {
                    music: {
                        data: [],
                        menu: { title: 'Music', type: 'is-music', tag: 'music'}
                    },
                    sport: {
                        data: [],
                        menu: { title: 'Sport', type: 'is-sport', tag: 'sport'}
                    },
                    theater: {
                        data: [],
                        menu: { title: 'Theater', type: 'is-theater', tag: 'theater'}
                    }
                },

            }
        },

        computed: {
            //
        },

        methods: {
            getMusic() {
                this.$http.get('/api/menu/music').then((response) => this.menu.music.data = response.data);
            },
            getSport() {
                this.$http.get('/api/menu/sport').then((response) => this.menu.sport.data = response.data);
            },
            getTheater() {
                this.$http.get('/api/menu/theater').then((response) => this.menu.theater.data = response.data);
            }
        },

        created() {
            this.getMusic();
            this.getSport();
            this.getTheater();
        }

    }

</script>