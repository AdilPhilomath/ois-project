<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Setting List</h3>
                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-toggle="modal"
                                    data-target="#exampleModal"
                                    @click="resetData()"
                                >
                                    Add Setting
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
                                            @click="getSettingData(props.row)"
                                            class="btn btn-sm btn-primary"
                                        >
                                            <!--<i class="fa fa-1x fa-edit"></i>-->
                                            <span>Edit</span>
                                            {{ props.row.button }}
                                        </a>

                                        <a
                                            href="Javascript:void(0)"
                                            @click="
                                                deleteSettingData(props.row)
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

        <SettingModal></SettingModal>
    </section>
</template>

<script>
import SettingModal from "./SettingModal";

export default {
    name: "SettingDetails",
    components: {
        SettingModal
    },
    props: ["columns", "rows"],
    methods: {
        getSettingData(setting) {
            let result = {
                updateMode: true,
                settingInfo: setting
            };
            Event.$emit("toggleSettingModal", result);
        },
        resetData() {
            let result = false;
            Event.$emit("resetSettingModal", result);
        },
        deleteSettingData(setting) {
            let settingInfo = setting;
            Event.$emit("deleteSettingData", settingInfo);
        }
    }
};
</script>

<style scoped></style>
