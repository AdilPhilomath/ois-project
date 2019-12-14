import { HTTP } from "../../utils/http";

const state = {
    bank_account: [],
    financial_organizations: []
};

const getters = {
    bank_account(state) {
        return state.bank_account;
    },
    financial_organizations(state) {
        return state.financial_organizations;
    }
};

const mutations = {
    bank_account(state, payload) {
        state.bank_account = payload;
    },
    financial_organizations(state, payload) {
        state.financial_organizations = payload;
    }
};

const actions = {
    createBankAccountInfo({ commit }, payload) {
        return new Promise((resolve, reject) => {
            payload
                .post(HTTP.baseURL + "api/bank_accounts")
                .then(data => {
                    resolve(data);
                })
                .catch(err => {
                    console.log(err);
                });
        });
    },

    updateBankAccountInfo({ commit }, payload) {
        return new Promise((resolve, reject) => {
            payload
                .put(HTTP.baseURL + "api/bank_accounts/" + payload.id)
                .then(data => {
                    resolve(data);
                })
                .catch(err => {
                    console.log(err);
                });
        });
    },

    getAllBankAccount(context) {
        axios
            .get(HTTP.baseURL + "api/bank_accounts")
            .then(response => {
                context.commit("bank_account", response.data.bank_accounts);
            })
            .catch(err => {
                console.log(err);
            });
    },

    getAllFinancialOrganizations(context) {
        axios
            .get(HTTP.baseURL + "api/financial_organizations")
            .then(response => {
                context.commit(
                    "financial_organizations",
                    response.data.financial_organizations
                );
            })
            .catch(err => {
                console.log(err);
            });
    },

    deleteBankAccountInfo({ commit }, payload) {
        return new Promise((resolve, reject) => {
            axios
                .delete(HTTP.baseURL + "api/bank_accounts/" + payload.id)
                .then(data => {
                    resolve(data);
                })
                .catch(err => {
                    console.log(err);
                });
        });
    }
};

export default {
    state,
    mutations,
    actions,
    getters
};
