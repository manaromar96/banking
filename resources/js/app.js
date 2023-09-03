
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import myMixin from './mixins'
import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/ar'
import 'element-ui/lib/theme-chalk/index.css';
window.moment = require('moment');
moment.locale('en-us');
moment.lang("en");
Vue.prototype.$moment = moment;


Vue.use(ElementUI, { locale })
Vue.mixin(myMixin);

import TableComponent from 'vue-table-component';

Vue.use(TableComponent, {
    tableClass: 'table table-bordered table-hover table-custom',
    filterNoResults: __('No Data'),
    filterInputClass: 'form-control m-input',
    filterPlaceholder: __('Search'),

});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

require('./components/dashboard/users/index');
require('./components/dashboard/users/form');



const app = new Vue({
    el: '#app',
});
