import Vue from "vue";
import Router from "vue-router";
import Dashboard from "../components/dashboard/Dashboard";
import Setting from "../components/setting/Setting";
import BankAccount from "../components/bank_account/BankAccount";

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: "/technical-test/",
            name: "Dashboard",
            component: Dashboard
        },
        {
            path: "/technical-test/bank_accounts",
            name: "BankAccount",
            component: BankAccount
        },
        {
            path: "/technical-test/setting",
            name: "Setting",
            component: Setting
        }
    ],
    mode: "history",
    // linkActiveClass: "active"
    linkExactActiveClass: "active"
});
