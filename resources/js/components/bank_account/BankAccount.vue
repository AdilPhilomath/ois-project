<template>
    <div>
        <BankAccountDetails
            :columns="columns"
            :rows="bank_accounts"
        ></BankAccountDetails>
    </div>
</template>

<script>
import BankAccountDetails from "./BankAccountDetails";

export default {
    name: "BankAccount",
    components: {
        BankAccountDetails
    },
    data() {
        return {
            columns: [
                {
                    label: "Account Name",
                    field: "account_name"
                },
                {
                    label: "Bank",
                    field: "bank_name"
                },
                {
                    label: "Account No",
                    field: "account_no"
                },
                {
                    label: "Branch",
                    field: "branch"
                },
                {
                    label: "Account Type",
                    field: "account_type"
                },
                {
                    label: "Action",
                    field: "action",
                    type: "html"
                }
            ]
        };
    },
    computed: {
        bank_accounts() {
            return this.$store.getters.bank_account;
        },
        acc_type(type) {
            if (type == 1) return "Saving Account";
        }
    },
    mounted() {
        this.$store.dispatch("getAllBankAccount");
    }
};
</script>

<style scoped></style>
