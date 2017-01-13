Vue.component('CenterHeader', require('./components/CenterHeader.vue'));


new Vue({
    el: '#app',

    components: [
        'CenterHeader'
    ],

    created(){
        console.log('vue loaded');
    }


});