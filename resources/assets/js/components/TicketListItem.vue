<template>
    <div class="event-list-item" :class="type">
        <div class="event-date">
            <span class="date">Jan 13</span>
            <span class="day">Fri</span>
        </div>
        <div class="event-name">
            <div class="profile-photo is-small" style="background-image: url('https://s3.us-east-2.amazonaws.com/noscalpzone-assets/storage/images/msg.jpg');"></div>

            <span>Coldplay</span>
        </div>
        <div class="event-location">
            <!--<span class="icon"><i class="fa fa-map-marker"></i></span>-->
            <span>Madison Square Garden</span>

        </div>
        <div class="event-button">
            <button class="button buy-button">Buy for $80</button>
        </div>

    </div>

</template>

<script>

    export default {

        data() {
            return {
                type: 'is-music'
            }
        }


    }

</script>