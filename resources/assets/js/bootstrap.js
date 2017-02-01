//
window._ = require('lodash');

import Vue from 'vue';
import axios from 'axios';

window.Vue = Vue;
window.axios = axios;

Vue.config.debug = true;

Vue.$http = Vue.prototype.$http = axios.create({
    headers: {'X-CSRF-TOKEN': document.querySelector('#csrf-token').getAttribute('content')}
});

import VueRouter from 'vue-router';
Vue.use(VueRouter);


import Validations from 'vuelidate';
Vue.use(Validations);


window.moment = require('moment');
window.accounting = require('./_accounting');


// window.axios.defaults.headers.common = {
//     'X-Requested-With': 'XMLHttpRequest'
// };


