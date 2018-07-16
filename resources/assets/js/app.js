
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import moment from 'moment'
window.moment = require('moment');

/* Font Awesome 5*/
import fontawesome from '@fortawesome/fontawesome'

/* SweetAlert */
window.swal = require('sweetalert2');


import Vue from 'vue';
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

import VueAutosuggest from "vue-autosuggest";
Vue.use(VueAutosuggest);


import vSelect from 'vue-select'
Vue.component('v-select', vSelect)

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
