window.VueEvents = new Vue();

Vue.component('CenterHeader', require('./components/CenterHeader.vue'));
Vue.component('EventTickets', require('./components/EventTickets.vue'));
Vue.component('TicketCheckout', require('./components/TicketCheckout.vue'));
Vue.component('SellTickets', require('./components/SellTickets.vue'));
Vue.component('TicketReview', require('./components/TicketReview.vue'));

import router from './routes';

window.router = router;


var vm = new Vue({
    el: '#app',

    components: [
        'CenterHeader',
        'EventTickets',
        'TicketCheckout',
        'SellTickets',
        'TicketReview'
    ],

    data: {
        checkout: false
    },

    router: router


});