<template>
    <div class="modal fade" id="addSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                    <button type="button" class="close" @click="dismissModel" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="storeSupplier">
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="">User</label>
                            <select class="form-control" v-model="suppliers.user_id" >
                                <option></option>
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="">Supplier Name</label>
                            <input type="text" class="form-control" v-model="suppliers.name" placeholder="Supplier name">
                        </div>
                        <div class="from-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" v-model="suppliers.email" placeholder="Email">
                        </div>
                        <div class="from-group">
                            <label for="">Phone</label>
                            <input type="number" class="form-control" v-model="suppliers.phone" placeholder="Phone number">
                        </div>
                        <div class="from-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" v-model="suppliers.password" placeholder="Password">
                        </div>
                        <div class="from-group">
                            <label for="">Address</label>
                            <textarea cols="30" rows="3" class="form-control" v-model="suppliers.address" placeholder="Address"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="dismissModel">Close</button>
                        <button type="submit" class="btn btn-primary" :disabled="isDisable">
                            {{ isDisable ? 'Submit ....' : 'Submit' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';
    export default {
        data: function () {
            return {
                isDisable: false,
                suppliers: {},
            };
        },
        methods: {
            storeSupplier() {
                this.isDisable = true;
                axios.post('/suppliers', this.suppliers).then((response) => {
                    // console.log(response.data);
                    if(response.data.type == 'Success') {
                        this.isDisable = false;
                        this.$emit('supplierAdded');
                        this.suppliers = {};
                        $("#addSupplier").modal('hide');
                        toast.success('Supplier successfully added');
                    }else {
                        // console.log(response.data.massage);
                    }
                }).catch((error) => {
                    
                    this.isDisable = false;
                    
                    if (error.response && error.response.data && error.response.data.errors) {
                        const errors = error.response.data.errors;
                        Object.keys(errors).forEach((key) => {
                            errors[key].forEach((errorMessage) => {
                                toast.error(`${errorMessage}`);
                            });
                        });
                    }
                });
            },
            dismissModel() {
                this.suppliers = {};
                $("#addSupplier").modal('hide');
            }
        },
    }
</script>