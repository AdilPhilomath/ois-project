import Vue from "vue";
import Vuex from "vuex";

import setting from "./modules/setting";
import bank_account from "./modules/bank_account";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        setting,
        bank_account
    }
});
