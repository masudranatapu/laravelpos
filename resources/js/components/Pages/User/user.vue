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
                                    <tr v-for="(user, index) of users">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ user.phone }}</td>
                                        <td>{{ user.address }}</td>
                                        <td>{{ user.created_at }}</td>
                                        <td>

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
    <addUser />
</template>

<script>
    import addUser from './addUser.vue';
    import axios from 'axios';
    export default {
        components: {
            addUser,
        },
        data: function () {
            return {
                users: {},
            };
        },
        beforeMount() {
            this.getUsers();
        },
        methods: {
            getUsers: function() {
                axios.get('/user/list').then((response) => {
                    this.users = response.data.data;
                });
            },
            addUser() {
                $("#addUser").modal('show');
            },
            
        },
    }
</script>

<style lang="">
    
</style>