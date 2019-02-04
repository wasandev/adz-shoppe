/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


import {
    library
} from '@fortawesome/fontawesome-svg-core'
import {
    faShoppingCart
} from '@fortawesome/free-solid-svg-icons'
import {
    FontAwesomeIcon,
    FontAwesomeLayers,
    FontAwesomeLayersText
} from '@fortawesome/vue-fontawesome'

library.add(faShoppingCart);

Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('font-awesome-layers', FontAwesomeLayers);
Vue.component('font-awesome-layers-text', FontAwesomeLayersText);
Vue.component('size-selector-component', require('./components/SizeSelectorComponent.vue'));
Vue.component('color-selector-component', require('./components/ColorSelectorComponent.vue'));
Vue.component('cart-icon', require('./components/CartIcon.vue'));
Vue.component('cart-button', require('./components/CartButton.vue'));
import store from './store'


const app = new Vue({
    el: "#app",
    data: {
        open: false,
    },
    methods: {
        toggle() {
            this.open = !this.open
        }
    },
    store,
});
