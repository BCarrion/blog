
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

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data:{
        colaborators:[],
        groups:[]
    },
    methods:{
        // Delete an element by id
        deleteItem: function(id, option){

            if(option.localeCompare("colaborators")=== 0){
                this.colaborators.splice(id, 1);
            }
            else if(option.localeCompare("groups")=== 0){
                this.groups.splice(id, 1);
            }


        }
    }

});
