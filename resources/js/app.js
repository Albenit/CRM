/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



Vue.component('notifications', require('./components/notifications.vue').default);
Vue.component('calendar', require('./components/calendar.vue').default);
Vue.component('chat', require('./components/chat.vue').default);
Vue.component('todo', require('./components/todo.vue').default);
Vue.component('leads', require('./components/leads.vue').default);
Vue.component('addtask', require('./components/addtask.vue').default);
Vue.component('addtask2', require('./components/addtask2.vue').default);
Vue.component('addtask3', require('./components/addtask3.vue').default);
Vue.component('addtask4', require('./components/addtask4.vue').default);
Vue.component('infonumbers', require('./components/informationalnumbers.vue').default);
Vue.component('todolist', require('./components/todolist.vue').default);
Vue.component('krank',require('./components/krank.vue').default);


require('./bootstrap');
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
window.Vue = require('vue').default;


const app = new Vue({
    el: '#app',
});
