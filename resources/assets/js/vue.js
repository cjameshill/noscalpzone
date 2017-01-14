window.VueEvents = new Vue();

Vue.component('CenterHeader', require('./components/CenterHeader.vue'));
Vue.component('EventTickets', require('./components/EventTickets.vue'));
Vue.component('TicketCheckout', require('./components/TicketCheckout.vue'));

var vm = new Vue({
    el: '#app',

    components: [
        'CenterHeader',
        'EventTickets',
        'TicketCheckout',
    ],

    data: {
        checkout: false
    }


});