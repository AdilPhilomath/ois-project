<template>
    <!-- Modal -->
    <div>
        <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ updateMode ? "Update" : "Add" }} Bank Account
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form
                    @submit.prevent="
                        updateMode ? updateBankAccount() : createBankAccount()
                    "
                >
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Account Name</label>
                            <input
                                type="text"
                                v-model="form.account_name"
                                name="account_name"
                                placeholder="Enter Account Name"
                                class="form-control"
                                required
                            />
                            <has-error
                                :form="form"
                                field="account_name"
                            ></has-error>
                        </div>
                        <div class="form-group">
                            <label>Bank</label>
                            <Select2
                                v-model="form.financial_organization_id"
                                :options="financial_organizations"
                                name="financial_organizatioin_id"
                                :settings="{
                                    width: '100%',
                                    containerCss: { 'line-height': '22px' }
                                }"
                                required
                            />
                            <has-error
                                :form="form"
                                field="financial_organization_id"
                            ></has-error>
                        </div>
                        <div class="form-group">
                            <label>Account No</label>
                            <input
                                type="text"
                                v-model="form.account_no"
                                name="account_no"
                                placeholder="Enter Account No"
                                class="form-control"
                                required
                            />
                            <has-error
                                :form="form"
                                field="account_no"
                            ></has-error>
                        </div>
                        <div class="form-group">
                            <label>Branch</label>
                            <input
                                type="text"
                                v-model="form.branch"
                                name="branch"
                                placeholder="Enter Branch"
                                class="form-control"
                                required
                            />
                            <has-error :form="form" field="branch"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Account Type</label>
                            <Select2
                                v-model="form.account_type"
                                name="account_type"
                                :options="account_types"
                                :settings="{
                                    width: '100%',
                                    containerCss: { 'line-height': '22px' }
                                }"
                            />
                            <has-error
                                :form="form"
                                field="account_type"
                            ></has-error>
                        </div>
                        <div class="form-group">
                            <label>Swift Code</label>
                            <input
                                type="text"
                                v-model="form.swift_code"
                                name="swift_code"
                                placeholder="Enter Swift Code"
                                class="form-control"
                                required
                            />
                            <has-error
                                :form="form"
                                field="swift_code"
                            ></has-error>
                        </div>
                        <div class="form-group">
                            <label>Route No</label>
                            <input
                                type="text"
                                v-model="form.route_no"
                                name="route_no"
                                placeholder="Enter Route No"
                                class="form-control"
                                required
                            />
                            <has-error
                                :form="form"
                                field="route_no"
                            ></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            {{ updateMode ? "Update" : "Save" }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div
        class="modal fade"
        id="showModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bank Account Info
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form
                    @submit.prevent="
                        updateMode ? updateBankAccount() : createBankAccount()
                    "
                >
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Account Name</label>
                            <input
                                type="text"
                                v-model="form.account_name"
                                name="account_name"
                                placeholder="Enter Account Name"
                                class="form-control"
                                required
                                required
                                readonly
                            />
                            <has-error
                                :form="form"
                                field="account_name"
                            ></has-error>
                        </div>
                        <div class="form-group">
                            <label>Bank</label>
                            <Select2
                                v-model="form.financial_organization_id"
                                :options="financial_organizations"
                                name="financial_organizatioin_id"
                                disabled
                                :settings="{
                                    width: '100%',
                                    containerCss: { 'line-height': '22px' }
                                }"
                            />
                            <has-error
                                :form="form"
                                field="financial_organization_id"
                            ></has-error>
                        </div>
                        <div class="form-group">
                            <label>Account No</label>
                            <input
                                type="text"
                                v-model="form.account_no"
                                name="account_no"
                                placeholder="Enter Account No"
                                class="form-control"
                                readonly
                            />
                            <has-error
                                :form="form"
                                field="account_no"
                            ></has-error>
                        </div>
                        <div class="form-group">
                            <label>Branch</label>
                            <input
                                type="text"
                                v-model="form.branch"
                                name="branch"
                                placeholder="Enter Branch"
                                class="form-control"
                                readonly
                            />
                            <has-error :form="form" field="branch"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Account Type</label>
                            <Select2
                                v-model="form.account_type"
                                name="account_type"
                                :options="account_types"
                                disabled
                                :settings="{
                                    width: '100%',
                                    containerCss: { 'line-height': '22px' }
                                }"
                            />
                            <has-error
                                :form="form"
                                field="account_type"
                            ></has-error>
                        </div>
                        <div class="form-group">
                            <label>Swift Code</label>
                            <input
                                type="text"
                                v-model="form.swift_code"
                                name="swift_code"
                                placeholder="Enter Swift Code"
                                class="form-control"
                                readonly
                            />
                            <has-error
                                :form="form"
                                field="swift_code"
                            ></has-error>
                        </div>
                        <div class="form-group">
                            <label>Route No</label>
                            <input
                                type="text"
                                v-model="form.route_no"
                                name="route_no"
                                placeholder="Enter Route No"
                                class="form-control"
                                readonly
                            />
                            <has-error
                                :form="form"
                                field="route_no"
                            ></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                        <!-- <button type="submit" class="btn btn-primary">
                            {{ updateMode ? "Update" : "Save" }}
                        </button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    name: "BankAccountModal",
    data() {
        return {
            form: new Form({
                id: "",
                account_name: "",
                financial_organization_id: "",
                account_no: "",
                branch: "",
                account_type: "",
                swift_code: "",
                route_no: ""
            }),
            updateMode: false,
            account_types: [
                { id: 1, text: "Saving Account" },
                { id: 2, text: "Current Account" },
                { id: 3, text: "Joint Account" }
            ]
        };
    },
    methods: {
        createBankAccount() {
            setTimeout(() => {
                this.$store
                    .dispatch("createBankAccountInfo", this.form)
                    .then(response => {
                        let result = response.data;
                        if (result.resultStatus === "1") {
                            this.form.reset();
                            this.form.image = "";
                            $("#exampleModal").modal("hide");
                            this.$toastr.success(
                                "Record Inserted Successfully",
                                ""
                            );
                        } else {
                            this.$toastr.error("Record Insert Failed", "");
                        }
                        this.$store.dispatch("getAllBankAccount");
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }, 1000);
        },

        updateBankAccount() {
            setTimeout(() => {
                this.$store
                    .dispatch("updateBankAccountInfo", this.form)
                    .then(response => {
                        let result = response.data;
                        if (result.resultStatus === "1") {
                            this.form.reset();
                            this.form.image = "";
                            $("#exampleModal").modal("hide");
                            this.updateMode = false;
                            this.$toastr.success(
                                "Record Updated Successfully",
                                ""
                            );
                        } else {
                            this.$toastr.error("Record Update Failed", "");
                        }
                        this.$store.dispatch("getAllBankAccount");
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }, 1000);
        }
    },
    computed: {
        financial_organizations() {
            let financial_organizationArray = [];
            let financial_organizations = this.$store.getters
                .financial_organizations;
            financial_organizations.forEach(financial_organization => {
                financial_organizationArray.push({
                    id: financial_organization.id,
                    text: financial_organization.name
                });
            });
            return financial_organizationArray;
        }
    },
    created() {
        Event.$on("toggleBankAccountModal", result => {
            if (result.updateMode) {
                this.updateMode = result.updateMode;
                $("#exampleModal").modal("show");
                this.form.fill(result.bankAccountInfo);
            }
        });
        Event.$on("toggleBankInfoModal", result => {
                $("#showModal").modal("show");
                this.form.fill(result.bankAccountInfo);
        });
        Event.$on("resetBankAccountModal", result => {
            this.updateMode = false;
            this.form.reset();
        });
        Event.$on("deleteBankAccountData", result => {
            if (confirm("Do you really want to delete?")) {
                this.form.fill(result);
                this.$store
                    .dispatch("deleteBankAccountInfo", this.form)
                    .then(response => {
                        let result = response.data;
                        if (result.resultStatus === "1") {
                            this.form.reset();
                            $("#exampleModal").modal("hide");
                            this.$toastr.success(
                                "Record Deleted Successfully",
                                ""
                            );
                        } else {
                            this.$toastr.error("Record Delete Failed", "");
                        }
                        this.$store.dispatch("getAllBankAccount");
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        });
    },
    mounted() {
        this.$store.dispatch("getAllFinancialOrganizations");
    }
};
</script>

<style scoped>
.select2-container--default
    .select2-selection--single
    .select2-selection__rendered {
    line-height: 22px !important;
}

.invalid-feedback {
    display: block !important;
    font-size: 90% !important;
}
</style>
