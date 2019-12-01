<template>
    <div>
        <SettingDetails :columns="columns" :rows="setting"></SettingDetails>
    </div>
</template>

<script>
import SettingDetails from "./SettingDetails";

export default {
    name: "Setting",
    components: {
        SettingDetails
    },
    data() {
        return {
            columns: [
                {
                    label: "Company Name",
                    field: "company_name"
                },
                {
                    label: "Company Email",
                    field: "company_email"
                },
                {
                    label: "Company Moto",
                    field: "company_moto"
                },
                {
                    label: "Company Phone Number",
                    field: "company_phone_number"
                },
                {
                    label: "Company Address",
                    field: "company_address"
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
        setting() {
            return this.$store.getters.setting;
        }
    },
    mounted() {
        this.$store.dispatch("getAllSetting");
    }
};
</script>

<style scoped></style>
