Vue.component('CenterHeader', require('./components/CenterHeader.vue'));
Vue.component('EventTickets', require('./components/EventTickets.vue'));


new Vue({
    el: '#app',

    components: [
        'CenterHeader',
        'EventTickets'
    ],

    created(){
        console.log('vue loaded');
    }


});