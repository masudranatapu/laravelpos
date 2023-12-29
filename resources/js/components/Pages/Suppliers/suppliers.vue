<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Supplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <router-link to="/admin/dashboard">
                                Home
                            </router-link>
                        </li>
                        <li class="breadcrumb-item active">
                            Suppliers
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-info" @click="addSupplier">
                                Create New Supplier
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>SL No</th>
                                    <th>User Name</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(supplier, index) of suppliers">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ suppliers.user_name }}</td>
                                        <td>{{ suppliers.name }}</td>
                                        <td>{{ suppliers.email }}</td>
                                        <td>{{ suppliers.phone }}</td>
                                        <td>{{ suppliers.address }}</td>
                                        <td>{{ suppliers.created_at }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item" type="button" >
                                                        Edit
                                                    </button>
                                                    <button class="dropdown-item" type="button" >
                                                        View
                                                    </button>
                                                    <button class="dropdown-item" type="button" >
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add user  -->
    <addSupplier  @supplierAdded="getSuppliers" />
    <!-- view user -->
    <!-- <viewUser :userData="selectedUserData" /> -->
    <!-- edit user -->
    <!-- <updateUser :users="editSelectedUser" @userUpdated="getSuppliers"/> -->
</template>

<script>
    import addSupplier from "./addSupplier.vue";
    import viewSupplier from "./viewSupplier.vue";
    import updateSupplier from "./updateSupplier.vue";
    import axios from 'axios';
    export default {
        components: {
            addSupplier,
            viewSupplier,
            updateSupplier,
        },
        data: function () {
            return {
                suppliers: {},
                selectedUserData: null,
                editSelectedUser: null,
            };
        },
        beforeMount() {
            this.getSuppliers();
        },
        methods: {
            getSuppliers() {
                axios.get('/suppliers').then((response) => {
                    this.suppliers = response.data.data;
                })
            },
            addSupplier() {
                $("#addSupplier").modal('show');
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>