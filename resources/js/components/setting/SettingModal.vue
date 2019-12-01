<template>
    <!-- Modal -->
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ updateMode ? "Update" : "Add" }} Setting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="updateMode ? updateSetting() : createSetting()">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input
                                type="text"
                                v-model="form.company_name"
                                name="company_name"
                                placeholder="Enter Company Name"
                                class="form-control"
                            />
                            <has-error :form="form" field="company_name"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Company Email</label>
                            <input
                                type="text"
                                v-model="form.company_email"
                                name="company_email"
                                placeholder="Enter Company Email"
                                class="form-control"
                            />
                            <has-error :form="form" field="company_email"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Company Phone Number</label>
                            <input
                                type="text"
                                v-model="form.company_phone_number"
                                name="company_phone_number"
                                placeholder="Enter Company Phone Number"
                                class="form-control"
                            />
                            <has-error :form="form" field="company_phone_number"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Company Address</label>
                            <input
                                type="text"
                                v-model="form.company_address"
                                name="company_address"
                                placeholder="Enter Company Address"
                                class="form-control"
                            />
                            <has-error :form="form" field="company_address"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Company Moto</label>
                            <input
                                type="text"
                                v-model="form.company_moto"
                                name="company_moto"
                                placeholder="Enter Company Moto"
                                class="form-control"
                            />
                            <has-error :form="form" field="company_moto"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input
                                type="file"
                                @change="onImageChange"
                                name="image"
                                class="form-control"
                            />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{ updateMode ? "Update" : "Save" }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SettingModal",
        data() {
            return {
                form: new Form({
                    id: "",
                    company_name: "",
                    company_email: "",
                    company_phone_number: "",
                    company_address: "",
                    company_moto: "",
                    image:""

                }),
                updateMode: false
            };
        },
        methods: {
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length) return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = e => {
                    vm.form.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            createSetting() {
                setTimeout(() => {
                    this.$store
                        .dispatch("createSettingInfo", this.form)
                        .then(response => {
                            let result = response.data;
                            if (result.resultStatus === "1") {
                                this.form.reset();
                                this.form.image = "";
                                $("#exampleModal").modal("hide");
                                this.$toastr.success("Record Inserted Successfully", "");
                            } else {
                                this.$toastr.error("Record Insert Failed", "");
                            }
                            this.$store.dispatch("getAllSetting");
                        })
                        .catch(err => {
                            console.log(err);
                        });
                }, 1000);
            },

            updateSetting() {
                setTimeout(() => {
                    this.$store
                        .dispatch("updateSettingInfo", this.form)
                        .then(response => {
                            let result = response.data;
                            if (result.resultStatus === "1") {
                                this.form.reset();
                                this.form.image = "";
                                $("#exampleModal").modal("hide");
                                this.updateMode = false;
                                this.$toastr.success("Record Updated Successfully", "");
                            } else {
                                this.$toastr.error("Record Update Failed", "");
                            }
                            this.$store.dispatch("getAllSetting");
                        })
                        .catch(err => {
                            console.log(err);
                        });
                }, 1000);
            }
        },
        computed: {
        },
        created() {
            Event.$on("toggleSettingModal", result => {
                if (result.updateMode) {
                    this.updateMode = result.updateMode;
                    $("#exampleModal").modal("show");
                    this.form.fill(result.settingInfo);
                }
            });
            Event.$on("resetSettingModal", result => {
                this.updateMode = false;
                this.form.reset();
            });
            Event.$on("deleteSettingData", result => {
                if (confirm("Do you really want to delete?")) {
                    this.form.fill(result);
                    this.$store
                        .dispatch("deleteSettingInfo", this.form)
                        .then(response => {
                            let result = response.data;
                            if (result.resultStatus === "1") {
                                this.form.reset();
                                $("#exampleModal").modal("hide");
                                this.$toastr.success("Record Deleted Successfully", "");
                            } else {
                                this.$toastr.error("Record Delete Failed", "");
                            }
                            this.$store.dispatch("getAllSetting");
                        })
                        .catch(err => {
                            console.log(err);
                        });
                }
            });
        },
        mounted() {
            // this.$store.dispatch("getAllRoutes");
            // this.$store.dispatch("getAllAircrafts");
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
