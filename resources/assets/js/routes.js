import VueRouter from 'vue-router';
import sell from './data/sell';
import Checkout from './data/Checkout';


let routes = [
    {
        name: 'start',
        path: '/',
        beforeEnter: (to, from, next) => {
            if(NoScalpZone.page == '\/sell'){
                next('/list')
            }
            if(NoScalpZone.page == '\/dashboard'){
                next('/dash')
            }
            if(NoScalpZone.page == '\/events'){
                next()
            }
        }
    },
    {
        name: 'checkout',
        path: '/checkout',
        component: require('./views/checkout/Checkout.vue'),
        beforeEnter: (to, from, next) => {
            if(NoScalpZone.page == '\/events'){
                next()
            }
            if(Checkout.selected == null){
                next('/')
            }
        }
    },
    {
        name: 'dashboard',
        path: '/dash',
        component: function (resolve) {
            require(['./views/dashboard/Home.vue'], resolve)
        },
        beforeEnter: (to, from, next) => {
            next()
        }
    },
    {
        name: 'list',
        path: '/list/',
        component: require('./views/sell/Seated.vue'),
        beforeEnter: (to, from, next) => {
            if(sell.success){
                next('/list/success')
            }
            next()
        }
    },
    {
        name: 'section',
        path: '/list/section',
        component: require('./views/sell/SectionRow.vue'),
        beforeEnter: (to, from, next) => {
            if(sell.success){
                next('/list/success')
            }
            next()
        }
    },
    {
        name: 'ticket',
        path: '/list/ticket',
        component: require('./views/sell/Ticket.vue'),
        beforeEnter: (to, from, next) => {
            if(sell.success){
                next('/list/success')
            }
            next()
        }
    },
    {
        name: 'price',
        path: '/list/price',
        component: require('./views/sell/Price.vue'),
        beforeEnter: (to, from, next) => {
            if(sell.success){
                next('/list/success')
            }
            next()
        }
    },
    {
        name: 'payment',
        path: '/list/payment',
        component: require('./views/sell/Payments.vue'),
        beforeEnter: (to, from, next) => {
            if(sell.success){
                next('/list/success')
            }
            next()
        }
    },
    {
        name: 'review',
        path: '/list/review',
        component: require('./views/sell/Review.vue'),
        beforeEnter: (to, from, next) => {
            if(sell.success){
                next('/list/success')
            }
            next()
        }
    },
    {
        path: '/list/success',
        component: require('./views/sell/Success.vue'),
        beforeEnter: (to, from, next) => {
            next()
        }
    }
];

export default new VueRouter({
    routes,
    history: true,
    hashbang: false,
    root: '/'
});

