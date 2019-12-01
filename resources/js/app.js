/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import router from "./router";
import VueGoodTablePlugin from "vue-good-table";
import "vue-good-table/dist/vue-good-table.css";
import Select2 from "v-select2-component";
import store from "./store/store";
import VueToastr2 from "vue-toastr-2";
import "vue-toastr-2/dist/vue-toastr-2.min.css";

//vform
import { Form, HasError, AlertError, AlertErrors, AlertSuccess } from "vform";

window.Form = Form;

window.toastr = require("toastr");

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component(AlertErrors.name, AlertErrors);
Vue.component(AlertSuccess.name, AlertSuccess);

//Good table
Vue.use(VueGoodTablePlugin);

//toastr
Vue.use(VueToastr2);

window.Event = new Vue();

//breadcrumb
Vue.component("Select2", Select2);

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

const app = new Vue({
    el: "#app",
    router,
    store
});
