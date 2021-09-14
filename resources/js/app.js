/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

Vue.config.ignoredElements = ['video-js'];
Vue.component('subscribe-button', require('./components/subscribe-button.vue').default);
Vue.component('votes', require('./components/votes.vue').default);
Vue.component('comments', require('./components/comments.vue').default);
require('./components/channel-uploads');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
