/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)

import 'bootstrap-vue/dist/bootstrap-vue.css'

// Load custom resources

require('./custom-vue-filters.js');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-grid', require('./components/UserGridComponent.vue').default);
Vue.component('user-form', require('./components/UserFormComponent.vue').default);
Vue.component('course-grid', require('./components/CourseGridComponent.vue').default);
Vue.component('course-form', require('./components/CourseFormComponent.vue').default);
Vue.component(
	'course-acquisition-grid',
	require('./components/CourseAcquisitionGridComponent.vue').default
);
Vue.component(
	'course-acquisition-form',
	require('./components/CourseAcquisitionFormComponent.vue').default
);
Vue.component('course-form', require('./components/CourseFormComponent.vue').default);
Vue.component('course-section-grid', require('./components/CourseSectionGridComponent.vue').default);
Vue.component('course-section-form', require('./components/CourseSectionFormComponent.vue').default);
Vue.component('lesson-grid', require('./components/LessonGridComponent.vue').default);
Vue.component('lesson-form', require('./components/LessonFormComponent.vue').default);
Vue.component('lesson-list', require('./components/LessonListComponent.vue').default);
Vue.component('video-player', require('./components/VideoPlayerComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

