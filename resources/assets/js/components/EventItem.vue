<template>
    <div class="event-list-item" @click="goToPage(event.slug)" :class="type">
        <div class="event-date">
            <span class="date">{{ month }} {{ date }}</span>
            <span class="day">{{ day }}</span>
        </div>
        <div class="event-name">
            <div class="profile-photo is-small" style="background-image: url('https://s3.us-east-2.amazonaws.com/noscalpzone-assets/storage/images/msg.jpg');"></div>

            <span>{{ event.title }}</span>
        </div>
        <div class="event-location">
            <!--<span class="icon"><i class="fa fa-map-marker"></i></span>-->
            <span>Madison Square Garden</span>

        </div>
        <div class="event-button">
            <button class="button buy-button">Go</button>
        </div>

    </div>
</template>

<script>
    export default {
        props: [
            'event',
            'type'
        ],

        methods: {
            goToPage: (slug) => {
                return window.location.href = "/events/" + slug;
            }
        },

        computed: {
            day: function () {
                return moment(this.event.event_start_date).format('ddd');
            },
            date: function () {
                return moment(this.event.event_start_date).format('D');
            },
            month: function () {
                return moment(this.event.event_start_date).format('MMM');
            }

        }
    }

</script>