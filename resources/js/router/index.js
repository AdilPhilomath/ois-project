import Vue from "vue";
import Router from "vue-router";
import Dashboard from "../components/dashboard/Dashboard";
import Setting from "../components/setting/Setting";
import BankAccount from "../components/bank_account/BankAccount";
import { HTTP } from "../utils/http";

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: HTTP.baseURL,
            name: "Dashboard",
            component: Dashboard
        },
        {
            path: HTTP.baseURL + "bank_accounts",
            name: "BankAccount",
            component: BankAccount
        },
        {
            path: HTTP.baseURL + "setting",
            name: "Setting",
            component: Setting
        }
    ],
    mode: "history",
    // linkActiveClass: "active"
    linkExactActiveClass: "active"
});
