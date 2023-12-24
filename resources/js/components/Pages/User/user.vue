<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <router-link to="/admin/dashboard">
                                Home
                            </router-link>
                        </li>
                        <li class="breadcrumb-item active">
                            User
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
                            <button type="button" class="btn btn-info" @click="addUser">
                                Create New User
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>SL No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(user, index) of users.data">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ user.phone }}</td>
                                        <td>{{ user.address }}</td>
                                        <td>{{ user.created_at }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item" type="button" @click="editUser(user.id)">
                                                        Edit
                                                    </button>
                                                    <button class="dropdown-item" type="button" @click="viewUser(user.id)">
                                                        View
                                                    </button>
                                                    <button class="dropdown-item" type="button" @click="deleteUser(user.id)">
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
    <addUser @userAdded="getUsers" />
    <!-- view user -->
    <viewUser :userData="selectedUserData" />
    <!-- edit user -->
    <updateUser :users="editSelectedUser" @userUpdated="getUsers"/>
</template>

<script>
    import addUser from './addUser.vue';
    import viewUser from './viewUser.vue';
    import updateUser from './updateUser.vue';
    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';
    import axios from 'axios';
    export default {
        components: {
            addUser,
            viewUser,
            updateUser,
        },
        data: function () {
            return {
                users: {},
                selectedUserData: null,
                editSelectedUser: null,
            };
        },
        beforeMount() {
            this.getUsers();
        },
        methods: {
            getUsers: function(page = 1) {
                axios.get(`/user/list?${page}`).then((response) => {
                    this.users = response.data;
                });
            },
            addUser() {
                $("#addUser").modal('show');
            },
            deleteUser(id) {
                axios.get(`/user/delete/${id}`).then((response) => {
                    if(response.data.type == "Success") {
                        toast.warning(response.data.massage);
                        this.getUsers();
                    }else {
                        toast.info('Somethig went worng. Please try again');
                    }
                });
            },
            viewUser(id) {
                axios.get(`/user/view/${id}`).then((response) => {
                    // console.log(response.data);
                    if(response.data.type == "Success") {
                        this.selectedUserData = response.data.data;
                        $("#viewUser").modal('show');
                        
                    }else {
                        // console.log(response.data.success);
                        toast.info(response.data.massage);
                    }
                });
            },
            editUser(id) {
                axios.get(`/user/edit/${id}`).then((response) => {
                    // console.log(response.data);
                    if(response.data.type == "Success") {
                        this.editSelectedUser = response.data.data;
                        $("#updateUser").modal('show');
                    }else {
                        // console.log(response.data.success);
                        toast.info('Somethig went worng. Please try again');
                    }
                });
            },
        },
    }
</script>