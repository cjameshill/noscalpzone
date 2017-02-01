window.VueEvents = new Vue();

Vue.component('CenterHeader', require('./components/CenterHeader.vue'));
Vue.component('EventTickets', require('./components/EventTickets.vue'));
Vue.component('SellTickets', require('./components/SellTickets.vue'));
Vue.component('Dashboard', require('./components/Dashboard.vue'));

import router from './routes';

window.router = router;

router.mode = 'html5';


var vm = new Vue({
    el: '#app',

    components: [
        'CenterHeader',
        'EventTickets',
        'SellTickets',
        'Dashboard'
    ],

    data: {
        checkout: false
    },

    created() {
        console.log('Loaded');
    },

    router: router

});