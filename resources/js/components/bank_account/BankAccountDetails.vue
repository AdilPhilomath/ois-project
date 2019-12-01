<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bank Account List</h3>
                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-toggle="modal"
                                    data-target="#exampleModal"
                                    @click="resetData()"
                                >
                                    Add Bank Account
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <vue-good-table
                                :columns="columns"
                                :search-options="{
                                    enabled: true
                                }"
                                :rows="rows"
                                :pagination-options="{
                                    enabled: true,
                                    mode: 'records',
                                    perPage: 5
                                }"
                            >
                                <template slot="table-row" slot-scope="props">
                                    <span v-if="props.column.field == 'action'">
                                        <a
                                            href="javascript:void(0)"
                                            @click="
                                                showBankAccountData(props.row)
                                            "
                                            class="btn btn-sm btn-warning"
                                        >
                                            <!--<i class="fa fa-1x fa-edit"></i>-->
                                            <span>Show</span>
                                            {{ props.row.button }}
                                        </a>
                                        <a
                                            href="javascript:void(0)"
                                            @click="
                                                getBankAccountData(props.row)
                                            "
                                            class="btn btn-sm btn-primary"
                                        >
                                            <!--<i class="fa fa-1x fa-edit"></i>-->
                                            <span>Edit</span>
                                            {{ props.row.button }}
                                        </a>
                                        <a
                                            href="Javascript:void(0)"
                                            @click="
                                                deleteBankAccountData(props.row)
                                            "
                                            class="btn btn-sm btn-danger"
                                        >
                                            <span>Delete</span>
                                            {{ props.row.button }}
                                        </a>
                                    </span>
                                </template>
                            </vue-good-table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

        <BankAccountModal></BankAccountModal>
    </section>
</template>

<script>
import BankAccountModal from "./BankAccountModal";

export default {
    name: "BankAccountDetails",
    components: {
        BankAccountModal
    },
    props: ["columns", "rows"],
    methods: {
        getBankAccountData(bankAccount) {
            let result = {
                updateMode: true,
                bankAccountInfo: bankAccount
            };
            Event.$emit("toggleBankAccountModal", result);
        },
        showBankAccountData(bankAccount) {
            let result = {
                updateMode: true,
                bankAccountInfo: bankAccount
            };
            Event.$emit("toggleBankInfoModal", result);
        },
        resetData() {
            let result = false;
            Event.$emit("resetBankAccountModal", result);
        },
        deleteBankAccountData(bankAccount) {
            let bankAccountInfo = bankAccount;
            Event.$emit("deleteBankAccountData", bankAccountInfo);
        }
    }
};
</script>

<style scoped></style>
