
require('./bootstrap');

window.Vue = require('vue');

window.VueRouter = require('vue-router').default;

window.VueAxios = require('vue-axios').default;

window.axios = require('axios').default;

window.VueSweetalert2 = require('vue-sweetalert2').default;

Vue.use(VueRouter,VueAxios, axios);

const options = {
    confirmButtonColor: '#41b882',
    cancelButtonColor: '#ff7674'
}

Vue.use(VueSweetalert2, options)


require('cropper/dist/cropper');
require('gijgo/js/gijgo.min');


/*Vue.component('table-component', require('./components/TableComponent.vue').default);*/



