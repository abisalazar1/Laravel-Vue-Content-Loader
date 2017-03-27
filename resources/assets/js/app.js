
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
//**** Content Loader ****//
Vue.component('app-content-loader', require('./components/ContentLoader/ContentLoader.vue'));

//**** User ****//

Vue.component('app-user', require('./components/User/User.vue'));
Vue.component('app-user-list', require('./components/User/UserList.vue'));


//**** Post ****//
Vue.component('app-post', require('./components/Post/Post.vue'));
Vue.component('app-post-list', require('./components/Post/PostList.vue'));


window.Event = new Vue();

window.vm = new Vue({
    el: '#app',
    data : {
        ContentLoaderConfig : {
            RequestType: 'GET',
            AutoLoadContent: true,
            LoadBtnText : "Load More"

        }
    }

});
