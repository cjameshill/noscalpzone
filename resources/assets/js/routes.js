import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/sell/StepOne.vue')
    },
    {
        path: '/steptwo',
        component: require('./views/sell/StepTwo.vue')
    },
    {
        path: '/upload',
        component: require('./views/sell/Upload.vue')
    },
    {
        path: '/price',
        component: require('./views/sell/Price.vue')
    },
    {
        path: '/review',
        component: require('./views/sell/Review.vue')
    },
    {
        path: '/success',
        component: require('./views/sell/Success.vue')
    }
];

export default new VueRouter({
    routes
});

