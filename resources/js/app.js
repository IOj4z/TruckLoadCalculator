require('./bootstrap');
import Vue from 'vue';
import TruckLoad from "./components/TruckLoad.vue";
import vuetify from "./plugins/vuetify";


new Vue({
    el: '#app',
    vuetify,
    components: {
        TruckLoad
    }
});
